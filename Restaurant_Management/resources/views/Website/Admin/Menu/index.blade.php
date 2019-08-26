@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Menu</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('category-create')
	            <a class="btn btn-success" href="{{ route('menu.create') }}"> Create New Menu</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Image</th>
			<th>Title</th>
			<th>Price</th>
			<th>Quantity</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($items as $key => $item)
	<tr>
		<td>{{ ++$i }}</td>
		<td><img src="/uploads/{{ $item->image }}" style="width:100px;"/></td>
		<td>{{ $item->title }}</td>
		<td>{{ $item->price }}</td>
		<td>{{ $item->quantity }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('menu.show',$item->id) }}">Show</a>
			@permission('menu-edit')
			<a class="btn btn-primary" href="{{ route('menu.edit',$item->id) }}">Edit</a>
			@endpermission
			@permission('menu-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['menu.destroy', $item->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $items->render() !!}
@endsection