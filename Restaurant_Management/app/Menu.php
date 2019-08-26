<?php

namespace App;
use App\Category;


use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{


    public $fillable = ['title','description','image','price','category_id','quantity'];

    public function category()
    {
        return $this->belongsto('\App\Category');
    }

    public function menu_category()
	{
	  return $this->hasMany('App\Category');
	}


    public function scopeSearch($query, $search){

        return $query->where('title','like','%' .$search. '%')
                    ->orWhere('description','like','%' .$search. '%');

    }

    public function searchableAs()
    {
        return 'menus';
    }

}
