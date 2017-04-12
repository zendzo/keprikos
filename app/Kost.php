<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Kost extends Model
{
    protected $guarded = [];

    public function getPriceDailyAttribute($value)
    {
    	return number_format($value,0,'.',',');
    }

    public function getPriceWeeklyAttribute($value)
    {
    	return number_format($value,0,'.',',');
    }

    public function getPriceMonthlyAttribute($value)
    {
    	return number_format($value,0,'.',',');
    }

    public function getPriceYearlyAttribute($value)
    {
    	return number_format($value,0,'.',',');
    }

    public function getMinPayAttribute($value)
    {
    	return number_format($value,0,'.',',');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
