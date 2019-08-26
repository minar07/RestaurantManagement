<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Menu;


class Category extends Model
{


    public $fillable = ['id','category'];

    public function menus()
	{
	  return $this->hasMany('App\Menu');
	}

 	public function getRouteKeyName()
    {  
   		return 'category'; 
 	}


}
