<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Role::create([
            'name' => 'Developer',
            'description' => 'Software developer role with coding responsibilities'
        ]);

        \App\Models\Role::create([
            'name' => 'Product Manager',
            'description' => 'Product management and strategy role'
        ]);

        \App\Models\Role::create([
            'name' => 'Designer',
            'description' => 'UI/UX design role'
        ]);

        \App\Models\Role::create([
            'name' => 'QA Engineer',
            'description' => 'Quality assurance and testing role'
        ]);

        \App\Models\Role::create([
            'name' => 'Team Lead',
            'description' => 'Technical team leadership role'
        ]);
    }
}
