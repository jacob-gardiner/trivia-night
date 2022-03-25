<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Difficulty::factory(3)->state(new Sequence(
            ['name' => Difficulty::EASY],
            ['name' => Difficulty::MEDIUM],
            ['name' => Difficulty::HARD],
        ))->create();
    }
}
