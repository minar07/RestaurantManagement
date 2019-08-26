<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Buy extends Model
{


    public $fillable = ['item_id','user_id','rate','amount','qty'];

	protected $table = 'buy';
	
	public function item()
    {
        return $this->belongsTo('App\RawMaterial');
    }
	
	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
