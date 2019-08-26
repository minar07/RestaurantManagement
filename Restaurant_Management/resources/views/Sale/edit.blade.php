@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit Sold Item</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('sale.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::model($item, ['method' => 'PATCH','route' => ['sale.update', $item->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Item:</strong>
                {!! Form::select('itemid', $sell,$sellItem, array('class' => 'form-control selectpicker','data-live-search' => 'true', 'id' => 'getRate')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::hidden('uid', null, array('placeholder' => 'User Id','class' => 'form-control')) !!}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rate:</strong>
                {!! Form::text('rate', null, array('placeholder' => 'Rate','class' => 'form-control', 'id' =>'getRateValue','readonly'=>'readonly')) !!}
            </div>
        </div><div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::text('qty', null, array('placeholder' => 'Quantity','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}
	<script>
		$( "#getRate" ).change(function() {

			var id = $( "#getRate" ).val();
		  	$( "#getRateValue" ).load( "{{ URL('sale/rate/') }}/" + id  , function(data) {
			  	var obj = jQuery.parseJSON( data );
			  	$( "#getRateValue" ).val(obj.rate);
			});
		});
	</script>
@endsection