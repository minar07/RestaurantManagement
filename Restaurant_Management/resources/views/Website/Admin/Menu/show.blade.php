@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2> Show Menu</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('menu.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="/uploads/{{ $item->image }}" style="width:50px;"/>
            </div>
            <div class="form-group">
                <strong>Title:</strong>
                {{ $item->title }}
            </div>
            <div class="form-group">
                <strong>Description:</strong>
                {{ $item->description }}
            </div>
            <div class="form-group">
                <strong>Category:</strong>
                {{ $item->category->category}}
            </div>
            <div class="form-group">
                <strong>Price:</strong>
                {{ $item->price }}
            </div>
            <div class="form-group">
                <strong>Quantity:</strong>
                {{ $item->quantity }}
            </div>
        </div>
	</div>
@endsection