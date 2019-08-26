@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Production</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('production-create')
	            <a class="btn btn-success" href="{{ route('production.create') }}"> Create New Production</a>
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
			<th>Raw Materials Id</th>
			<th>Sellable Item Id</th>
			<th>Raw Materials Quantity</th>
			<th>Sellable Items Quantity</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($items as $key => $item)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $item->raw_materialsid }}</td>
		<td>{{ $item->sellable_itemsid }}</td>
		<td>{{ $item->raw_materials_qty }}</td>
		<td>{{ $item->sellable_items_qty }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('production.show',$item->id) }}">Show</a>
			@permission('production-edit')
			<a class="btn btn-primary" href="{{ route('production.edit',$item->id) }}">Edit</a>
			@endpermission
			@permission('production-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['production.destroy', $item->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $items->render() !!}
@endsection