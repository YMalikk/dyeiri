<?php

namespace App\Modules\Order\Controllers;

use App\Modules\Chef\Models\Chef;
use App\Modules\Content\Models\Platform;
use App\Modules\Order\Models\DeliveryTime;
use App\Modules\Order\Models\FoodOrder;
use App\Modules\Order\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Food\Models\Food;
use Carbon\Carbon;

class OrderController extends Controller
{

    public function showOrderSummary($id,Request $request)
    {

        $chef = Chef::find($id);
        $user= $chef->user;
        $currentUser = Auth::user();
        $type = $request->option_2;

        $price = 0;
        foreach ($request->foods as $key => $food_id)
        {
            $foods[$key] = Food::find($food_id);
            $price+= $foods[$key]->price * $request->quantity[$key];
        }
        $quantities = array();
        $quantities = $request->quantity;
        $todayDate = Carbon::now();
        $plateform= Platform::find(1);
        $deliveryTimes = DeliveryTime::all();
        return view('Order::frontOffice.orderSummary',compact('type','chef','price','foods','quantities','user',
            'todayDate','plateform','deliveryTimes','currentUser'));
    }

    public function handleOrder(Request $request,$id)
    {
        $user=Auth::user();
        $delai=0;
        $todayDate = Carbon::now();
        $plateform= Platform::find(1);
        foreach ($request->foods as $key => $food_id)
        {
            $food = Food::find($food_id);
            if($food->category_id==2 || $food->category_id==5)
            {
                $delai=1;
                break;
            }
        }
        if($delai==1)
        {
           if($todayDate->toTimeString() > $plateform->time_limit)
           {
               alert()->error('Vous avez depassé le délai de prise de commande', 'Délai depassé')->persistent('Ok');
               return redirect()->route('showChefSearchedProfile',compact('id'));
           }
        }
        $price = $request->price;
        if($request->type=="delivery")
        {
            if($request->address)
            {
                $user->address = $request->address;
                $user->lat = $request->lat;
                $user->lng = $request->lng;
                $user->save();
                $price +=4;
            }
            else
            {
                alert()->error('Vous devez entrer une adresse de livraison', 'Adresse manquante')->persistent('Ok');
                return redirect()->route('showChefSearchedProfile',compact('id'));
            }
        }
        $order = Order::create([
            'chef_id' => $id,
            'client_id' => $user->id,
            'status' => 0,
            'price' => $price,
            'delivery_time_id' => $request->deliveryTime
        ]);
        $key=0;
        foreach ($request->foods as $key => $food_id)
        {
            FoodOrder::create([
                'order_id' => $order->id,
                'food_id' => $food_id,
                'quantity' => $request->quantities[$key]
            ]);
        }
        alert()->success('Veuillez attendre la confirmation du chef', 'Commande prise en compte')->persistent('Ok');
        return redirect()->route('showChefSearchedProfile',compact('id'));
    }
}
