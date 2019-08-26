@extends('layouts.website')
 
@section('content')
      
    <section class="slider" style="height:135px;"></section>

    <div class="container"  style="text-align: center;">
        <br><br><br>
        <div class="thank-you-section">
            <h1>Thank you for <br> Your Order!</h1>
            <p>A confirmation email was sent</p>
            <div class="spacer"></div>
            <div>
                <a href="{{ url('/') }}" class="button">Home Page</a>
            </div>
        </div>   
       <br><br><br>  
    </div>   
@endsection