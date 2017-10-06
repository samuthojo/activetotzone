<?php

use Illuminate\Database\Seeder;
use App\Testimonial;

class TestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $relations = [
        "Ken's Dad", "Karen's Sister", "John's Uncle",
        "Priscilla's Mother", "Kenedy's Brother", "Lilian's Aunt",
        "Nancy's GrandMother", "Calvin's GrandFather", "Noela's Mother",
        "George's Dad",
      ];
      $faker = Faker\Factory::create();
      foreach($relations as $relation) {
        $testimonial = [
          'name' => $faker->name,
          'relationship' => $relation,
          'description' => $faker->paragraph(3, true),
        ];
        Testimonial::create($testimonial);
      }
    }
}
