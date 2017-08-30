<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Kost;
use App\Order;

class PagesController extends Controller
{
    public function getDashboard()
    {

    	$dataKosts = Auth::user()->kosts->sortByDesc('created_at');

    	$kostId = [];

    	foreach ($dataKosts as $kost) {
    		array_push($kostId, $kost['id']);
    	}

        //increment stock day_out
        $jatuhTempo = Order::whereIn('kost_id',$kostId)
        ->where('expired',false)
        ->where('day_out','=',Carbon::now()->today())->get();

        foreach ($jatuhTempo as $order) {
            Kost::where('id',$order->kost_id)->increment('roomAvailable',$order->qty);
            Order::where('id',$order->id)->update(['expired' => true]);
        }

    	$totalOrdered = Order::whereIn('kost_id',$kostId)->count();

    	$totalRented = Order::whereIn('kost_id',$kostId)->whereNotNull('paid_at')->count();

    	$totalPending = Order::whereIn('kost_id',$kostId)->whereNull('paid_at')->count();

    	return view('user.pages.dashboard',compact('dataKosts','totalOrdered','totalRented','totalPending'));
    }

    public function getBlank()
    {
    	return view('user.pages.blank');
    }
}
