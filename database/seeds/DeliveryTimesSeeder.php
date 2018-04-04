<?php

use Illuminate\Database\Seeder;
use App\Modules\Order\Models\DeliveryTime;
class DeliveryTimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryTime::create([
               'time'=>'12:00:00'
           ]);

        DeliveryTime::create([
            'time'=>'13:00:00'
        ]);

        DeliveryTime::create([
            'time'=>'14:00:00'
        ]);
    }
}
