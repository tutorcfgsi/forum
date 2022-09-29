<?php

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
        factory(\App\User::class)->create(['email' => 'raulreyes@gmail.com']);
        factory(\App\User::class, 50)->create();
        factory(\App\Forum::class, 20)->create();
        factory(\App\Post::class, 50)->create();
        factory(\App\Reply::class, 100)->create();
    }
}
