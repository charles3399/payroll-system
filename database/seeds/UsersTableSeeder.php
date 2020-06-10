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
        $user = User::where('email', 'bernaldezsay@gmail.com')->first();

        if(!$user)
        {
            User::create([
                'name' => 'Charles',
                'email' => 'bernaldezsay@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password') //security purposes
            ]);
        }
    }
}
