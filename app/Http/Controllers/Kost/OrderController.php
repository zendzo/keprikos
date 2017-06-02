<?php

namespace App\Http\Controllers\Kost;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Kost;
use App\Order;

class OrderController extends Controller
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
        $orders = Auth::user()->orders;

        return view('order.index',compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //cegah user memesan kost dengan id mereka sendiri
        $preventSelfOrder = Order::preventSelfOrder($request['kost_id']);

       if ($preventSelfOrder) {
            return back()->with('message','Anda tidak bisa memesan kost ini')
                        ->with('status','warning')
                        ->with('type','warning');
       }

       $input = $request->all();

       // deformat number_format from database
       $totalPrice = floatval(preg_replace('/[^\d.]/', '',$input['priceMonthly'])) * $input['totalMonths'] * $input['qty'];

       Auth::user()->orders()->create([
        'kost_id'       => $input['kost_id'],
        'qty'           => $input['qty'],
        'total_month'   => $input['totalMonths'],
        'total_price'   => $totalPrice,
        ]);

       return redirect()->route('user.dashboard')
                ->with('message', 'Pesanan anda telah tersimpan!')
                ->with('status','success')
                ->with('type','success');
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
