@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2> Show Production</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('production.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Raw Materials Id:</strong>
                {{ $item->raw_materialsid }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sellable Item Id:</strong>
                {{ $item->sellable_itemsid }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Raw Materials Quantity:</strong>
                {{ $item->raw_materials_qty }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sellable Items Quantity:</strong>
                {{ $item->sellable_items_qty }}
            </div>
        </div>
	</div>
@endsection