<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Joshua Getner";
        $user->email = "jgetner@gmail.com";
        $user->password = bcrypt("eclipse1");
        $user->save();
    }
}
