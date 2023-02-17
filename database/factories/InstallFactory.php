<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Install>
 */
class InstallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
        ];
    }

    /**
     * Indicate that the model's type.
     *
     * @return static
     */
    public function lab()
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'lab',
        ]);
    }

    /**
     * Indicate that the model's type.
     *
     * @return static
     */
    public function demo()
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'demo',
        ]);
    }

    /**
     * Indicate that the model's type.
     *
     * @return static
     */
    public function dev()
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'dev',
        ]);
    }

    /**
     * Indicate that the model's type.
     *
     * @return static
     */
    public function prod()
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'prod',
        ]);
    }


}
