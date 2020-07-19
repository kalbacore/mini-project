<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'Test Account',
                'email' => 'testy@example.com',
                'password' => Hash::make('password'),
            ],
        ]);

        User::find(1)->assignRole('agent');
    }
}
