<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $users = factory(App\User::class, 10)->create();

         $this->command->info('Created 10 users!');

        foreach ($users as $user) {
          $lessons = factory(App\Lesson::class, 10)->make();
          $user->lessons()->saveMany($lessons);
        }

         $this->command->info('Each user has 10 lessons!');        

        Model::reguard();
    }
}
