<?php

// database/factories/ProjectFactory.php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        $startDate = $this->faker->date;
        $endDate = $this->faker->dateTimeBetween($startDate, '+1 year')->format('Y-m-d');
    
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

