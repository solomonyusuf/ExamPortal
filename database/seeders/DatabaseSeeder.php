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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        StudentClass::create(array(
           'name'=> 'JSS1'
        ));
        StudentClass::create(array(
           'name'=> 'JSS2'
        ));
        StudentClass::create(array(
           'name'=> 'JSS3'
        ));
    }
}
