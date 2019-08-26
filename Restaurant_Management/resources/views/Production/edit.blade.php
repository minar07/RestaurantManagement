@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit Production</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('production.index') }}"> Back</a>
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
	{!! Form::model($item, ['method' => 'PATCH','route' => ['production.update', $item->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Raw Materials Id:</strong>
                {!! Form::text('raw_materialsid', null, array('placeholder' => 'Raw Materials Id','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sellable Item Id:</strong>
                {!! Form::text('sellable_itemsid', null, array('placeholder' => 'Sellable Item Id','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Raw Materials Quantity:</strong>
                {!! Form::text('raw_materials_qty', null, array('placeholder' => 'Raw Materials Quantity','class' => 'form-control')) !!}
            </div>
        </div><div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sellable Items Quantity:</strong>
                {!! Form::text('sellable_items_qty', null, array('placeholder' => 'Sellable Items Quantity','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}
@endsection