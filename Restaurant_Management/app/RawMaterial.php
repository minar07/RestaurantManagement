<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class RawMaterial extends Model
{


    public $fillable = ['title'];

	protected $table = 'raw_matetials';
}
