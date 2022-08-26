<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tasker;
use App\Models\Admin;
use App\Models\Es;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Admin::create([
        	'firstname' => 'Bikman',
            'lastname' =>'Djuma',
            'gender' => 'male',
            'phone' => '0785389000',
            'nat_id' => '1199380022064009',
            'image' => 'user.png',
            'email' => 'admin@gmail.com',
            'password'=>bcrypt('admin123@'),
        ]);

        Es::create([
        	'firstname' => 'Ally',
            'lastname' =>'Sibomana',
            'gender' => 'male',
            'phone' => '0787943106',
            'nat_id' => '1200080017654451',
            'image' => 'user.png',
            'email' => 'es@gmail.com',
            'password'=>bcrypt('es12345@'),
        ]);

        // Tasker::create([
        // 	'firstname' => 'Adibe',
        //     'lastname' =>'Singorina',
        //     'gender' => 'female',
        //     'phone' => '0728020881',
        //     'nat_id' => '1200080017823451',
        //     'image' => 'user.png',
        //     'email' => 'tasker@gmail.com',
        //     'password'=>bcrypt('tasker123@'),
        // ]);
    }
}
