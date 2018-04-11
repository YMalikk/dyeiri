<?php

use Illuminate\Database\Seeder;
use App\Modules\User\Models\WhichList;
class WhichListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=9;$i++)
        {
        WhichList::create([
            'image'=>asset('storage/which_list_images/which'.$i.'.jpg'),
            'status'=>1
        ]);
        }
    }
}
