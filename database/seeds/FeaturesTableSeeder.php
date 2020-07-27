<?php

use App\Feature;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Feature');
        $features = [
            "Leather seats",
            "Sunroof/moonroof",
            "Heated seats",
            "Backup camera",
            "Navigation system",
            "Bluetooth",
            "Remote start",
            "Blind spot monitoring",
            "Third-row seating",
            "Apple CarPlay/Android Auto",
        ];
        foreach ($features as $f){
            Feature::create([
                'name' => $f,
                'cost' => $faker->randomElement(range(1000,10000,1000)),
            ]);
        }
    }
}
