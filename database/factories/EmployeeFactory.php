<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Department;
use App\Models\Position;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array
{
    return [
        'first_name'     => $this->faker->firstName,
        'last_name'      => $this->faker->lastName,
        'email'          => $this->faker->unique()->safeEmail,
        'phone'          => $this->faker->phoneNumber,
        'address'        => $this->faker->address,
        'date_of_birth'  => $this->faker->date('Y-m-d', '-18 years'),
        'hire_date'      => now(),
        'image'          => 'default.jpg',
        'salary'         => $this->faker->numberBetween(500, 5000),
        'department_id'  => Department::inRandomOrder()->value('id'),
        'position_id'    => Position::inRandomOrder()->value('id'),
        'status'         => $this->faker->boolean,
    ];
}
}
