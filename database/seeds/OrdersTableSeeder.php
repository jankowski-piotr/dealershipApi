<?php

use App\Employee;
use App\Vehicle;
use App\Client;
use App\Branch;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Group vehicles by aviability in branch
        $branches = App\Branch::all();

        foreach ($branches as $branch){
            // Create orders untill about 10 vechicles left unassigned
            while(
                App\Vehicle::where('branch_id',$branch->id)
                ->whereNotIn('id', DB::table('order_vehicle')->pluck('vehicle_id'))
                ->count()>2){
                    $order = new App\Order;
                    $order->employee()->associate(App\Employee::inRandomOrder()->first());
                    $order->client()->associate(App\Client::inRandomOrder()->first());
                    $order->branch()->associate($branch);
                    // Get random vehicles from branch
                    $vehicles = App\Vehicle::inRandomOrder()->where('branch_id',$branch->id)
                    ->whereNotIn('id', DB::table('order_vehicle')->pluck('vehicle_id'))
                    ->limit(rand(1,5))->get();
                    // Caluclate order cost
                    $order->cost = $vehicles->sum('cost');
                    $order->save();
                    $order->vehicles()->saveMany($vehicles);
            }
        }
    }
}
