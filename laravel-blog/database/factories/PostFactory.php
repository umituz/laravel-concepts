<?php

namespace Database\Factories;

use App\Enumerations\StatusEnumeration;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class PostFactory
 * @package Database\Factories
 */
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(5);
        return [
            'user_id' => User::factory(),
            'title' => $title,
            'content' => $this->faker->text(1500),
            'status' => StatusEnumeration::PUBLISHED,
            'published_at' => now()
        ];
    }

    /**
     * @return PostFactory
     */
    public function published()
    {
        return $this->state(function ($attributes) {
            return [
                'published_at' => now(),
                'status' => StatusEnumeration::PUBLISHED,
            ];
        });
    }

    /**
     * @return PostFactory
     */
    public function draft()
    {
        return $this->state(function ($attributes) {
            return [
                'published_at' => null,
                'status' => StatusEnumeration::DRAFT,
            ];
        });
    }

    /**
     * @return PostFactory
     */
    public function scheduled()
    {
        return $this->state(function ($attributes) {
            return [
                'published_at' => now()->addHours(5),
                'status' => StatusEnumeration::SCHEDULED,
            ];
        });
    }
}
