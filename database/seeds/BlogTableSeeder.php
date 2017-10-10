<?php

use App\Blog;
use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $events = [
            [
                'title' => "Does your child gets enough sleep?",
                'date' => $faker->date,
                'author' => $faker->name,
                'description' => "Sleep is a vital need, essential to a child’s health and growth. Sleep promotes alertness, memory…",
                'image' => "zeblog1.png",
                'link' => "https://medium.com/@ActiveTotsZone/does-your-child-gets-enough-sleep-70099443028b?source=user_profile---------4----------------",
            ],
            [
                'title' => "How Can I Improve My Child’s Reading?",
                'date' => $faker->date,
                'author' => $faker->name,
                'description' => "Parents are more concerned about their child’s progress in reading than in any other subject…",
                'image' => "zeblog2.png",
                'link' => "https://medium.com/@ActiveTotsZone/how-can-i-improve-my-childs-reading-3cec221f4c92?source=user_profile---------2----------------",
            ],
            [
                'title' => "Play is work for preschoolers",
                'date' => $faker->date,
                'author' => $faker->name,
                'description' => "Children are playful by nature. Their earliest experiences exploring with their senses lead them to play…",
                'image' => "zeblog3.png",
                'link' => "https://medium.com/@ActiveTotsZone/play-is-work-for-preschoolers-ae98f61ea892?source=user_profile---------6----------------",
            ]
        ];

        for ($i=0; $i < 3; $i++) {
            $event = $events[$i];
            Blog::create($event);
        }
    }
}
