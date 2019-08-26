<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{


    public $fillable = ['item_id','user_id','rate','qty','invoice'];

	protected $table = 'sale';
	
	public function item()
    {
        return $this->belongsTo('App\Sellableitem');
    }
	
	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
