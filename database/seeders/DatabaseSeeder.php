<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Proyect;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User::create([
            'document_type' => 'dni',
            'document_number' => '12345678',
            'birthday' => '1995-06-10',
            'name' => 'Elder',
            'apellido_paterno' => 'Chumacero',
            'apellido_materno' => 'Jimenez',
            'email' => 'elder@mail.com',
            'phone' => '923456787',
            'contacto' => 'Elder',
            'address' => 'Av. Los Alamos 123',
            'password' => Hash::make('12345678'),
            'points' => rand(0, 200),
        ]);
        $this->call([
            ProyectSeeder::class,
            ActivitySeeder::class,
            ProyectUserSeeder::class,
        ]);
    }
}
