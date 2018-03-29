<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Chef\Models\Chef;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Modules\User\Models\User;
use App\Modules\User\Models\Schedule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Alert;

use Stichoza\GoogleTranslate\TranslateClient;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Modules\User\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return $user;
    }

    public function handleChefRegister(Request $request)
    {

        if($request->provider) {
            $verifyForm = Validator::make($request->all(), [
                'name' => 'required|max:190|min:1',
                'surname' => 'required|max:190|min:1',
                'email' => 'required|unique:users|email|'
            ]);

        }
        else
        {
            if($request->password!=$request->password2)
            {
                alert()->error("Vérfiez votre mot de passe","Erreur")->persistent("Ok");
                return redirect()->back();
            }
            $verifyForm = Validator::make($request->all(), [
                'name' => 'required|max:190|min:1',
                'surname' => 'required|max:190|min:1',
                'email' => 'required|unique:users|email|',
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

        $confirmation_code = str_random(25);
        $destinationPath = 'storage/uploads/chefs/chefImage.png';
        $destinationPathCoverPhoto='storage/uploads/chefs/chefCover.jpg';
        $dataUser = [
            'name' => $request->name,
            'image'=>$destinationPath,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'confirmation_code' => $confirmation_code,
            'current_user'=>1,
            'status' => 0,
        ];



        $user=User::create($dataUser);


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

        $user->assignRole(3);  //role 3 => chef
        Auth::logout();

        $content = array('confirmation_code' => $confirmation_code);
        Mail::send('User::emails.verify_account', $content, function ($message) use ($request) {
            $message->to($request['email'], $request['name'])
                ->subject(trans('Activé votre compte'));
        });

        alert()->warning('Consulter votre boite email pour activer votre compte.', 'Information')->persistent("Ok");
        return redirect()->route('showHome');
    }

    public function verifyUser($token)
    {
        $verifyUser = User::where('confirmation_code', $token)->first();
        if (isset($verifyUser)) {
            if ($verifyUser->status==0) {
                $verifyUser->status= 1;
                $verifyUser->save();
                Auth::login($verifyUser);
                if($verifyUser->hasRole('chef'))
                {
                    alert()->success('Votre e-mail est vérifier. veuillez compléter votre inscirption','Information')->persistent('Ok');
                    return redirect()->route('showChefRegisterStepTwo');
                }
                else
                {
                    alert()->success('Votre e-mail est vérifier.','Information')->persistent('Ok');
                }
            } else {
                Auth::login($verifyUser);
                alert()->success('Votre e-mail est déja vérifier','Information')->persistent('Ok');
            }
        } else {
            alert()->error('Votre email n\'est pas encore vérifier ','Erreur')->persistent('Ok');
        }
        return redirect('/');
    }

    public function showChefRegister()
    {
        return view('Chef::auth.chefRegister');
    }


    public function showClientRegister()
    {
        return view('User::auth.clientRegister');
    }

}
