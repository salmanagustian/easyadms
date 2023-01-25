<?php

namespace Database\Factories;

use App\Models\TemplateFingerprintDevice;
use Illuminate\Database\Eloquent\Factories\Factory;

class TemplateFingerprintDeviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TemplateFingerprintDevice::class;

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
        'fid' => $this->faker->numberBetween(0, 999),
        'size' => $this->faker->numberBetween(0, 999),
        'valid' => $this->faker->boolean,
        'tmp' => $this->faker->boolean
        ];
    }
}
