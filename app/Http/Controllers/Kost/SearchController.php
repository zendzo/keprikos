<?php

namespace App\Http\Controllers\Kost;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kost;
use Validator;

class SearchController extends Controller
{
    public function searchByGender(Request $request)
    {
    	$input = $request->gender;

    	switch ($input) {
    		case 'laki-laki':
    			$input = 1;
    			break;

			case 'perempuan':
				$input = 2;
				break;

    		default:
    			$input = 3;
    			break;
    	}

        $dataKosts = Kost::where('gender','like',"%".$input."%")
       				->orderBy('created_at','desc')
                    ->limit(9)->paginate(9);

        return view('kost.search',compact('dataKosts','input'));
    }

    public function searchByPrice()
    {
    	return view('kost.search-price');
    }

	public function searchByPriceResults(Request $request)
	{
		$input = $request->all();
		
		$min = $input['min'];
		$max = $input['max'];

		$validator = Validator::make($request->all(), [
            'min' => 'required|numeric|min:10000',
            'max' => 'required|numeric|min:10000',
        ]);

		if($validator->fails())
		{
			return redirect()->back()->withErrors($validator)->withInput()
							->with('message','Filed Harus diisi')
							->with('status','warning')
							->with('type','warning');
		}

		$dataKosts = Kost::whereBetween('priceMonthly',[$min,$max])->get();

		return view('kost.search-price',compact('dataKosts'));
	}
}
