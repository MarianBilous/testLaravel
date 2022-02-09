<?php

namespace Database\Seeders;

use App\Models\Genre;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Genre::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Genre::create([
                'name' => $faker->name,
            ]);
        }
    }
}
