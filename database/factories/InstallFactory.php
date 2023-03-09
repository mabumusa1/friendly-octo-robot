<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
            'properties' => [
                'id' => Str::lower(Str::random(15)),
                'mautic' => [
                    'admin' => [
                        'email' => fake()->email(),
                        'password' => fake()->password(),
                        'first_name' => fake()->firstName(),
                        'last_name' => fake()->lastName(),
                    ],
                    'server' => [
                        'cpu' => 1,
                        'memory' => 1, //GB
                        'disk' => 30, //GB
                        'limits' => [
                            //TODO: Add limits to the pod, define capaiblites
                        ]
                    ],
                ]
            ],
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
