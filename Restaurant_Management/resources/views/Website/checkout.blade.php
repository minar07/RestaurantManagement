@extends('layouts.website')
 
@section('content')

<script src="https://js.stripe.com/v3/"></script>
      
    <section class="slider" style="height:135px;"></section>
    
    <div class="container">
        <div class="row">
            <div class="col col-lg-8"> 
                 <div class="content">
	<!-- main content -->
                        <div class="container">
                            <div class="row category-header">
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
                        </div> 
                        <div class="container">		
                            <div class="row category-header"><span class="home"><a href="/">Home</a></span> > <span class="page">Checkout</span></div>
                        </div>

             
                                <div class="checkout-heading">
                                    <h1>Checkout</h1>
                                    <h2>Billing Details</h2>
                                    <br>
                                </div>
    		             <div class="hidden-xs">
				
                        <div >
                            <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                                {{ csrf_field() }}        
                                <div class="form-group" >
                                    <label for="email" >Email Address</label>
                                    @if (auth()->user())
                                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                                    @else
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                                </div>
            
                                <div class="half-form">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="province">Province</label>
                                        <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" required>
                                    </div>
                                </div> <!-- end half-form -->
            
                                <div class="half-form">
                                    <div class="form-group">
                                        <label for="postalcode">Postal Code</label>
                                        <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                                    </div>
                                </div> <!-- end half-form -->
            
                                <div class="spacer"></div>
            
                                <h2>Payment Details</h2>
            
                                <div class="form-group">
                                    <label for="name_on_card">Name on Card</label>
                                    <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                                </div>
            
                                <div class="form-group">
                                    <label for="card-element">
                                    Credit or debit card
                                    </label>
                                    <div id="card-element">
                                    <!-- a Stripe Element will be inserted here. -->
                                    </div>
            
                                    <!-- Used to form errors -->
                                    <div id="card-errors" role="alert"></div>
                                </div>
                                <div class="spacer"></div>
            
                                <button type="submit" id="complete-order" class=" button btn-brand">Complete Order</button>
                            </form>
                            <br> <br>
                                 
                        </div>
    			    </div>   		                       
    	        </div>
            </div>

            <div class="col col-lg-4"> 
                <br><br><br>
                
                    <h1>Your Order</h1>
                    <br>
                    @foreach (Cart::content() as $item)
                        <table class="table">                            
                            <tr>
                                <th rowspan="2"><img style="width:80px" src="{{ asset('uploads/'.$item->model->image) }}" alt="item" class=""></th>
                                <th>{{ $item->model->title }}</th>
                                <th rowspan="2"><P style="padding:20px" >{{ $item->qty }}</P></th>

                            </tr>
                            <tr>
                                <th >${{ $item->model->price }}</th>  
                            </tr>                                                                                             
                        </table>
                    <hr>
                   @endforeach

                        <div class="checkout-totals">
                            <div class="checkout-totals-right">                                                  
                                <span class="checkout-totals-total"><strong>Total:</strong>  ${{Cart::subtotal()}}</span>                           
                        </div>
                            
                    {{-- <div class="checkout-totals-right">
                        {{ presentCartPrice(Cart::subtotal()) }} <br>
                        @if (session()->has('coupon'))
                        -{{ presentCartPrice(session()->get('coupon')['discount']) }} <br>
                        <hr>
                        Stuff
                        <br>
                        @endif
                        {{ presentCartPrice(Cart::tax()) }} <br>
                        <span class="checkout-totals-total">{{ presentCartPrice(Cart::total()) }}</span>

                    </div> --}}
                            
                {{--  
                    <div class="checkout-totals-right">
                        {{ presentCartPrice(Cart::subtotal()) }} <br>
                        @if (session()->has('coupon'))
                            -{{ presentCartPrice($discount) }} <br>
                            <hr>
                            {{ presentCartPrice($newSubtotal) }} <br>
                        @endif
                        {{ presentCartPrice($newTax) }} <br>
                        <span class="checkout-totals-total">{{ presentCartPrice($newTotal) }}</span>

                    </div> --}}
       </div>
    </div>         
  </div> 
</div>



    
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>


    <script>
        (function(){
            // Create a Stripe client.
            var stripe = Stripe('pk_test_PhZsG1XScTqDv2ct2GPKS1Fw');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style,
                hidePostalCode:true
                });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
            event.preventDefault();

             // Disable the submit button to prevent repeated clicks
             document.getElementById('complete-order').disabled = true;


            var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalcode').value
              }

            stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;

                // Enable the submit button
                document.getElementById('complete-order').disabled = false;
                } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
                }
            });
            });

          function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
}

        })();
    </script>
	
@endsection