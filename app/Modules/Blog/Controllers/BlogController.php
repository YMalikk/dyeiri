<?php

namespace App\Modules\Blog\Controllers;

use App\Modules\Blog\Models\Blog;
use App\Modules\Chef\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Stichoza\GoogleTranslate\TranslateClient;
use Intervention\Image\ImageManagerStatic as Image;
class BlogController extends Controller
{

    public function showAddBlog()
    {
        $categories=Category::all();
        return view('Blog::showAddBlog',compact('categories'));
    }
    public function handleAddBlog(Request $request)
    {
        $verifyForm = Validator::make($request->all(), [
            'title' => 'required|max:190|min:1',
            'category' => 'required|max:190|min:1',
            'description' => 'required|min:1',
            'image'=>'required|image',
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

        if($request->file('image'))
        {

            $verifyImage=Validator::make($request->all(),
                [
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

            if(!$verifyImage->fails())
            {

                $image = $request->file('image');

                $nameImage = time().'.'.$image->getClientOriginalExtension();

                $destinationPath =  'storage/uploads/blog/'.$nameImage;

                Image::make($image->getRealPath())->resize(300, 300)->save($destinationPath);
                Blog::create([
                    'category_id'=>$request->category,
                    'admin_id'=>Auth::user()->id,
                    'image'=>$destinationPath,
                    'status'=>1,
                    'title'=>$request->title,
                    'description'=>$request->description
                ]);
                alert()->success("Votre publication a été ajouter avec succès","Information")->persistent("Ok");
                return redirect()->route('showBlogList');

            }
            else
            {
                alert()->error('Vérifié vote photo de profile','Erreur')->persistent('Ok');
                return redirect()->back();
            }
        }

    }

    public function showBlogList()
    {
        $blogs=Blog::all();
        return view('Blog::showBlogList',compact('blogs'));
    }

    public function handleEnableBlog($id)
    {
        $blog=Blog::find($id);
        if($blog)
        {
            $blog->status=1;
            $blog->save();
            alert()->success("Votre blog a été activer avec succès","Information")->persistent("Ok");
        }
        return redirect()->route('showBlogList');

    }

    public function handleDisableBlog($id)
    {
        $blog=Blog::find($id);
        if($blog)
        {
            $blog->status=0;
            $blog->save();
            alert()->success("Votre blog a été désactiver avec succès","Information")->persistent("Ok");
        }
        return redirect()->route('showBlogList');

    }

}
