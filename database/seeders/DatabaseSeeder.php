<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        User::create([
            'document_type' => 'dni',
            'document_number' => '12345678',
            'name' => 'Elder',
            'apellido_paterno' => 'Chumacero',
            'apellido_materno' => 'Jimenez',
            'birthday' => '1990-01-01',
            'email' => 'admin@mail.com',
            'phone' => '123456789',
            'address' => 'sasasfsaf',
            'password' => Hash::make('12345678'),
        ]);
        User::factory(50)->create();
        $this->call([
            PostSeeder::class,
        ]);
    }
}
