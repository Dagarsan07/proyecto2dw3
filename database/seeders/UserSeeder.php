<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User([
            'name' => 'David',
            'surname' => 'Garcia',
            'username' => 'Dagarsan',
            'email' => 'dgarcia@mail.com',
            'password' => Hash::make('David123'),
            'role' => 'ADMIN',
        ]);
        $user->save();

        $user = new User([
            'name' => 'Juan',
            'surname' => 'Prueba',
            'username' => 'juanjugador',
            'email' => 'jprueba@mail.com',
            'password' => Hash::make('Juan123'),
            'role' => 'PLAYER',
        ]);
        $user->save();
    }
}
