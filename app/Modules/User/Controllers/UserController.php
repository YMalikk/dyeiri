<?php

namespace App\Modules\User\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

  public function showProfile()
  {
      return view('User::frontOffice.profile');
  }
}
