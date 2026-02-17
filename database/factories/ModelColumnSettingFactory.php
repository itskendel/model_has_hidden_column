<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ModelColumnSetting>
 */
class ModelColumnSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model'         =>  'Attachment',
            'column'        =>  'file_type',
            'is_visible'    =>  false
        ];
    }
}
