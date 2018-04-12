<?php

namespace App\Modules\Food\Controllers;

use App\Modules\Chef\Models\Review;
use App\Modules\Food\Models\FoodOrderReviewRating;
use App\Modules\Food\Models\Food;
use App\Modules\Food\Models\FoodOrderReview;
use App\Modules\User\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Queue\RedisQueue;

class FoodController extends Controller
{
    public function showFood($id)
    {
        $food = Food::find($id);
        $chef = $food->chef;
        $user=$chef->user;
        $reviews = $food->food_order_reviews;
        $chefReviews = Review::where('chef_id','=',$chef->id)->count();
        foreach($reviews as $review)
        {
            $users[$review->id] = User::find($review->user_id);
        }
        return view('Food::frontOffice.showFood',compact('food','chefReviews','chef','user','reviews','users'));
    }

    public function handleFoodReview(Request $request,$id)
    {
        $user=Auth::user();
        $review = FoodOrderReview::where('food_id','=',$id)->where('user_id','=',$user->id)->where('order_id','=',$request->order_id)->first();

        if(isset($review))
        {
            alert()->error('Vous avez deja donné votre avis', 'Erreur')->persistent('Ok');
            return redirect()->back();
        }
        else
        {
            // review
            $foodOrderReview = FoodOrderReview::create([
                'content' => $request->review_text,
                'status' => 1,
                'user_id' => $user->id,
                'food_id' => $id,
                'order_id' => $request->order_id
            ]);

            // ici notes
            $reviewRatingAmount = FoodOrderReviewRating::create([
                'rating' => $request->star1,
                'food_order_review_id' => $foodOrderReview->id,
                'rating_type_id' => 1
            ]);
            $reviewRatingClean = FoodOrderReviewRating::create([
                'rating' => $request->star2,
                'food_order_review_id' => $foodOrderReview->id,
                'rating_type_id' => 2
            ]);
            $reviewRatingSpeed = FoodOrderReviewRating::create([
                'rating' => $request->star3,
                'food_order_review_id' => $foodOrderReview->id,
                'rating_type_id' => 3
            ]);
            $reviewRatingPrice = FoodOrderReviewRating::create([
                'rating' => $request->star4,
                'food_order_review_id' => $foodOrderReview->id,
                'rating_type_id' => 4
            ]);
        }
        alert()->success('Avis ajouté', 'Reussi')->persistent('Ok');
        return redirect()->back();
    }

    public function handleChefAddFood(Request $request)
    {
        $food = Food::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'preparation_time' => $request->preparation_time,
            'status' =>1,
            'category_id' => $request->category_id,
            'chef_id' => $request->chef_id
        ]);
        if($food->exists)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
