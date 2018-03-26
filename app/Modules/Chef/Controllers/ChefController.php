<?php

namespace App\Modules\Chef\Controllers;

use App\Modules\Chef\Models\Chef;
use App\Modules\Chef\Models\Review;
use App\Modules\Chef\Models\ReviewRating;
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

    public function showChefProfil($id)
    {
        $chef=Chef::find($id);
        $user=$chef->user;
        $entrees = $chef->getFoods->where('category_id','=',1);
        $mains = $chef->getFoods->where('category_id','=',2);
        $desserts = $chef->getFoods->where('category_id','=',3);
        $drinks = $chef->getFoods->where('category_id','=',4);
        $reviews = Review::where('chef_id','=',$id)->get();
        return view('Chef::frontOffice.chefProfile',compact('user','chef','entrees','mains','drinks','desserts','reviews'));
    }
    
    
    public function handleChefReview(Request $request, $id)
    {
        $user=Auth::user();
        $reviews = $user->reviews->where('chef_id','=',$id)->first();
        if(isset($reviews))
        {
            alert()->error('Vous avez deja donné votre avis', 'Erreur')->persistent('Ok');
            return redirect()->back();
        }
        else
        {
            // review
            $review = Review::create([
                'content' => $request->review_text,
                'status' => 1,
                'chef_id' => $id,
                'client_id' => $user->id
            ]);

            // ici notes
            $reviewRatingAmount = ReviewRating::create([
                'rating' => $request->amount_review,
                'review_id' => $review->id,
                'rating_type_id' => 1
            ]);
            $reviewRatingClean = ReviewRating::create([
                'rating' => $request->clean_review,
                'review_id' => $review->id,
                'rating_type_id' => 2
            ]);
            $reviewRatingSpeed = ReviewRating::create([
                'rating' => $request->speed_review,
                'review_id' => $review->id,
                'rating_type_id' => 3
            ]);
            $reviewRatingPrice = ReviewRating::create([
                'rating' => $request->price_review,
                'review_id' => $review->id,
                'rating_type_id' => 4
            ]);
        }
        alert()->success('Avis ajouté', 'Reussi')->persistent('Ok');
        return redirect()->back();
    }
    
    public function showChefRegisterStepTwo()
    {
        $user=Auth::user();
        $chef=$user->chef;
        return view('Chef::auth.chefRegisterStepTwo',compact('user','chef'));
    }
}
