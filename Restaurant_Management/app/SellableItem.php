<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class SellableItem extends Model
{


    public $fillable = ['title','rate'];

	protected $table = 'sellable_items';
}
