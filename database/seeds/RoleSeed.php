<?php

use Illuminate\Database\Seeder;
use App\Modules\User\Models\Role;
class RoleSeed extends Seeder
{

    public function run()
    {
        Role::create([
            'title' => 'admin'
        ]);

        Role::create([
            'title' => 'client'
        ]);

        Role::create([
            'title' => 'chef'
        ]);

        Role::create([
            'title' => 'delivery_man'
        ]);

    }
}
