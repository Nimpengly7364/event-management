<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Event;

class FeedbackSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $events = Event::all();

        foreach ($users as $user) {
            $randomEvent = $events->random();
            Feedback::create([
                'user_id' => $user->id,
                'event_id' => $randomEvent->id,
                'rating' => rand(1, 5),
                'comment' => 'This event was great!',
            ]);
        }
    }
}
