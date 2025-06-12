<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registration;
use App\Models\User;
use App\Models\Event;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $events = Event::all();

        // For each user, register to a random event
        foreach ($users as $user) {
            $randomEvent = $events->random();
            Registration::create([
                'user_id' => $user->id,
                'event_id' => $randomEvent->id,
                'registered_at' => now(),
            ]);
        }
    }
}
