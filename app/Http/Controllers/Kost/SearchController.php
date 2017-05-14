<?php

namespace App\Http\Controllers\Kost;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kost;

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
}
