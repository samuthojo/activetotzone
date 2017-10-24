<?php

use Illuminate\Database\Seeder;
use App\WorkSheetSubject;

class WorkSheetSubjectsTableSeeder extends Seeder
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
         WorkSheetSubject::create(compact('name'));
      }
    }
}
