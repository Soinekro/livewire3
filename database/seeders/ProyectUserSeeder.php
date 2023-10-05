<?php

namespace Database\Seeders;

use App\Models\ProyectUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (User::all() as $user) {
            $rand = rand(1, 10);
            for ($i = 0; $i < $rand; $i++) {
                ProyectUser::factory()->create([
                    'user_id' => $user->id,
                    'proyect_id' => rand(1, 10),
                    'role_id' => rand(1, 5),
                ]);
            }
        }
    }
}
