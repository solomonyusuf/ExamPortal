<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Instruction;
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

        Instruction::create(array(
           'content'=> '
1. Ensure your electronic device is connected to a stable internet connection before starting the exam.
2. Read all questions carefully and allocate your time wisely; you will have a set time limit for each section.
3. Do not refresh the browser or open any additional tabs/windows during the exam.
4. Click on the "Next" or "Submit" button to move to the next question or to finalize your response.
5. Use the provided tools (if any) for calculations or drafting your answers, if applicable.
6. Avoid discussing or sharing any exam content with others during or after the test.
7. In case of technical issues, immediately notify the exam proctor or support team for assistance.
8. Remember to review your answers before submitting the exam as changes cannot be made once submitted.'
        ));
    }
}
