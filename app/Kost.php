<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Order;

class Kost extends Model
{
    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function favorited()
    {
        return (bool) Favorite::where('user_id',Auth::id())
                            ->where('kost_id',$this->id)
                            ->first();
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
