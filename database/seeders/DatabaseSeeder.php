<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TodoList;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Legible
        // Create 1 (One) User , with 3 (Three) Todo Lists , 
        // with 3 Tasks for Todo List id 1 
        // and with 6 Tasks for Todo List id 2
        $user = User::factory()->create();

        $todo_list = TodoList::factory()
                ->count(3)
                ->for($user)
                ->create();

        Task::factory()
                ->count(3)
                ->for($todo_list[0],'todo_list')
                ->create();
        
        Task::factory()
                ->count(6)
                ->for($todo_list[1],'todo_list')
                ->create();
    }

}
