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

      $subjects = $sub_subjects = $grades = 1;

      for ($i=1; $i < 19; $i++) {
          $book = [
              'title' => $faker->sentence($faker->numberBetween(3, 5)),
              'price' => $faker->numberBetween(7000, 30000),
              'author' => $faker->name,
              'date_published' => $faker->date(),
              'description' => $faker->realText(120),
              'cover_image' => '1.jpg',
              'book_url' => 'TAARIFA-YA-MAONI-YA-WANANCHI.pdf',
              'subject_id' => $subjects,
              'grade_id' => $grades,
              'sub_subject_id' => $sub_subjects,
          ];
          Book::create($book);
          $subjects = ($subjects < 6) ? $subjects++ : 0;
          $grades = ($grades < 3) ? $grades++ : 0;
          $sub_subjects = ($sub_subjects < 14) ? $sub_subjects++ : 0;
      }
    }
}
