<?php

namespace Database\Factories;

use App\Models\AttendanceLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AttendanceLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'device_id' => $this->faker->word,
        'pin' => $this->faker->text($this->faker->numberBetween(5, 30)),
        'fingertime' => $this->faker->date('Y-m-d H:i:s'),
        'status' => $this->faker->boolean,
        'verify' => $this->faker->boolean,
        'work_code' => $this->faker->word,
        'reserved' => $this->faker->word
        ];
    }
}
