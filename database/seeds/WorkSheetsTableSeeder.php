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
      $types = [
        'numbers', 'alphabets', 'words', 'sentences', 'drawings',
      ];
      $faker = Faker\Factory::create();
      foreach($types as $type) {
        $work_sheet = [
          'type' => $type,
          'worksheet' => 'Worksheets-numbers.pdf',
        ];
        WorkSheet::create($work_sheet);
      }
    }
}
