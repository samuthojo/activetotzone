<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
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
              'author' => $faker->name,
              'date_published' => $faker->dateTime(),
              'description' => $faker->realText(120),
              'cover_image' => "$i.jpg",
              'book_url' => $faker->url(),
          ];
          Book::create($event);
      }
    }
}
