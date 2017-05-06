<?php
namespace Blog\Seeders;
use Illuminate\Database\Seeder;
use Blog\UserRole;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        factory(\Blog\UserRole::class, 10)->create();
    }
}
