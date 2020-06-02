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
                'address' => 'asdf-gh-021',
                'contact' => '12312312',
                'postal' => '123',
                'gender' => 1,
                'admin' => 1,
                'avatar' => ('theme\app-assets\images\portrait\small\avatar-s-25.jpg')
            ],
            [
                'name' => 'Zain',
                'email' => 'zain@gmail.com',
                'password' => \Hash::make('1234567890'),
                'address' => 'asdf-gh-021',
                'contact' => '12312312',
                'postal' => '123',
                'gender' => 1,
                'admin' => 0,
                'avatar' => ('theme\app-assets\images\portrait\small\avatar-s-26.jpg')
            ],
            [
                'name' => 'Faizan',
                'email' => 'faizanabid36@gmail.com',
                'password' => \Hash::make('1234567890'),
                'address' => 'asdf-gh-021',
                'contact' => '12312312',
                'postal' => '123',
                'gender' => 0,
                'admin' => 0,
                'avatar' => ('theme\app-assets\images\portrait\small\avatar-s-25.jpg')
            ],
            [
                'name' => 'usaid',
                'email' => 'usaid@gmail.com',
                'password' => \Hash::make('1234567890'),
                'address' => 'asdf-gh-021',
                'contact' => '12312312',
                'postal' => '123',
                'gender' => 0,
                'admin' => 0,
                'avatar' => ('theme\app-assets\images\portrait\small\avatar-s-25.jpg')
            ],
            [
                'name' => 'mohisn',
                'email' => 'mohsin@gmail.com',
                'password' => \Hash::make('1234567890'),
                'address' => 'asdf-gh-021',
                'contact' => '12312312',
                'postal' => '123',
                'gender' => 0,
                'admin' => 0,
                'avatar' => ('theme\app-assets\images\portrait\small\avatar-s-25.jpg')
            ],
            [
                'name' => 'hamza',
                'email' => 'hamza@gmail.com',
                'password' => \Hash::make('1234567890'),
                'address' => 'asdf-gh-021',
                'contact' => '12312312',
                'postal' => '123',
                'gender' => 0,
                'admin' => 0,
                'avatar' => ('theme\app-assets\images\portrait\small\avatar-s-25.jpg')
            ],
            [
                'name' => 'zain khan',
                'email' => 'zainkhan@gmail.com',
                'password' => \Hash::make('1234567890'),
                'address' => 'asdf-gh-021',
                'contact' => '12312312',
                'postal' => '123',
                'gender' => 0,
                'admin' => 0,
                'avatar' => ('theme\app-assets\images\portrait\small\avatar-s-25.jpg')
            ],
            [
                'name' => 'Faizanabid',
                'email' => 'faizanabid@gmail.com',
                'password' => \Hash::make('1234567890'),
                'address' => 'asdf-gh-021',
                'contact' => '12312312',
                'postal' => '123',
                'gender' => 0,
                'admin' => 0,
                'avatar' => ('theme\app-assets\images\portrait\small\avatar-s-25.jpg')
            ]
        ];
        foreach ($user as $u)
            User::create($u);
    }
}
