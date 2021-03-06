<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeed::class);
        $this->call(AdminSeed::class);
        $this->call(CategoriesSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(DeliveryTimesSeeder::class);
        $this->call(WhichListSeeder::class);
    }
}
