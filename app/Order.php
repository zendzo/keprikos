<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Kost;
use Carbon\Carbon;

class Order extends Model
{

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
    
	protected $fillable = ['kost_id','qty','total','day_in','day_out','total_month','total_price'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function kosts()
    {
    	return $this->belongsToMany(Kost::class);
    }

    public static function preventSelfOrder($kost_id)
    {
        return (bool) Kost::where('user_id',Auth::id())->where('id',$kost_id)->first();
    }

}
