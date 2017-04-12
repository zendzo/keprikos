<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function getDashboard()
    {
    	$dataKosts = Auth::user()->kosts;

    	return view('user.pages.dashboard',compact('dataKosts'));
    }

    public function getBlank()
    {
    	return view('user.pages.blank');
    }
}
