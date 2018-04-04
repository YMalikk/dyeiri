<?php

use Illuminate\Database\Seeder;
use App\Modules\Content\Models\Platform;
class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       Platform::create([
           'time_limit'=>'11:00:00'
       ]);
    }
}
