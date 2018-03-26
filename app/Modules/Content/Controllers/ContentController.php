<?php

namespace App\Modules\Content\Controllers;

use App\Modules\Chef\Models\Category;
use App\Modules\Chef\Models\Chef;
use App\Modules\Chef\Models\Food;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{

    public function showHome()
    {
        $categories = Category::all();
        return view('Content::home',compact('categories'));
    }

    public function handleSearchFood(Request $request)
    {
        if(!isset($request->lat) || !isset($request->lng))
        {
            alert()->error('Veuillez entrer votre position', 'Erreur')->persistent('Ok');
            return redirect()->back();
        }
        $lat = $request->lat;
        $lng = $request->lng;
        if(!isset($request->category) || $request->category==0)
        {
            // tous les chefs
            $chefs = Chef::all();
        }
        else
        {
            $foods = Food::where('category_id', '=', $request->category)->get();
            $chefs = array();
            foreach ($foods as $key => $food) {
                $chefs[$key] = $food->chef; // where status = 1;
            }
        }
        // juste pour teste distance
        foreach ($chefs as $key => $chef)
        {
            $tab[$key] = (6371 * acos(cos(deg2rad($lat))
                    * cos(deg2rad($chef->lat))
                    * cos(deg2rad( $chef->lng )
                        - deg2rad($lng ))
                    + sin(deg2rad($lat))
                    * sin(deg2rad($chef->lat ))));

        }
        //dd($tab);
        for($i=0;$i<count($chefs)-1;$i++)
        {
            $sqlDistance1 = (6371 * acos(cos(deg2rad($lat))
                    * cos(deg2rad($chefs[$i]->lat))
                    * cos(deg2rad( $chefs[$i]->lng )
                        - deg2rad($lng ))
                    + sin(deg2rad($lat))
                    * sin(deg2rad($chefs[$i]->lat ))));

            $sqlDistance2 = (6371 * acos(cos(deg2rad($lat))
                    * cos(deg2rad($chefs[$i+1]->lat))
                    * cos(deg2rad( $chefs[$i+1]->lng )
                        - deg2rad($lng ))
                    + sin(deg2rad($lat))
                    * sin(deg2rad($chefs[$i+1]->lat ))));
            if($sqlDistance1 > $sqlDistance2 )
            {
                $tempChef = $chefs[$i];
                $chefs[$i] = $chefs[$i+1];
                $chefs[$i+1] = $tempChef;
            }
        }
        return view('Content::searchResults',compact('chefs'));
    }
}
