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
        DB::table('users')->insert([
            'firstname' => 'Owl',
            'lastname' => 'admin',
            'email' => 'admin@email.nl',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        for( $i = 0; $i < 20; $i++) {

            DB::table('users')->insert([
                'firstname' => str_random(7),
                'lastname' => str_random(7),
                'email' => str_random(7) . '@email.nl',
                'password' => bcrypt(str_random(7)),
                'role' => 'user',
            ]);

        }
    }
}
