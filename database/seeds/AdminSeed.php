<?php

use Illuminate\Database\Seeder;
use App\Modules\User\Models\User;
class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::create([
            'name'=>'admin',
            'surname'=>'admin',
            'email'=>'admin@dyeiri.com',
            'password'=>bcrypt('123456'),
            'status'=>1,
            'gender'=>1,
        ]);
        $user->assignRole(1); //role 1 => admin
    }
}
