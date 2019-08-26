@extends('layouts.website')
 
@section('content')
    
    
    
    <section class="slider" style="height:135px;"></section>
    
    
    <div class="content">
	<!-- main content -->
    	<div class="container total-content">
    		<div class="row  checkout-heading">
                <h2>Your search result(s):</h2>                             
            </div>
    	</div>
    	<div class="total-content container">
    		<div class="menu-block container">
    			<div class="col-md-12 menu-heading">                 
    			</div>
    		    <div class="menu-container our-menu">
                    <div class="row">
                        @foreach ($menus as $item )
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="menu-body menu-left clearfix">
                                    <div class="menu-thumbnail col-xs-3">
                                        <img class="img-responsive center-block" src="/uploads/{{ $item->image }}" alt="">
                                    </div>
                                    <div class="menu-details col-xs-9">
                                        <div class="menu-title clearfix">
                                            <h4>{{$item->title}}</h4>
                                            <span class="price">${{$item->price}}</span>
                                        </div>
                                        <div class="menu-description">
                                            <p>{{$item->description}}</p>
                                        </div>
                                        <a href="{{ route('addTo_cart',$item->id) }}" class="btn btn-brand">Order Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
    			</div>
    	    </div>
        </div>
    </div>


@endsection