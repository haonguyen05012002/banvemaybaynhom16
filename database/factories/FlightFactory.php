<?php

namespace Database\Factories;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Flight::class;
    public function definition(): array
    {
        return [
            //
            'flight_number' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'image_path' => $this->faker->imageUrl(), // Tạo một URL hình ảnh ngẫu nhiên
            'departure_airport' => $this->faker->randomElement(['Hồ Chí Minh', 'Hà Nội', 'Hải Phòng', 'Đà Nẵng', 'Phú Quốc']),
            'arrival_airport' => $this->faker->randomElement(['Hồ Chí Minh', 'Hà Nội', 'Hải Phòng', 'Đà Nẵng', 'Phú Quốc']),
            'departure_time' => $this->faker->dateTimeBetween('now', '+1 year'),
            'arrival_time' => $this->faker->dateTimeBetween('now', '+1 year'),          
            'price' => $this->faker->numberBetween(200000, 10000000), // Giả sử giá vé từ 200.000 đến 10.000.000
        ];
    }
}
