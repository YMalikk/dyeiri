<?php

namespace App\Modules\Content\Controllers;

use App\Modules\Blog\Models\Blog;
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

    public function showBlogs()
    {
        $posts = Blog::Where("status","=",1)->orderBy('created_at','desc')->get();
        return view('Content::showBlogs',compact('posts'));
    }

    public function showBlog($id)
    {
        $post = Blog::find($id);
        if($post)
        {
        return view('Content::showBlog',compact('post'));
        }
        else
        {
            alert()->error("La publication cherché n'exste pas","Erreur")->persistent("Ok");
            return redirect()->back();
        }
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
            $chefs = Chef::where('status','=',2)->get();
        }
        else
        {
            $foods = Food::where('category_id', '=', $request->category)->get();
            $chefs = array();
            foreach ($foods as $key => $food) {
                if($food->chef->status==2)
                {
                $chefs[$key] = $food->chef; // where status = 2;
                }
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
        return view('Content::searchResults',compact('chefs','lat','lng'));
    }


}
