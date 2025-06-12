<!DOCTYPE html>
<html>

<head>
    <title>All Events</title>
</head>

<body>
    <h1>All Events</h1>

    @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('events.create') }}">
        <button>Create New Event</button>
    </a>

    @forelse ($events as $event)
    <div style="border: 1px solid #ccc; margin: 10px 0; padding: 10px;">
        <h2>{{ $event->title }}</h2>
        <p><strong>Date:</strong> {{ $event->date }}</p>
        <a href="{{ route('events.show', $event->id) }}">
            <button>View Details</button>
        </a>
        <a href="{{ route('events.showRegistrations', $event->id) }}">
            <button>View Registrations</button>
        </a>
        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Delete this event?')">Delete</button>
        </form>

    </div>
    @empty
    <p>No events found.</p>
    @endforelse
</body>

</html>