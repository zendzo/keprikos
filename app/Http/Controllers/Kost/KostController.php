<?php

namespace App\Http\Controllers\Kost;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\CreateKostRequest;
use App\Kost;

class KostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create','store','edit','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataKosts = Kost::select('id','name','city','address','coverPhoto','descriptions','priceMonthly','hpAgent','roomAvailable')
        ->where('roomAvailable','>',0)
        ->paginate(9);

        return view('kost.index',compact('dataKosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kost.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateKostRequest $request)
    {

        $input = $request->all();

        $folderImage = config('settings.folder_upload_location').Carbon::now(new \DateTimeZone('Asia/Jakarta'))
                        ->toDateString()."-".$request['name']."/";

        if ($files = $request->file()) {
            $dataPhotos = [];
            foreach ($files as $fileKey => $fileValue) {
                if ($fileValue->isValid()) {
                    $fileName = md5(rand(0,2000)).'.'.$request->$fileKey->getClientOriginalExtension();
                    array_push($dataPhotos, [$fileKey,$folderImage.$fileName]);
                    $request->$fileKey->move(public_path($folderImage), $fileName);
                }
            }
        }

        foreach ($dataPhotos as $key => $value) {
            if(isset($input[$value[0]]))
            {
                $input[$value[0]] = $value[1];
            }
        }

        if (is_null($input['otherFacilityPhoto'])) {
            $input['otherFacilityPhoto'] = null;
        }
        if ($input['minPay']) {
            $input['minPay'] = $input['minPay'] * $input['priceMonthly'];
        }

        \Auth::user()->kosts()->create($input);

        return redirect()->route('user.dashboard')
                ->with('message', 'Data kost telah tersimpan!')
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
        $kost = Kost::findOrFail($id);

        $dataKosts = Kost::select('id','name','city','address','coverPhoto','descriptions','priceMonthly','hpAgent','roomAvailable')
        ->where('city','like',$kost->city)
        ->limit(6)
        ->get();

        $dataPhotos = collect([
        $kost->coverPhoto,
        $kost->buildingPhoto,
        $kost->roomFrontPhoto,
        $kost->roomInsidePhoto,
        $kost->toiletFrontPhoto,
        $kost->toiletInsidePhoto,
        $kost->otherFacilityPhoto,
        ]);

        return view('kost.show',compact('kost','dataPhotos','dataKosts'));
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

    /**
     * Search spicfiy kost item with keyword
     * @param  string $keyword keyword by city,name,location. etc
     * @return array          search results
     */
    public function search(Request $request)
    {
        $input = $request->keyword;

        $dataKosts = Kost::where('name','like',"%".$input."%")
                    ->orWhere('address','like',"%".$input."%")
                    ->orWhere('city','like',"%".$input."%")->limit(9)->paginate(9);

        return view('kost.search',compact('dataKosts','input'));
    }

    /**
     * return json data to complete the easyautocomplete jquery plugin
     * @param  Request $keyword keyword to search data
     * @return json           to fill easyautocplete
     */
    public function searchAutocomplete(Request $keyword)
    {
        try {
            $statusCode = 200;
            $response = [
                'kosts' => []
            ];

            $kosts = Kost::all();
            foreach ($kosts as $kost) {
                $response['kosts'][] = [
                    'name'      => $kost->name,
                    'address'   => $kost->address,
                    "city"      => $kost->city
                ];
            }
        } catch (Exception $e) {
            $statusCode = 400;
        }finally{
            return \Response::json($response,$statusCode);
        }
    }
}
