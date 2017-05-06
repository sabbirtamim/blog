<?php
namespace Blog\Seeders;
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
        factory(\Blog\User::class, 10)->create();
        
        // User::create(
        //     [
        //         'first_name'=>'Sabbir',
        //         'last_name'=>'Hossain',
        //         'username'=>'sabbirh87',
        //         'email'=>'sabbirh87@gmail.com',
        //         'password'=>bcrypt('sabbirh87'),
        //         'phone_number'=>1911913060,
        //         'gender'=>'male',
        //     ]
        // );
        // User::create(
        //     [
        //         'first_name'=>'Sabbir',
        //         'last_name'=>'Green',
        //         'username'=>'sabbir.hossain',
        //         'email'=>'sabbir.hossain@greentechsolutions.com',
        //         'password'=>bcrypt('sabbir.hossain'),
        //         'phone_number'=>1787690333,
        //         'gender'=>'male',
        //     ]
        // );
        // User::create(
        //     [
        //         'first_name'=>'Sabbir',
        //         'last_name'=>'Advice',
        //         'username'=>'shossain',
        //         'email'=>'shossain@adviceinteractive.com',
        //         'password'=>bcrypt('sabbir.hossain'),
        //         'phone_number'=>1784484545,
        //         'gender'=>'male',
        //     ]
        // );
        // User::create(
        //     [
        //         'first_name'=>'Tuhin',
        //         'last_name'=>'Bepari',
        //         'username'=>'digitaldreams40',
        //         'email'=>'digitaldreams40@gmail.com',
        //         'password'=>bcrypt('digitaldreams40'),
        //         'phone_number'=>1925000036,
        //         'gender'=>'male',
        //     ]
        // );
    }
}
