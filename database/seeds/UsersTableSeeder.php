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
        $user=\App\User::create([
            'first_name'=> 'super',
            'last_name'=> 'admin',
            'telephone'=> '+201060140510',
            'address'=> 'El-Mehalla',
            'image'=> 'default.png',
            'email'=>'super_admin@app.com',
            'password'=> bcrypt('123456')
        ]);
        $user->attachRole('super_admin');
    }
}
