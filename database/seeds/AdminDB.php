<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class AdminDB extends Seeder

{

    public function run()
    {
        $admin['name'] = "Admin";
        $admin['email'] = "admin@admin.com";
        $admin['password'] = bcrypt(123456);
        $admin['user_type_id'] = 2;
        $admin['admin_group'] = 1;
        User::create($admin);


        $admin['name'] = "user";
        $admin['email'] = "user@admin.com";
        $admin['password'] = bcrypt(123456);
        $admin['user_type_id'] = 0;
        User::create($admin);



        $admin['name'] = "salon";
        $admin['email'] = "salon@admin.com";
        $admin['password'] = bcrypt(123456);
        $admin['user_type_id'] = 1;
        User::create($admin);

//        for ($x = 0; $x <= 10000; $x++) {
//            $admin['name'] = "Admin";
//            $admin['email'] = "admin@admin".$x."com";
//            $admin['password'] = bcrypt(123456);
//            $admin['user_type_id'] = 0;
//            User::create($admin);
//        }
    }
}


