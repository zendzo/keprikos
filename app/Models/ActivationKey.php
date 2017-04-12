<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivationKey extends Model
{	
	/**
	 * The Database Table used by model
	 * @var string
	 */
    protected $table = 'activation_keys';

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
