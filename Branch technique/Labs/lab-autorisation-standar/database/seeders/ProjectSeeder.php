<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Database\Factories\ProjectFactory;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Project::create([
            'name' => 'Portfolio',
            'description' => 'Développement d\'un site web mettant en valeur nos compétences.',
        ]);

        Project::create([
            'name' => 'Arbre des compétences',
            'description' => 'Création d\'une application web pour l\'évaluation des compétences.',
        ]);

        Project::create([
            'name' => 'CNMH',
            'description' => 'Création d\'une application web pour la gestion des patients de centre CNMH.',
        ]);
    }
    
}
