<?php

namespace App\Modules\User\Controllers;

use App\Modules\Food\Models\FoodOrderReview;
use App\Modules\Order\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function showProfile()
    {
      $user = Auth::user();
      $orders = Order::where('client_id','=',$user->id)->orderBy('created_at','desc')->get();
      $foodOrderReviews = FoodOrderReview::where('user_id','=',$user->id)->get();
      return view('User::frontOffice.profile',compact('orders','foodOrderReviews','user'));
    }
}
