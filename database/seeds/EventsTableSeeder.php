<?php

use Illuminate\Database\Seeder;
use App\Event;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for ($i=1; $i < 19; $i++) {
          $event = [
              'title' => $faker->sentence($faker->numberBetween(3, 5)),
              'description' => $faker->realText(120),
              'picture' => "1.jpg",
              'location' => array_rand([0,1]),
              'date' => $faker->date(),
              'time' => '7:30 AM',
          ];
          Event::create($event);
      }
    }
}
