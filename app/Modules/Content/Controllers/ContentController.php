<?php

namespace App\Modules\Content\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{

    public function showHome()
    {

        return view('Content::home');
    }
}
