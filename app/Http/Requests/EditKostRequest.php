<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditKostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|min:5',
            'address'   => 'required|min:5',
            'owner' => 'required',
            'ownerPhone'    => 'required',
            'manager'   => 'required',
            'managerPhone'  => 'required',
            'phone' => 'required',
            'geoName'   => 'required',
            'latitude'  => 'required',
            'longitude'  => 'required',
            'subdistrict'   => 'required',
            'city'  => 'required',
            'priceDaily'    => 'required',
            'priceWeekly'   => 'required',
            'priceMonthly'  => 'required',
            'priceYearly'   => 'required',
            'roomCount' => 'required',
            'size'  => 'required',
            'status'    => 'required',
            'roomAvailable' => 'required',
            'animal'    => 'required',
            'nameAgent' => 'required',
            'emailAgent'    => 'required',
            'hpAgent'   => 'required',
            'statusAgent'   => 'required',
        ];
    }
}
