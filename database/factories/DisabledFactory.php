<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class DisabledFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'calendar_id' => Str::random(10),
            'day' => $this->faker->dateTimeBetween($startDate = '-3 days', $endDate = 'now', $timezone = null),
            'enable' => '1',
            'title'=>$this->faker->word()
        ];
    }
}
