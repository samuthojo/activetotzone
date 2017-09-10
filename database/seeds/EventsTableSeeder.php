<?php

use Illuminate\Database\Seeder;
use App\Event;

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
              'name' => $faker->sentence($faker->numberBetween(3, 5)),
              'description' => $faker->realText(120),
              'picture' => "$i.jpg",
              'venue' => $faker->city(),
              'link' => $faker->url(),
              'date' => $faker->dateTime(),
          ];
          Event::create($event);
      }
    }
}
