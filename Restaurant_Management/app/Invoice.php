<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Invoice extends Model
{


    public $fillable = ['user_id','total','tax','discount','discountp','pmethod','pamount'];

	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
