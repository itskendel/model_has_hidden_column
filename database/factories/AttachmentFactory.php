<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file_name'     =>  fake()->name(),
            'file_type'     =>  fake()->word(),
            'size'          =>  fake()->numberBetween(1, 10),
            'uploaded_by'   =>  fake()->name()
        ];
    }
}
