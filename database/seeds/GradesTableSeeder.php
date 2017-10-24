<?php

use Illuminate\Database\Seeder;
use App\Grade;
class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = ['PreSchool', 'Kindergarten', ];

        foreach($grades as $name) {
          Grade::create(compact('name'));
        }
    }
}
