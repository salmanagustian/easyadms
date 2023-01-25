<?php

namespace Database\Factories;

use App\Models\Device;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Device::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serial_number' => $this->faker->text($this->faker->numberBetween(5, 40)),
        'additional_info' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'attlog_stamp' => $this->faker->numberBetween(0, 999),
        'operlog_stamp' => $this->faker->numberBetween(0, 999),
        'attphotolog_stamp' => $this->faker->numberBetween(0, 999),
        'error_delay' => $this->faker->numberBetween(0, 999),
        'delay' => $this->faker->numberBetween(0, 999),
        'trans_times' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'trans_interval' => $this->faker->numberBetween(0, 999),
        'trans_flag' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'timezone' => $this->faker->numberBetween(0, 999),
        'realtime' => $this->faker->boolean,
        'encrypt' => $this->faker->boolean,
        'server_version' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'table_name_stamp' => $this->faker->text($this->faker->numberBetween(5, 255))
        ];
    }
}
