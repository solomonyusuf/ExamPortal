<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\StudentClass;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::create([
             'image'=> 'https://caricom.org/wp-content/uploads/Floyd-Morris-Remake-1024x879-1.jpg',
             'first_name' => 'Ankov',
             'last_name' => 'Baule',
             'middle_name' => 'Cavasr',
             'role' => 'superadmin',
             'locked' => false,
             'email' => 'superadmin@gmail.com',
             'password' => bcrypt(1234),
         ]);


        $cl = StudentClass::create(array(
           'name'=> 'JSS1'
        ));
        StudentClass::create(array(
           'name'=> 'JSS2'
        ));
        StudentClass::create(array(
           'name'=> 'JSS3'
        ));
        \App\Models\User::create([
            'image'=> 'https://caricom.org/wp-content/uploads/Floyd-Morris-Remake-1024x879-1.jpg',
            'first_name' => 'Ankov',
            'last_name' => 'Baule',
            'class_id' => $cl->id,
            'middle_name' => 'Cavasr',
            'role' => 'student',
            'locked' => false,
            'email' => 'student@gmail.com',
            'password' => bcrypt(1234),
        ]);
    }
}
