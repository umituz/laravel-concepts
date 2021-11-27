<?php

namespace Database\Factories;

use App\Crawler;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class CrawlerFactory
 * @package Database\Factories
 */
class CrawlerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Crawler::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [];
    }
}
