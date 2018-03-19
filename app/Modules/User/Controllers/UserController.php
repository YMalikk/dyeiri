<?php

namespace App\Modules\User\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class UserController extends Controller
{

    public function showProfile()
    {
      return view('User::frontOffice.profile');
    }

    public function showProfileChef()
    {
        return 'ici profile chef';
        return view('User::frontOffice.profile');
    }

    public function showChefSubscription()
    {
        return view('User::chefSubscription');
    }
}
