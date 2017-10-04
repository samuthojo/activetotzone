<?php

use Illuminate\Database\Seeder;
use App\SlideShow;

class SlideShowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for ($i=1; $i < 5; $i++) {
          $slideshow = [
              'slideshow' => "1.jpg",
          ];
          SlideShow::create($slideshow);
      }
    }
}
