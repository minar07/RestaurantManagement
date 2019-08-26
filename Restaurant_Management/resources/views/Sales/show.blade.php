@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Sold Items</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('sale-create')
	            <a class="btn btn-success" href="/print/{{ $items[0]->invoice}}"> Print</a>
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
			<th>Item Id</th>
			<th>User Id</th>
			<th>Rate</th>
			<th>Quantity</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($items as $key => $item)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $item->itemid }}</td>
		<td>{{ $item->uid }}</td>
		<td>{{ $item->rate }}</td>
		<td>{{ $item->qty }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('sale.show',$item->id) }}">Show</a>
			@permission('sale-edit')
			<a class="btn btn-primary" href="{{ route('sale.edit',$item->id) }}">Edit</a>
			@endpermission
			@permission('sale-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['sale.destroy', $item->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
@endsection