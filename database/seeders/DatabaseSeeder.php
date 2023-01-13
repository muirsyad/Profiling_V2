<?php

namespace Database\Seeders;
use Carbon\Carbon;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Clients;
use App\Models\Departments;
use App\Models\Groups;
use App\Models\Questions;
use App\Models\Roles;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Roles::create([
            'role' => 'admin',
        ]);
        Roles::create([
            'role' => 'client',
        ]);

        Departments::create([
            'department' => 'It',
        ]);
        Departments::create([
            'department' => 'Sales',
        ]);
        Departments::create([
            'department' => 'HR',
        ]);
        Clients::create([
            'client' => 'LHI',
            'address' => '123 Main Street',
            'email' => 'LHI@example.com',
            'created_at' => Carbon::parse('2000-01-01'),
        ]);
        Clients::create([
            'client' => 'Dihatsu',
            'address' => '123 Main Street',
            'email' => 'Daihatsu@example.com',
            'created_at' => Carbon::parse('2000-01-01'),
        ]);
        for($i = 1; $i< 29; $i++){
            Groups::create([
                'group' => $i,
            ]);
        }

        Questions::create([
            'question' => 'Must be able to Follow Through',
            'value' => 'D',
            'group_id' => 1,
        ]);
        Questions::create([
            'question' => 'Must be able to Persuade and Convince',
            'value' => 'D',
            'group_id' => 1,
        ]);
        Questions::create([
            'question' => 'Must be Humble and Modest',
            'value' => 'D',
            'group_id' => 1,
        ]);
        Questions::create([
            'question' => 'Must be able to A Others',
            'value' => 'D',
            'group_id' => 2,
        ]);
        Questions::create([
            'question' => 'Must be Cooperative and Agreeable',
            'value' => 'D',
            'group_id' => 2,
        ]);
        Questions::create([
            'question' => 'Must be Friendly to Others',
            'value' => 'D',
            'group_id' => 2,
        ]);
        Questions::create([
            'question' => 'Must be Bold and Daring',
            'value' => 'D',
            'group_id' => 3,
        ]);
        Questions::create([
            'question' => 'Must be Loyal and Devoted',
            'value' => 'D',
            'group_id' => 3,
        ]);
        Questions::create([
            'question' => 'Must be Charming and Delightful',
            'value' => 'D',
            'group_id' => 3,
        ]);

    }
}
