<?php

use Illuminate\Database\Seeder;
use App\WorkSheet;

class WorkSheetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker\Factory::create();

      $subjects = $sub_subjects = $grades = 1;
      $grades = ["PreSchool", "Kindergarten"];

      for($i = 1; $i < 3; $i++) {
        for ($j = 1; $j < 11; $j++){
            $work_sheet = [
                'work_sheet_grade_id' => $i,
                'work_sheet_subject_id' => 3,
                'work_sheet_sub_subject_id' => 1,
                'price' => 0,
                'title' => $grades[$i - 1] . " Numbers " . $j,
                'picture' => 'numbers-'.$j.'.png',
                'worksheet' => 'numbers-'.$j.'.pdf',
            ];
            WorkSheet::create($work_sheet);
        }
      }
    }
}
