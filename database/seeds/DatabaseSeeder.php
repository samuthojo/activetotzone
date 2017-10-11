<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(ImportantDatesTableSeeder::class);
        $this->call(BlogTableSeeder::class);
        $this->call(SlideShowsTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        $this->call(WorkSheetsTableSeeder::class);
    }
}
