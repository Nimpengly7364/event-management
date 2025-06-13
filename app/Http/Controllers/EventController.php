<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        // Fetch all events from the database
        $events = Event::all();

        // Pass the events to the view
        return view('events.index', compact('events'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        // Return a view for creating an event
        return view('events.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'capacity' => 'required|integer|min:1',
        ]);
        // Add the logged-in user's ID
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to create an event.');
        }
        $validated['user_id'] = $user->id; // Make sure the user is logged in

        // Create event
        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }


    // Display the specified resource.
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    // Show the form for editing the specified resource.
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'capacity' => 'required|integer|min:1',
        ]);

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }


    // Display the registration form for an event
    // Show registration form for event
    public function showRegistrationForm($id)
    {
        $event = Event::findOrFail($id);
        return view('events.register', compact('event'));
    }

    // Handle user registration to event
    public function registerUser(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Find or create user
        $user = User::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );

        // Check if already registered
        $alreadyRegistered = Registration::where('event_id', $event->id)
            ->where('user_id', $user->id)
            ->exists();

        if (!$alreadyRegistered) {
            Registration::create([
                'event_id' => $event->id,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('events.showRegistrations', $event->id)
            ->with('success', 'You have successfully registered for the event!');
    }

    // Show list of registered users for an event
    public function showRegistrations($id)
    {
        $event = Event::with('registrations.user')->findOrFail($id);
        return view('events.registrations', compact('event'));
    }
}
