<?php

use Illuminate\Database\Seeder;
use App\WorkSheetGrade;
class WorkSheetGradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $grades = ['PreSchool', 'Kindergarten', ];

      foreach($grades as $name) {
        WorkSheetGrade::create(compact('name'));
      }
    }
}
