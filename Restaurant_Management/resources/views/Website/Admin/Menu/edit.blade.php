@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit Category</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('menu.index') }}"> Back</a>
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

	{!! Form::open(['action' => ['MenuController@update', $item->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
	<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {!! Form::text('title', $item->title, array('value' => '$item->title','class' => 'form-control')) !!}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', $item->description, array('value' => '$item->Description','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
				
                {!! Form::file('image', array('class' => 'form-control')) !!}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {!! Form::text('price', $item->price, array('value' => '$item->Price','class' => 'form-control')) !!}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <!-- <strong>Category:</strong>
            	<select name="category_id" id="" class="form-control selectpicker" data-live-search="true" title="Select a Category">
            		@foreach ($categories as $key => $category)
            			<option value="{{ $category->id }}" 
            				@if ($category->id == old('category_id', $category->id))
            					selected="selected"
        					@endif
    					>{{ $category->category }}</option>
            		@endforeach
            	</select> -->
				<label for="category"><strong>Category:</strong> </label>
						<select name="category_id" id="" title="Select a Category">
						@foreach ($categories as $cat)
							@if(old('category',$item->category_id) == $cat->id )
							<option value="{{ $cat->id }}" selected >{{ $cat->category }}</option>
							@else
							<option value="{{ $cat->id }}">{{ $cat->category }}</option>
							@endif
						@endforeach
						</select>  
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::text('quantity', $item->quantity, array('value' => '$item->Quantity','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::hidden('_method','PATCH') !!}
	{!! Form::close() !!}
@endsection