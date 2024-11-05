<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+91 9876543210', 
            'description' => 'Senior Developer with 10 years of experience',
            'role_id' => 1,
            'profile_image' => 'profile-images/default.jpg'
        ]);

        \App\Models\User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '+91 9876543211',
            'description' => 'Product Manager specializing in Agile methodologies',
            'role_id' => 2,
            'profile_image' => 'profile-images/default.jpg'
        ]);

        \App\Models\User::create([
            'name' => 'Mike Johnson',
            'email' => 'mike@example.com', 
            'phone' => '+91 9876543212',
            'description' => 'UX Designer with focus on user research',
            'role_id' => 3,
            'profile_image' => 'profile-images/default.jpg'
        ]);
    }
}
