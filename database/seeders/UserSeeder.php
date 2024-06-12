<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{

    public $user;

    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $initialUsers = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '123456789',
                'password_confirmation' => '123456789',
            ],
        ];

        foreach ($initialUsers as $user) {
            if (!$this->user->where('email', $user['email'])->exists()) {
              User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt($user['password']),
              ]);
            }
        }
    }
}
