<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

   public function getHome()
   {
   		return view('front.pages.home');
   }
}
