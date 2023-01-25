<?php

namespace Database\Factories;

use App\Models\UserDevice;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserDeviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserDevice::class;

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
        'name' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'pri' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'passwd' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'card' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'grp' => $this->faker->text($this->faker->numberBetween(5, 10)),
        'tz' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'verify' => $this->faker->boolean,
        'vice_card' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'start_datetime' => $this->faker->date('Y-m-d H:i:s'),
        'end_datetime' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
