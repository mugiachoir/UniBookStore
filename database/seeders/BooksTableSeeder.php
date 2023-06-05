<?php 
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID'); // Set Indonesian locale

        $publishers = DB::table('publishers')->pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence,
                'author' => $faker->name,
                'publisher_id' => $faker->randomElement($publishers),
                'publication_year' => $faker->numberBetween(1990, 2023),
                'price' => $faker->numberBetween(10, 100),
                'stock' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
