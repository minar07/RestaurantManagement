@extends('layouts.website')
 
@section('content')
      
    <section class="slider" style="height:135px;"></section>
    
    
    <div class="content">
	<!-- main content -->
	<div class="container">
		@if (session()->has('success_message'))
			<div class="alert alert-success">
				{{ session()->get('success_message') }}
			</div>
		@endif

		@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif	

		@if( Session::has( 'success' ))
			<div class="alert alert-success">
				{{ Session::get( 'success' ) }}
			</div>
		@elseif( Session::has( 'warning' ))
			<div class="alert alert-warning">
				{{ Session::get( 'warning' ) }}
			</div>
		@endif
	</div>

    	<div class="container">
		
    		<div class="row category-header"><span class="home"><a href="/">Home</a></span> > <span class="page">Your Cart</span></div>
		</div>
	
    	<div class="total-content container">
    		<div class="cart-block container">
    			<div class="col-md-12 cart-heading">
    				<h1>Shopping Cart</h1>
    			</div>
    		    <div class="hidden-xs">
					@if (Cart::count() == 0)
						<div class="row">
							<div class="cart-empty col-md-12 col-xs-12">
								<h3>Your Shopping Cart is Empty</h3>
								<h3>Click <a class="click-here" href="/">here</a> to continue shopping</h3>
							</div>
						</div>
					@endif	
                	<table class="table">
                    	 <thead>
            		        <tr>
            		            <th class="cart-item-image"></th>
            		            <th class="cart-item-title">Product Title</th>
                                <th>Price</th>
            		            <th  class="cart-item-quantity-heading">Quantity</th>
                                <th>Total</th>
            		            <th>Delete</th>
            		        </tr>
            		    </thead>
					</table>
					@foreach (Cart::content() as $item) 
            	        <div class="cart-item">
        					<table class="table">
        					    <tbody>
        					        <tr>
        					        	<td class="cart-item-image">
            					        	<a href="#">
            							        <img class="img-100" alt="Item Name" src="{{ asset('uploads/'.$item->model->image) }}">
            							    </a>
        							    </td>
        					            <td class="cart-item-title">
        					            	<span><a href="#">{{ $item->model->title }}</a></span>
        					            </td>
                                        <td class="cart-item-price">
												$ {{ $item->model->price }}
                                        </td>
                                        <td  class="cart-item-quantity">
											<input class="quantity-input" type="number" value="{{ $item->qty }}" step="1" min="1" id="qty" name="qty" data-id="{{ $item->rowId }}">
	
                                            <div class="quantity-error"></div>
                                        </td>
        					            <td class="cart-item-price"> ${{ $item->subtotal }}
        				                </td>
        					            <td class="cart-item-delete">
											<form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												<button type="submit" style="border-radius: 4px;" class="btn btn-light"><span class="glyphicon glyphicon-remove"></button>
										</form>
        				                </td>
        					        </tr>
        					       
        					    </tbody>
        					</table>
						</div>
					@endforeach	
					@if (Cart::count() != 0)
        				<span class="pull-right update-cart">
        					<input type="submit" class="btn btn-primary btn-update" value="Update Cart">
						</span>
					@endif
        				<div class="clearfix"></div>
    			</div>
    		    <div class="visible-xs-block">	
                	<div class="row">
                	    <div class="cart-empty col-md-12 col-xs-12">
                    		<h3>Your Shopping Cart is Empty</h3>
                            <h3>Click <a class="click-here" href="/">here</a> to continue shopping</h3>
                    	</div>
                	</div>
    		        <form action="" method="POST" class="form form-inline">
                	    <div class="cart-item">
    					    <div class="">
                        		<a href="#">
    						        <img  alt="Item Name" src="images/05.png">
    						    </a>
                        	</div>
                        	<div class="col-xs-8">
                        		<div class="xs-cart-item-title">
                        			<span><a href="#"></a></span>
                        		</div>
                        		<div class="cart-item-quantity">
                        	    	<label class="quantity-label" for="">Qty</label>
    				            	<input class="quantity-input" type="number" value="" step="1" min="1" id="qty" name="qty">
            						  	<div class="quantity-error"></div>
                            	</div>
                                <div class="xs-cart-item-price"></div>
                            	<div class="xs-cart-item-price"></div>
                        	</div>
                        	<div class="col-xs-1 cart-item-delete">
                        		<a class="btn btn-sm" href="#"><span class="glyphicon glyphicon-remove"></span></a>
                        	</div>
        				</div>
        				<span class="pull-right update-cart">
        					<input type="submit" class="btn btn-primary btn-update" value="Update Cart">
        				</span>
        				<div class="clearfix"></div>
        			</form>
    			</div>
    		    <div class="subtotal">
    				<div class="col-md-offset-9 col-sm-offset-8 col-md-3 col-sm-4" >
					Subtotal: <span>${{Cart::subtotal()}}</span>
    				</div>
    			</div>
                <div class="row">
        			<div class="col-md-3 cart-row checkout">
						@if (Cart::count() != 0)
							<div class="btn btn-primary btn-lg btn-checkout btn-continue-shopping"><a href="{{ route('home') }}">CONTINUE SHOPPING</a></div>
						@endif
					</div>
        			<div class="col-md-offset-6 col-md-3 cart-row checkout">
        				<div class="btn btn-primary btn-lg btn-checkout"><a href="{{ route('checkout.index') }}">CHECK OUT</a></div>
        			</div>
                </div>
    	    </div>
        </div>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity-input')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')

                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                    })
                    .then(function (response) {
                        // console.log(response);

                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
    </script>
	
@endsection