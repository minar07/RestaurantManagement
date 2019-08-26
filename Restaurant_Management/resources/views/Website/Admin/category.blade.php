@extends('layouts.webadmin')
 
@section('content')
	<div class="row">
	    <ul>
	        @foreach ($items as $item)
	        <li>{{ $items->category }}</li>
	        @endforeach
	    </ul>
	</div>
@endsection