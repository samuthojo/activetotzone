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

      $slides = ['1.jpg', '2.png', '3.png', '4.jpg', ];
      foreach ($slides as $slide) {
          $slideshow = [
              'slideshow' => $slide,
          ];
          SlideShow::create($slideshow);
      }
    }
}
