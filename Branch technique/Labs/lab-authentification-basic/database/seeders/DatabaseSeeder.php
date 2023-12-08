<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Project::factory()->create([
            'name' => 'Portfolio',
            'description' => 'Développement d\'un site web mettant en valeur nos compétences.',
        ]);

        Project::factory()->create([
            'name' => 'Arbre des compétences',
            'description' => 'Création d\'une application web pour l\'évaluation des compétences.',
        ]);

        Project::factory()->create([
            'name' => 'CNMH',
            'description' => 'Création d\'une application web pour la gestion des patients de centre CNMH.',
        ]);
    }
}

