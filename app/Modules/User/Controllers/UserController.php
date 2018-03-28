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
      $orders = Order::where('client_id','=',2)->orderBy('created_at','desc') ->get();
      return view('User::frontOffice.profile',compact('orders');
    }

}
