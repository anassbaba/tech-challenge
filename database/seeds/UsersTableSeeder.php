<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\User::class, 100)->create()->each(function ($user) {
    		$user->items()->saveMany(factory(App\Item::class, 100)->make());
    	});
    }
}