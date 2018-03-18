<?php

namespace App\Modules\Content\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{

    public function showHome()
    {
        return view('Content::home');
    }
}
