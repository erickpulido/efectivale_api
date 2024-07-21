<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::create([
            'name' => 'Cristian Sánchez',
            'email' => 'christian.sanchez@corpay.com',
            'password' => Hash::make('pass'),
        ]);

        $user->roles()->attach(1);
        $user->statuses()->attach(1);

        $user = User::create([
            'name' => 'Erick Pulido',
            'email' => 'erick.pulido.social@gmail.com',
            'password' => Hash::make('pass'),
        ]);

        $user->roles()->attach(2);
        $user->statuses()->attach(1);
    }
}
