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
          $book = [
              'title' => $faker->sentence($faker->numberBetween(3, 5)),
              'price' => $faker->numberBetween(7000, 30000),
              'author' => $faker->name,
              'date_published' => $faker->date(),
              'description' => $faker->realText(120),
              'cover_image' => '1.jpg',
              'book_url' => 'TAARIFA-YA-MAONI-YA-WANANCHI.pdf',
              'subject_id' => $i,
              'grade_id' => $i,
              'sub_subject_id' => $i,
          ];
          Book::create($book);
      }
    }
}
