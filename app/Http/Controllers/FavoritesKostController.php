<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Kost;

class FavoritesKostController extends Controller
{
    public function favorite(Kost $kost)
    {
    	Auth::user()->favorites()->attach($kost->id);

    	return back();
    }

    public function unFavorite(Kost $kost)
    {
    	Auth::user()->favorites()->detach($kost->id);
    }
}
