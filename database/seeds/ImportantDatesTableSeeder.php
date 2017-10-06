<?php

use Illuminate\Database\Seeder;
use App\ImportantDate;

class ImportantDatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $issues = [
          'Opening Day',
          'Closing Day',
          "Parents-Teachers Meeting",
          "Get-Together Party",
          "Recreation Day",
        ];
        $faker = Faker\Factory::create();
        foreach($issues as $issue) {
          $the_date = [
            'date' => $faker->date,
            'issue' => $issue,
            'description' => $faker->realText(120),
          ];
          ImportantDate::create($the_date);
        }
    }
}
