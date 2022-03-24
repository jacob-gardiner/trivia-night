<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Difficulty;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = collect(json_decode(file_get_contents(__DIR__ . '/question_export.json')));

        $questions->each(function ($q) {

            $difficultyId = Cache::remember("difficulty.{$q->difficulty}", 60,
                fn() => Difficulty::whereName($q->difficulty)->firstOrFail()->id);

            $categoryId = Cache::remember("category.{$q->category}", 60,
                fn() => Category::query()->updateOrCreate(['name' => $q->category])->id);

            $question = Question::create([
                'body' => $q->question,
                'difficulty_id' => $difficultyId,
                'category_id' => $categoryId,
            ]);

            $question->answers()->createMany(collect($q->incorrect_answers)->map(fn($a) => [
                'body' => $a,
            ])->toArray());

            $question->answers()->create([
                'body' => $q->correct_answer,
                'is_correct' => true,
            ]);
        });
    }
}
