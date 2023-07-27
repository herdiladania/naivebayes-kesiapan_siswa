<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = [
            [
                'name' => 'admin',
                'password' => bcrypt('12345678'),
                'level' => 1,
                'email' => 'admin@sipamad.com',
            ],
        ];

        foreach ($user as $key => $value) {
            User::Create($value);
        }
    }
}
