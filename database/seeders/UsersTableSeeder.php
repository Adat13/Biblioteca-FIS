<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Verificar si el usuario ya existe
        $user = User::where('email', 'johndoe@example.com')->first();

        if (!$user) {
            // Insertar el usuario solo si no existe
            User::create([
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
