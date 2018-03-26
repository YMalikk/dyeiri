<?php

namespace App\Modules\Order\Controllers;

use App\Modules\Chef\Models\Chef;
use App\Modules\Chef\Models\Food;
use App\Modules\Order\Models\FoodOrder;
use App\Modules\Order\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{

    public function showOrderSummary($id,Request $request)
    {
        $chef = Chef::find($id);
        $user= $chef->user;
        $price = 0;
        foreach ($request->foods as $key => $food_id)
        {
            $foods[$key] = Food::find($food_id);
            $price+= $foods[$key]->price * $request->quantity[$key];
        }
        $quantities = array();
        $quantities = $request->quantity;
        $todayDate = Carbon::now();
        return view('Order::frontOffice.orderSummary',compact('chef','price','foods','quantities','user',
                    'todayDate'));
    }

    public function handleOrder(Request $request,$id)
    {
        $user=Auth::user();
        $order = Order::create([
          'chef_id' => $id,
          'client_id' => $user->id,
          'status' => 0,
          'price' => $request->price
      ]);

      foreach ($request->foods as $key => $food_id)
      {
          FoodOrder::create([
              'order_id' => $order->id,
              'food_id' => $food_id,
              'quantity' => $request->quantities[$key]
          ]);
      }
        alert()->success('Veuillez attendre la confirmation du chef', 'Commande prise en compte')->persistent('Ok');
      return redirect()->route('showChefProfil',compact('id'));
    }
}
