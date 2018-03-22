<?php

namespace App\Modules\User\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function showProfile()
    {
      return view('User::frontOffice.profile');
    }

}
