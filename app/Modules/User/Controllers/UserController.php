<?php

namespace App\Modules\User\Controllers;

use App\Modules\Chef\Models\Chef;
use App\Modules\Food\Models\FoodOrderReview;
use App\Modules\Order\Models\Order;
use App\Modules\User\Models\Message;
use App\Modules\User\Models\Schedule;
use App\Modules\User\Models\User;
use App\Modules\User\Models\WhichList;
use App\Modules\User\Models\WhichListUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Stichoza\GoogleTranslate\TranslateClient;
use Carbon\Carbon;

class UserController extends Controller
{

    public function showProfile()
    {
      $user = Auth::user();
      $orders = Order::where('client_id','=',$user->id)->orderBy('created_at','desc')->get();
      $foodOrderReviews = FoodOrderReview::where('user_id','=',$user->id)->get();
      $types[0]=1;$types[1]=2;$types[2]=3;$types[3]=4;
      $now = Carbon::now();
      $whichList=$user->whichList;
        $activeWhichList=$user->getActiveWhichList;
      return view('User::backOffice.profile',compact('orders','foodOrderReviews','user','types','now','whichList','activeWhichList'));
    }
    
     public function showProfileFront($id)
    {
      $user = User::find($id);
      return view('User::frontOffice.profile',compact('user'));
    }

