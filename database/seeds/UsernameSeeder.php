<?php

use Illuminate\Database\Seeder;

class UsernameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\employee::class,10)->create();
        factory(App\User::class,10 )->create();
    }
}
