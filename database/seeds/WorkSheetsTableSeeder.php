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
      for($i = 1; $i < 19; $i++) {
        $work_sheet = [
          'work_sheet_grade_id' => $i,
          'work_sheet_subject_id' => $i,
          'work_sheet_sub_subject_id' => $i,
          'price' => $faker->numberBetween(7000, 30000),
          'picture' => '1.jpg';
          'worksheet' => 'Worksheets-numbers.pdf',
        ];
        WorkSheet::create($work_sheet);
      }
    }
}
