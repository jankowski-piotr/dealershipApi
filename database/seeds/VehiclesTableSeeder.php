<?php

use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Vehicle::class, 50)->create()->each(function($vehicle){
            $vehicle->features()->saveMany(App\Feature::all()->random(rand(0,10)));
        });
    }
}
