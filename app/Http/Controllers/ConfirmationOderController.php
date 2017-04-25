<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Order;
use App\Kost;

class ConfirmationOderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kosts = Auth::user()->kosts;

        $kostId = [];

        foreach ($kosts as $kost) {
            array_push($kostId, $kost['id']);
        }

        $orders = Order::whereIn('kost_id',$kostId)->get();

        return view('confirmation.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderId = $request->get('id');

        $order = Order::findOrFail($orderId);

        $order->paid_at = Carbon::now();

        $order->day_in = Carbon::now();

        $order->day_out = Carbon::now()->addMonths($order->total_month);

        $order->save();

        Kost::where('id','=',$order->kost_id)->decrement('roomAvailable',$order->qty);

        return back()->with('message','Konfirmasi Pembayaran Berhasil!')
                    ->with('type','success')
                    ->with('status','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
