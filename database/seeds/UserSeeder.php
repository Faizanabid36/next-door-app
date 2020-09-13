<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => \Hash::make('1234567890'),
                'admin' => 1,
                'avatar' => asset('theme\app-assets\images\portrait\small\avatar-s-25.jpg')
            ],
            [
                'name' => 'John Star',
                'email' => 'john@mail.com',
                'password' => \Hash::make('1234567890'),
                'admin' => 0,
                'avatar' => asset('theme\app-assets\images\portrait\small\avatar-s-25.jpg')
            ],
            [
                'name' => 'Mark Henry',
                'email' => 'mark@mail.com',
                'password' => \Hash::make('1234567890'),
                'admin' => 0,
                'avatar' => asset('theme\app-assets\images\portrait\small\avatar-s-25.jpg')
            ],
//            [
//                'name' => 'Faizan Abid',
//                'email' => 'faizanabid36@gmail.com',
//                'password' => \Hash::make('1234567890'),
//                'admin' => 0,
//                'avatar' => asset('theme\app-assets\images\portrait\small\avatar-s-25.jpg')
//            ],
        ];
        foreach ($user as $u)
            User::create($u);
    }
}
