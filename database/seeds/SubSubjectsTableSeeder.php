<?php

use Illuminate\Database\Seeder;
use App\SubSubject;
class SubSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const READING = 1;
    const WRITING = 2;
    const MATH = 3;
    const ART_AND_COLORS = 4;
    const SOCIAL_STUDIES = 5;

    public function run()
    {
        $sub_subjects = ['Alphabet' => self::READING, 'Rhyming' => self::READING,
                         'Phonics' => self::READING, 'Writing Numbers' => self::WRITING,
                         'Pre-writing' => self::WRITING, 'Writing Letters' => self::WRITING,
                         'Patterns' => self::MATH, 'Shapes' => self::MATH,
                         'Addition' => self::MATH, 'Dot-to-Dot' => self::ART_AND_COLORS,
                         'Drawing & Coloring' => self::ART_AND_COLORS,
                         'Color by Number' => self::ART_AND_COLORS,
                         'Holidays' => self::SOCIAL_STUDIES, ];

        foreach ($sub_subjects as $key => $value) {
            SubSubject::create([
              'name' => $key,
              'subject_id' => $value,
            ]);
        }
    }
}
