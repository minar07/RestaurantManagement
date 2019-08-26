@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Bought Items</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('buy-create')
	            <a class="btn btn-success" href="{{ route('buy.create') }}"> Create New Bought Item</a>
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
			<th>Item Name</th>
			<th>User Name</th>
			<th>Rate</th>
			<th>Amount</th>
			<th>Quantity</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($items as $key => $item)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $item->item->title }}</td>
		<td>{{ $item->user->name }}</td>
		<td>{{ $item->rate }}</td>
		<td>{{ $item->amount }}</td>
		<td>{{ $item->qty }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('buy.show',$item->id) }}">Show</a>
			@permission('buy-edit')
			<a class="btn btn-primary" href="{{ route('buy.edit',$item->id) }}">Edit</a>
			@endpermission
			@permission('buy-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['buy.destroy', $item->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $items->render() !!}
@endsection