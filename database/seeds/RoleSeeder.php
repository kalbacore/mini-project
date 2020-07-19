<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $abilities = [
            ['name' => 'view users'],
            ['name' => 'read messages'],
            ['name' => 'create messages'],
            ['name' => 'delete messages'],
        ];

        DB::table('abilities')->insert($abilities);

        $agent = Role::create([
            'name' => 'agent',
        ]);

        $agent->isAllowedTo($abilities);
    }
}
