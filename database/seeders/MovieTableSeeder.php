<?php

namespace Database\Seeders;

use App\Models\Movie;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('ganre_movie')->truncate();
        Movie::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $movie = Movie::create([
                'name' => $faker->name,
                'is_published' => $faker->boolean,
                'image' => 'movie/images/default.jpg'
            ]);

            $movie->genres()->attach($faker->numberBetween(1,10));
        }
    }
}
