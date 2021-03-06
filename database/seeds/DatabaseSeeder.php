<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
        $this->call(FeaturesTableSeeder::class);
        $this->call(VehiclesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
    }
}
