<?php

use Illuminate\Database\Seeder;
use App\Subject;
class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = ['Reading', 'Writing', 'Math', 'Art & Colors',
                     'Social Studies', ];
        foreach ($subjects as $name) {
           Subject::create(compact('name'));
        }
    }
}
