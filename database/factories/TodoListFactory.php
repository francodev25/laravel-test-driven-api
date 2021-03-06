<?php

namespace Database\Factories;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoListFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TodoList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //You can also call the method $this->faker->sentence()
            'name' => $this->faker->sentence,
            'user_id' => function(){
                return User::factory()->create()->id;
            }
        ];
    }
}
