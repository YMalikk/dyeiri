<?php

namespace App\Modules\User\Controllers;

use App\Modules\Chef\Models\Chef;
use App\Modules\Food\Models\FoodOrderReview;
use App\Modules\Order\Models\Order;
use App\Modules\User\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Stichoza\GoogleTranslate\TranslateClient;

class UserController extends Controller
{

    public function showProfile()
    {
      $user = Auth::user();
      $orders = Order::where('client_id','=',$user->id)->orderBy('created_at','desc')->get();
      $foodOrderReviews = FoodOrderReview::where('user_id','=',$user->id)->get();
      $types[0]=1;$types[1]=2;$types[2]=3;$types[3]=4;
      return view('User::frontOffice.profile',compact('orders','foodOrderReviews','user','types'));
    }

    public function changeCurrentUser($currentUser)
    {
        if(Auth::check())
        {
        $user=Auth::user();
        switch($currentUser)
        {
            case 1 : $user->current_user=2;$user->save(); return redirect()->route('showProfile');
            case 2 : $user->current_user=1;
            if(!$user->hasRole("chef"))
            {
                $destinationPathCoverPhoto='storage/uploads/chefs/chefCover.jpg';
                $dataChef=[
                    'cover_photo'=>$destinationPathCoverPhoto,
                    'likes_count'=>0,
                    'description'=>'',
                    'work'=>'',
                    'language'=>'Arabic',
                    'status'=>0,
                    'user_id'=>$user->id
                ];

                Chef::create($dataChef);
                for($i=1;$i<=7;$i++)
                {
                    Schedule::create([
                        'day'=>$i,
                        'status'=>0,
                        'user_id'=>$user->id
                    ]);
                }
                $user->assignRole(3);
            }

            $user->save();
            return redirect()->route('showChefProfile');
        }
        }
        else
        {
            return redirect()->route('showHome');
        }
    }

    public function editProfile(Request $request)
    {
        $user=Auth::user();
        $verifyForm = Validator::make($request->all(), [
            'name' => 'required|max:190|min:1',
            'surname' => 'required|max:190|min:1',
            'email' => 'required|email|',
            'lng' => 'between:-180.00,180.00',
            'lat' => 'between:-90.00,90.00',
        ]);
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
        else
        {
            $user->name=$request->name;
            $user->surname=$request->surname;
             if($user->email!= $request->email)
            {
                $user->email=$request->email;
            }
            if($request->password!=null)
            {
                $request->password=bcrypt($request->password);
            }
            if($request->address!=null)
            {
                $user->address=$request->address;
                $user->lat=$request->lat;
                $user->lng=$request->lng;
            }
            $user->save();
            alert()->success("Vos informations on été mise à jour avec succès","Information")->persistent("Ok");
            return redirect()->route('showProfile');
        }
    }

    public function showMessages()
    {
        return Auth::user()->messages;
    }

}
