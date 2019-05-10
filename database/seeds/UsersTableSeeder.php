<?php

use App\User;
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
        $user = new User();

        $user->name = "admin";

        $user->email = "admin@gmail.com";

        $user->password = bcrypt("admin");

        $user->address = '';
        $user->phone = '';
        $user->image = '';


        $user->role = 1;

        $user->save();


        $user = new User();

        $user->name = "duy";

        $user->email = "phamduyhvan@gmail.com";

        $user->password = bcrypt("11111111");

        $user->address = '';
        $user->phone = '';
        $user->image = '';

        $user->role = 0;

        $user->save();


    }
}
