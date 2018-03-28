<?php

namespace App\Modules\Chef\Controllers;

use App\Modules\Chef\Models\Chef;
use App\Modules\Chef\Models\KitchenImage;
use App\Modules\Chef\Models\Review;
use App\Modules\Chef\Models\ReviewRating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Stichoza\GoogleTranslate\TranslateClient;

class ChefController extends Controller
{

    public function showChefProfile()
    {
        $user=Auth::user();
        $chef=$user->chef;
        $user=$chef->user;
        $entrees = $chef->getFoods->where('category_id','=',1);
        $mains = $chef->getFoods->where('category_id','=',2);
        $desserts = $chef->getFoods->where('category_id','=',3);
        $drinks = $chef->getFoods->where('category_id','=',4);
        $reviews = $chef->reviews;
         $kitchenImages=$chef->getKitchenImages;
        $orders = Order::where('chef_id','=',$chef->id)->orderBy('created_at','desc') ->get();
        return view('Chef::backOffice.chefProfile',compact('user','chef','drinks','kitchenImages','orders','entrees','desserts','mains','reviews'));
    }


    public function showChefSearchedProfile($id)
    {
        $chef=Chef::find($id);
        $user=$chef->user;
        $entrees = $chef->getFoods->where('category_id','=',1);
        $mains = $chef->getFoods->where('category_id','=',2);
        $desserts = $chef->getFoods->where('category_id','=',3);
        $drinks = $chef->getFoods->where('category_id','=',4);
        $reviews = $chef->reviews;
        $kitchenImages=$chef->getKitchenImages;
        return view('Chef::frontOffice.chefProfile',compact('user','chef','entrees','mains','drinks','desserts','reviews','kitchenImages'));
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
        if ($chef->status!=0)
        {
            return redirect()->route('showChefProfile');
        }
        return view('Chef::auth.chefRegisterStepTwo',compact('user','chef'));
    }

    public function handleCompleteRegisterChef(Request $request)
    {

        $user=Auth::user();
        if($request->speciality!=null)
        {
            $verifyForm = Validator::make($request->all(), [
                'speciality' => 'required|max:255',
                'address' => 'required|min:1',
                'mobile'=>'required|numeric',
                'country'=>'required',
                'kitchenImages'=>'required',
                'lng' => 'required|between:-180.00,180.00',
                'lat' => 'required|between:-90.00,90.00',
            ]);
        }
        else
        {
            $verifyForm = Validator::make($request->all(), [
                'address' => 'required|min:1',
                'mobile'=>'required|numeric',
                'country'=>'required',
                'kitchenImages'=>'required',
                'lng' => 'required|between:-180.00,180.00',
                'lat' => 'required|between:-90.00,90.00',
            ]);
        }

        if($verifyForm->fails())
        {
            $translator = new TranslateClient('en', 'fr');
            $result="";
            $errorArray=$verifyForm->messages()->all();
            $checkAddress=false;

            foreach($errorArray as $error)
            {

                //check if lat or lng or address is empty -> same error message
                if(($error=="The lng field is required.") || ($error=="The lat field is required.") || ($error=="The address field is required."))
                {

                    if($checkAddress===false)
                    {
                        $checkAddress=true;
                        $result.=$translator->translate('Vérifier votre adresse').", ";
                    }
                }
                else
                {
                    $result .= $translator->translate($error).", ";
                }
            }
            //i use the substr cause always if we found error in the form the last caractére w'll be always ","
            alert()->error(substr($result,0,strlen($result)-1),'Erreur')->persistent('Ok');
            return redirect()->back();
        }

        if($request->file('user_image'))
        {

            $verifyImage=Validator::make($request->all(),
                [
                    'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

            if(!$verifyImage->fails())
            {

                $image = $request->file('user_image');

                $nameImage = time().'.'.$image->getClientOriginalExtension();

                $destinationPath =  'storage/uploads/chefs/'.$nameImage;

                Image::make($image->getRealPath())->resize(300, 300)->save($destinationPath);
                $user->image=$destinationPath;

            }
            else
            {
                alert()->error('Vérifié vote photo de profile','Erreur')->persistent('Ok');
                return redirect()->back();
            }
        }

        if($request->file('cover_photo'))
        {

            $verifyImage=Validator::make($request->all(),
                [
                    'cover_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

            if(!$verifyImage->fails())
            {

                $image = $request->file('cover_photo');

                $nameImage = time().'.'.$image->getClientOriginalExtension();

                $destinationPath =  'storage/uploads/chefs/'.$nameImage;

                Image::make($image->getRealPath())->resize(300, 300)->save($destinationPath);
                $user->chef->cover_photo=$destinationPath;

            }
            else
            {
                alert()->error('Vérifié vote photo de couverture','Erreur')->persistent('Ok');
                return redirect()->back();
            }


        }


        $i=1;
        $kitchenImage="";
        $folderPath="storage/uploads/kitchen/user_num".Auth::user()->id;
        if( is_dir($folderPath) === false )
        {
            mkdir($folderPath);
        }

        foreach($request->kitchenImages as $image)
        {
            $img = $image;
            $img = str_replace('data:image/jpeg;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data= base64_decode($img);
            $image_name=$user->id.'-'.time().$i.'.jpeg';
            $imagePath = $folderPath."/".$image_name;
            file_put_contents($imagePath,$data);
            $kitchenImage.=$image_name.";";
            $i++;
            KitchenImage::create([
                'image'=>$imagePath,
                'status'=>0,
                'chef_id'=>$user->chef->id
            ]);
        }

        $user->save();
        $user->chef->status=1;
        $user->chef->address=$request->address;
        $user->chef->lat=$request->lat;
        $user->chef->lng=$request->lng;
        $user->chef->save();
        alert()->success("Votre inscription est compléte il faut attendre que l'administrateur confirme votre compte","Information")->persistent("Ok");
        return redirect()->route('showChefProfile');

    }
    
    public function confirmOrderChef($id)
    {
        $order = Order::find($id);
        $order->status = 1;
        $order->save();
        alert()->success('Veuillez nous notifier lorsque cette commande sera prête.', 'Commande confirmé')->persistent('Ok');
        return redirect()->back();
    }
    
     public function denyOrderChef($id)
    {
        $order = Order::find($id);
        $order->status = 5;
        $order->save();
        alert()->success('La commande a été annulé.', 'Commande annulé')->persistent('Ok');
        return redirect()->back();
    }
    
      public function denyOrderClient($id)
    {
        $order = Order::find($id);
        $order->status = 5;
        $order->save();
        alert()->success('La commande a été annulé.', 'Commande annulé')->persistent('Ok');
        return redirect()->back();
    }
    
      public function confirmDishReadyChef($id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        alert()->success('Votre avez confirmé que votre plat est prêt', 'Plat prêt')->persistent('Ok');
        return redirect()->back();
    }
}
