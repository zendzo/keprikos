<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Notifications\PasswordResetNotification;
use App\Kost;
use App\Order;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
   use Authenticatable, CanResetPassword, Notifiable;

    protected $table = 'users';

    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function kosts()
    {
        return $this->hasMany(Kost::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Kost::class,'favorites','user_id','kost_id')->withTimeStamps();
    }
}
