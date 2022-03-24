<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public const CATEGORIES = [
        'Entertainment: Video Games',
        'Entertainment: Film',
        'Mythology',
        'Vehicles',
        'Science & Nature',
        'Entertainment: Music',
        'Geography',
        'History',
        'General Knowledge',
        'Art',
        'Science: Computers',
        'Science: Mathematics',
        'Animals',
        'Entertainment: Books',
        'Entertainment: Television',
        'Entertainment: Japanese Anime & Manga',
        'Entertainment: Board Games',
        'Sports',
        'Politics',
        'Entertainment: Cartoon & Animations',
        'Entertainment: Comics',
        'Celebrities',
        'Science: Gadgets',
        'Entertainment: Musicals & Theatres',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(self::CATEGORIES)
        ];
    }
}
