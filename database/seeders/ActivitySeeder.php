<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::factory(400)->create();

        DB::table('roles')->insert([
            [
                'name' => 'stakeholder',
                'slug' => 'stakeholder',
                'description' => 'se encarga de dar el visto bueno a las actividades',
            ],
            [
                'name' => 'project-manager',
                'slug' => 'project-manager',
                'description' => 'se encarga de la gestion de proyectos',
            ],
            [
                'name' => 'programmer',
                'slug' => 'programmer',
                'description' => 'se encarga de la programacion de las actividades',
            ],
            [
                'name' => 'analyst',
                'slug' => 'analyst',
                'description' => 'se encarga del analisis de las actividades',
            ],
            [
                'name' => 'designer',
                'slug' => 'designer',
                'description' => 'se encarga del diseño de las actividades',
            ],
        ]);
    }
}
