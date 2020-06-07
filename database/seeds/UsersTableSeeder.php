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
        DB::table('users')->insert([ // Ajout d'un seed
            ["name" => "Admin",
            "email" => "adminemail@gmail.com",
            "password" => Hash::make("00000000")],
            ["name" => "User2",
            "email" => "random@mail.com",
            "password" => Hash::make("00000000")]
        ]);
    }
}
