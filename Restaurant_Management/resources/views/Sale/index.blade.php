@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Sold Items</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('sale-create')
	            <a class="btn btn-success" href="{{ route('sale.create') }}"> Create New Sold Item</a>
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
			<th>Invoice Id</th>
			<th>User Name</th>
			<th>Amount</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($items as $key => $item)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $item->id }}</td>
		<td>{{ $item->user->name }}</td>
		<td>{{ $item->total }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('sale.show',$item->id) }}">Edit</a>
			<a class="btn btn-info" href="/print/{{ $item->id }}">Print</a>
			<a class="btn btn-info" href="/printck/{{ $item->id }}">Print kitchen</a>
			@permission('sale-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['sale.destroy', $item->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $items->render() !!}
@endsection