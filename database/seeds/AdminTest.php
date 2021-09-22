<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminTest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
            'name' => 'TestUser',
            'email' => 'testuser@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
