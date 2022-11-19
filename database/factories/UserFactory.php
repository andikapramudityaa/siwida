<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => 'adminsiwida',
            'name' => 'Admin Siwida',
            'phoneNumber' => '0251-642245',
            'password' => bcrypt('admin2022'),
            'isAdmin' => 1,
            'remember_token' => Str::random(10),
        ];
    }
}
