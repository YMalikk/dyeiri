<?php

namespace App\Modules\Chef\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChefController extends Controller
{

    public function showChefProfile()
    {
        $user=Auth::user();
        $chef=$user->chef;

        return view('Chef::backOffice.chefProfile',compact('user','chef'));
    }

    public function showChefRegisterStepTwo()
    {
        $user=Auth::user();
        $chef=$user->chef;
        return view('Chef::auth.chefRegisterStepTwo',compact('user','chef'));
    }
}
