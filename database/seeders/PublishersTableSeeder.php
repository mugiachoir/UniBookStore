<?php 

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID'); // Set Indonesian locale

        for ($i = 0; $i < 10; $i++) {
            DB::table('publishers')->insert([
                'name' => $faker->company,
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->companyEmail,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