    public function changeCurrentUser($currentUser)
    {
        if(Auth::check())
        {
        $user=Auth::user();
        switch($currentUser)
        {
            case 1 : $user->current_user=2;$user->save();
            if(!$user->whichList)
            {
                foreach($whichList=WhichList::all() as $which)
                {
                    WhichListUser::create([
                        'user_id'=>$user->id,
                        'which_id'=>$which->id,
                        'status'=>0,
                    ]);
                }
            }
                return redirect()->route('showProfile');
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
                for($i=0;$i<=6;$i++)
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
        $user=Auth::user();
        $deletedSentMessages=$user->messagesSentDeleted;
        $deletedReceivedMessages=$user->messagesReceiveDeleted;
        $sentMessages=$user->messagesSent;
        $receivedMessages=$user->messagesReceived;

        return view('User::backOffice.showMessage',compact('user','deletedReceivedMessages','receivedMessages','sentMessages','deletedSentMessages'));
    }

    public function handleSendMessage(Request $request)
    {
        $user=Auth::user();
        $verifyForm = Validator::make($request->all(), [
            'subject' => 'required|max:190|min:1',
            'message' => 'required|max:190|min:1',
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
            Message::create([
                'subject'=>$request->subject,
                'content'=>$request->message,
                'sender_id'=>$user->id,
                'to_id'=>1
            ]);
            alert()->success("Votre message a été envoyer avec succès",'Information')->persistent('Ok');
            return redirect()->back();
        }
    }

    public function handleDeleteMessage($id)
    {
        $message=Message::find($id);
        if($message)
        {
            $message->status=2;
            $message->save();
            alert()->success("Votre message a été supprimer avec succès",'Information')->persistent('Ok');
        }
        return redirect()->back();
    }

    public function handleRestoreMessage($id)
    {
        $message=Message::find($id);
        if($message)
        {
            $message->status=1;
            $message->save();
            alert()->success("Votre message a été restoré avec succès",'Information')->persistent('Ok');
        }
        return redirect()->back();
    }

    public function handleReadMessage(Request $request)
    {
       $messageRead=Message::find($request->messageId);
       if($messageRead)
       {
           $messageRead->status=1;
           $messageRead->save();
           return "done";
       }
       else
       {
           return "error 404";
       }

    }

    public function showDashboard()
    {
        $months=array(0,0,0,0,0,0,0,0,0,0,0,0);
        $monthsUser=array(0,0,0,0,0,0,0,0,0,0,0,0);
        $chefs= User::whereHas('roles', function($q){
            $q->where('title', 'chef');
        })->get();

        $users= User::whereHas('roles', function($q){
            $q->where('title', 'client');
        })->get();


        foreach($chefs as $chef)
        {
            $months[$chef->created_at->month-1]++;
        }

        foreach($users as $user)
        {
            $monthsUser[$user->created_at->month-1]++;
        }

        return view('User::admin.dashboard',compact('chefs','months','users','monthsUser'));
    }

    public function handleAdminSendMessage(Request $request)
    {
        $user = Auth::user();
        $verifyForm = Validator::make($request->all(), [
            'to'=>'required',
            'subject' => 'required|max:190|min:1',
            'message' => 'required|max:190|min:1',
        ]);

        if ($verifyForm->fails()) {
            $translator = new TranslateClient('en', 'fr');
            $result = "";
            $errorArray = $verifyForm->messages()->all();
            $checkAddress = false;

            foreach ($errorArray as $error) {

                //check if lat or lng or address is empty -> same error message
                if (($error == "The lng field is required.") || ($error == "The lat field is required.") || ($error == "The address field is required.")) {

                    if ($checkAddress === false) {
                        $checkAddress = true;
                        $result .= $translator->translate('Vérifier votre adresse') . ", ";
                    }
                } else {
                    $result .= $translator->translate($error) . ", ";
                }
            }
            //i use the substr cause always if we found error in the form the last caractére w'll be always ","
            alert()->error(substr($result, 0, strlen($result) - 1), 'Erreur')->persistent('Ok');
            return redirect()->back();
        } else {

            Message::create([
                'subject'=>$request->subject,
                'content'=>$request->message,
                'to_id'=>$request->to,
                'sender_id'=>$user->id,
            ]);
            alert()->success("Votre message a été envoyer avec succès",'Information')->persistent('Ok');
            return redirect()->back();
        }

    }

    public function showAdminMessages()
    {
        $user=Auth::user();
        $deletedSentMessages=$user->messagesSentDeleted;
        $deletedReceivedMessages=$user->messagesReceiveDeleted;
        $sentMessages=$user->messagesSent;
        $receivedMessages=$user->messagesReceived;
        $users= User::whereHas('roles', function($q){
            $q->where('title', '!=','admin');
        })->get();
        return view('User::admin.message',compact('user','deletedReceivedMessages','receivedMessages','sentMessages','deletedSentMessages','users'));
    }

    public function showChefList()
    {
        $chefs= User::whereHas('roles', function($q){
            $q->where('title', 'chef');
        })->get();

        return view('User::admin.chefList',compact('chefs'));
    }

    public function showClientList()
    {
        $users= User::whereHas('roles', function($q){
            $q->where('title', 'client');
        })->get();

        return view('User::admin.clientList',compact('users'));
    }
    
    public function showOrderList()
    {
        $orders= Order::all();
        return view('User::admin.orderList',compact('orders'));
    }

    public function handleDeleteWhich($id)
    {
        $which=WhichListUser::find($id);
        if($which)
        {
            $which->status=0;
            $which->save();
            alert()->success("Votre liste de souhaits a été mise à jour avec succès",'Information')->persistent('Ok');
        }

        return redirect()->back();
    }

    public function handleUpdateWhichList(Request $request)
    {
        $user=Auth::user();

        if(count($request->image)<=3)
        {
            foreach($user->whichList as $which)
            {
                $which->status=0;
                $which->save();
            }

        foreach($request->image as $image)
        {
            if($foundWhich=WhichList::find($image))
            {
                foreach($user->whichList as $whichImage)
                {
                    if($image==$whichImage->id)
                    {
                       $whichImage->status=1;
                       $whichImage->save();
                    }
                }
            }
        }
            alert()->success("Votre liste de souhait a été mise à jour avec succès","Information")->persistent("Ok");

        }
        else
        {
            alert()->error("Vous ne pouvez choisir que trois souhaits","Erreur")->persistent("Ok");

        }
        return redirect()->back();
    }
}
