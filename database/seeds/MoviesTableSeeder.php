<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 1000) as $index) {
            DB::table('movies')->insert([
                'title' => $faker->word,
                'year' => $faker->year,
                'director' => $faker->firstName . " " . $faker->lastName,
                'genre' => $faker->word,
                'country' => $faker->country,
                'duration_in_minutes' => $faker->randomNumber(3),
                'rating' => $faker->word,
                'created_at'=>new \DateTime(),
                'updated_at'=>new \DateTime(),
            ]);
        }
    }
}
