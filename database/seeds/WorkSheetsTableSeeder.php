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

      for($i = 1; $i < 19; $i++) {
        $work_sheet = [
          'work_sheet_grade_id' => $grades,
          'work_sheet_subject_id' => $subjects,
          'work_sheet_sub_subject_id' => $sub_subjects,
          'price' => $faker->numberBetween(7000, 30000),
          'title' => $faker->sentence($faker->numberBetween(3, 5)),
          'picture' => '1.jpg',
          'worksheet' => 'Worksheets-numbers.pdf',
        ];
        WorkSheet::create($work_sheet);
        $subjects = ($subjects < 6) ? $subjects++ : 0;
        $grades = ($grades < 3) ? $grades++ : 0;
        $sub_subjects = ($sub_subjects < 14) ? $sub_subjects++ : 0;
      }
    }
}
