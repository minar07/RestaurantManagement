<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Production extends Model
{


    public $fillable = ['raw_materialsid','sellable_itemsid','raw_materials_qty','sellable_items_qty'];

}
