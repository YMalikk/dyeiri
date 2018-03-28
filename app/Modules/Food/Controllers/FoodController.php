<?php

namespace App\Modules\Food\Controllers;

use App\Modules\Food\Models\Food;
use App\Modules\User\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    public function showFood($id)
    {
        $food = Food::find($id);
        $chef = $food->chef;
        $user=$chef->user;
        $reviews = $food->food_order_reviews;
        foreach($reviews as $review)
        {
            $users[$review->id] = User::find($review->user_id);
        }
        return view('Food::frontOffice.showFood',compact('food','chef','user','reviews','users'));
    }
}
