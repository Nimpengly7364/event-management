<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Organizer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrganizerSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            // Create User
            $user = User::create([
                'name' => "Organizer $i",
                'email' => "organizer$i@example.com",
                'password' => Hash::make('password'),
                'role' => 'organizer',
            ]);

            // Create related Organizer record
            Organizer::create([
                'user_id' => $user->id,
                'organization_name' => "Org $i Co.",
                'phone' => "01234567$i", // simple fake phone
                'email' => "org$i@example.com",
            ]);
        }
    }
}
