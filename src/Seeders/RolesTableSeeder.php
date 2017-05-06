<?php

use Illuminate\Database\Seeder;
use Blog\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::create([
        //     'name' => 'admin',
        //     'description' => 'Administrators'
        // ]);
        // Role::create([
        //     'name' => 'user',
        //     'description' => 'User'
        // ]);
        factory(Blog\Role::class, 10)->create();        
    }
}
