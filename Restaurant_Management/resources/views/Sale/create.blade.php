@extends('layouts.app')
 
@section('content')
<script>
var sectionsCount = 1;

</script>
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Sale New Item</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('sale.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::open(array('route' => 'sale.store','method'=>'POST')) !!}
<div id="sections">
	<div class="row section" id="sale-container2">
		<div class="col-xs-12 col-sm-12 col-md-12">
			{!! Form::text('total', 0, array('placeholder' => 'User Id','class' => 'btn btn-success pull-right btn-lg',"id" => 'total')) !!}
			<strong class="pull-right btn-lg" style="color:green">Total Bill Amount:</strong>
		</div>
	</div>
	<div class="row section" id="sale-container0">
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Item:</strong>
                {!! Form::select('item_id[]', $sell,[], array('title' => 'Select an Item','class' => 'form-control selectpicker','data-live-search' => 'true', 'id' => 'getRate1')) !!}
            </div>
        </div>
        <div class="form-group hide">
            {!! Form::hidden('uid', Auth::id(), array('placeholder' => 'User Id','class' => 'form-control')) !!}
			
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Rate:</strong>
                {!! Form::text('rate[]', null, array('placeholder' => 'Rate','class' => 'form-control', 'id' =>'getRateValue1','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::text('qty[]', null, array('placeholder' => 'Quantity','class' => 'form-control', 'id' => 'qty1')) !!}
            </div>
        </div>
	</div>
	<div class="row section" id="sale-container0" style="display: none;">
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Item:</strong>
                {!! Form::select('item_id[]', $sell,[], array('title' => 'Select an Item','class' => 'form-control selectpicker','data-live-search' => 'true', 'id' => 'getRate2')) !!}
            </div>
        </div>
        <div class="form-group hide">
            {!! Form::hidden('uid', Auth::id(), array('placeholder' => 'User Id','class' => 'form-control')) !!}
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Rate:</strong>
                {!! Form::text('rate[]', null, array('placeholder' => 'Rate','class' => 'form-control', 'id' =>'getRateValue2','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::text('qty[]', null, array('placeholder' => 'Quantity','class' => 'form-control', 'id' => 'qty2')) !!}
            </div>
        </div>
	</div>
	<div class="row section" id="sale-container0" style="display: none;">
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Item:</strong>
                {!! Form::select('item_id[]', $sell,[], array('title' => 'Select an Item','class' => 'form-control selectpicker','data-live-search' => 'true', 'id' => 'getRate3')) !!}
            </div>
        </div>
        <div class="form-group hide">
            {!! Form::hidden('uid', Auth::id(), array('placeholder' => 'User Id','class' => 'form-control')) !!}
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Rate:</strong>
                {!! Form::text('rate[]', null, array('placeholder' => 'Rate','class' => 'form-control', 'id' =>'getRateValue3','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::text('qty[]', null, array('placeholder' => 'Quantity','class' => 'form-control', 'id' => 'qty3')) !!}
            </div>
        </div>
	</div>
	<div class="row section" id="sale-container0" style="display: none;">
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Item:</strong>
                {!! Form::select('item_id[]', $sell,[], array('title' => 'Select an Item','class' => 'form-control selectpicker','data-live-search' => 'true', 'id' => 'getRate4')) !!}
            </div>
        </div>
        <div class="form-group hide">
            {!! Form::hidden('uid', Auth::id(), array('placeholder' => 'User Id','class' => 'form-control')) !!}
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Rate:</strong>
                {!! Form::text('rate[]', null, array('placeholder' => 'Rate','class' => 'form-control', 'id' =>'getRateValue4','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::text('qty[]', null, array('placeholder' => 'Quantity','class' => 'form-control', 'id' => 'qty4')) !!}
            </div>
        </div>
	</div>
	<div class="row section" id="sale-container0" style="display: none;">
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Item:</strong>
                {!! Form::select('item_id[]', $sell,[], array('title' => 'Select an Item','class' => 'form-control selectpicker','data-live-search' => 'true', 'id' => 'getRate5')) !!}
            </div>
        </div>
        <div class="form-group hide">
            {!! Form::hidden('uid', Auth::id(), array('placeholder' => 'User Id','class' => 'form-control')) !!}
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Rate:</strong>
                {!! Form::text('rate[]', null, array('placeholder' => 'Rate','class' => 'form-control', 'id' =>'getRateValue5','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::text('qty[]', null, array('placeholder' => 'Quantity','class' => 'form-control', 'id' => 'qty5')) !!}
            </div>
        </div>
	</div>
	<div class="row section" id="sale-container0" style="display: none;">
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Item:</strong>
                {!! Form::select('item_id[]', $sell,[], array('title' => 'Select an Item','class' => 'form-control selectpicker','data-live-search' => 'true', 'id' => 'getRate6')) !!}
            </div>
        </div>
        <div class="form-group hide">
            {!! Form::hidden('uid', Auth::id(), array('placeholder' => 'User Id','class' => 'form-control')) !!}
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Rate:</strong>
                {!! Form::text('rate[]', null, array('placeholder' => 'Rate','class' => 'form-control', 'id' =>'getRateValue6','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::text('qty[]', null, array('placeholder' => 'Quantity','class' => 'form-control', 'id' => 'qty6')) !!}
            </div>
        </div>
	</div>
	<div class="row section" id="sale-container0" style="display: none;">
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Item:</strong>
                {!! Form::select('item_id[]', $sell,[], array('title' => 'Select an Item','class' => 'form-control selectpicker','data-live-search' => 'true', 'id' => 'getRate7')) !!}
            </div>
        </div>
        <div class="form-group hide">
            {!! Form::hidden('uid', Auth::id(), array('placeholder' => 'User Id','class' => 'form-control')) !!}
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Rate:</strong>
                {!! Form::text('rate[]', null, array('placeholder' => 'Rate','class' => 'form-control', 'id' =>'getRateValue7','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::text('qty[]', null, array('placeholder' => 'Quantity','class' => 'form-control', 'id' => 'qty7')) !!}
            </div>
        </div>
	</div>
	<div class="row section" id="sale-container0" style="display: none;">
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Item:</strong>
                {!! Form::select('item_id[]', $sell,[], array('title' => 'Select an Item','class' => 'form-control selectpicker','data-live-search' => 'true', 'id' => 'getRate8')) !!}
            </div>
        </div>
        <div class="form-group hide">
            {!! Form::hidden('uid', Auth::id(), array('placeholder' => 'User Id','class' => 'form-control')) !!}
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Rate:</strong>
                {!! Form::text('rate[]', null, array('placeholder' => 'Rate','class' => 'form-control', 'id' =>'getRateValue8','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::text('qty[]', null, array('placeholder' => 'Quantity','class' => 'form-control', 'id' => 'qty8')) !!}
            </div>
        </div>
	</div>
	<div class="row section" id="sale-container0" style="display: none;">
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Item:</strong>
                {!! Form::select('item_id[]', $sell,[], array('title' => 'Select an Item','class' => 'form-control selectpicker','data-live-search' => 'true', 'id' => 'getRate9')) !!}
            </div>
        </div>
        <div class="form-group hide">
            {!! Form::hidden('uid', Auth::id(), array('placeholder' => 'User Id','class' => 'form-control')) !!}
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Rate:</strong>
                {!! Form::text('rate[]', null, array('placeholder' => 'Rate','class' => 'form-control', 'id' =>'getRateValue9','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::text('qty[]', null, array('placeholder' => 'Quantity','class' => 'form-control', 'id' => 'qty9')) !!}
            </div>
        </div>
	</div>
	<div class="row section" id="sale-container0" style="display: none;">
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Item:</strong>
                {!! Form::select('item_id[]', $sell,[], array('title' => 'Select an Item','class' => 'form-control selectpicker','data-live-search' => 'true', 'id' => 'getRate10')) !!}
            </div>
        </div>
        <div class="form-group hide">
            {!! Form::hidden('uid', Auth::id(), array('placeholder' => 'User Id','class' => 'form-control')) !!}
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Rate:</strong>
                {!! Form::text('rate[]', null, array('placeholder' => 'Rate','class' => 'form-control', 'id' =>'getRateValue10','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::text('qty[]', null, array('placeholder' => 'Quantity','class' => 'form-control', 'id' => 'qty10')) !!}
            </div>
        </div>
	</div>
<p>
<a href="#" class='additem2'>Add Item</a>
<a href="#" class='additem3' style="display: none;">Add Item</a>
<a href="#" class='additem4' style="display: none;">Add Item</a>
<a href="#" class='additem5' style="display: none;">Add Item</a>
<a href="#" class='additem6' style="display: none;">Add Item</a>
<a href="#" class='additem7' style="display: none;">Add Item</a>
<a href="#" class='additem8' style="display: none;">Add Item</a>
<a href="#" class='additem9' style="display: none;">Add Item</a>
<a href="#" class='additem10' style="display: none;">Add Item</a>
</p>
	<div class="row section" id="sale-container2">
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Vat:</strong>
                {!! Form::text('tax', 0, array('placeholder' => 'Vat %','class' => 'form-control', 'id' => 'tax')) !!}
            </div>
        </div>
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Discount Percentage %:</strong>
                {!! Form::text('discountp', 0, array('placeholder' => 'Discount Percentage','class' => 'form-control', 'id' => 'discountp')) !!}
            </div>
        </div>
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Discount amount:</strong>
                {!! Form::text('discount', 0, array('placeholder' => 'Discount Amount','class' => 'form-control', 'id' => 'discount' , 'readonly' => 'readonly')) !!}
            </div>
        </div>
	</div>
	
	<div class="row section" id="sale-container2">
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Payment Method:</strong>
                {!! Form::select('pmethod', array('Cash'=>'Cash','Card'=>'Card','Bkash'=>'Bkash'),array('Cash'=>'Cash'), array('placeholder' => '','class' => 'form-control', 'id' => 'pmethod')) !!}
            </div>
        </div>
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Paid Amount :</strong>
                {!! Form::text('pamount', 0, array('placeholder' => 'Discount Percentage','class' => 'form-control', 'id' => 'pamount')) !!}
            </div>
        </div>
		<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Change Amount:</strong>
                {!! Form::text('change', 0, array('placeholder' => 'Discount Amount','class' => 'form-control', 'id' => 'camount' , 'readonly' => 'readonly')) !!}
            </div>
        </div>
	</div>
</div>
<!-- <p><a href="#" class='addsection'>Add Section</a></p> -->

	<div class="clone"></div>
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
		<button type="submit" class="btn btn-primary">Submit</button>
    </div>
    
	{!! Form::close() !!}
<script type="text/javascript">


$('body').on('click', '.additem2', function() {
	$('#sections .section:nth-child(2)').css("display", "block");
	$('.additem2').css("display", "none");
	$('.additem3').css("display", "block");
	return false;
});
$('body').on('click', '.additem3', function() {
	$('#sections .section:nth-child(3)').css("display", "block");
	$('.additem3').css("display", "none");
	$('.additem4').css("display", "block");
	return false;
});
$('body').on('click', '.additem4', function() {
	$('#sections .section:nth-child(4)').css("display", "block");
	$('.additem4').css("display", "none");
	$('.additem5').css("display", "block");
	return false;
});
$('body').on('click', '.additem5', function() {
	$('#sections .section:nth-child(5)').css("display", "block");
	$('.additem5').css("display", "none");
	$('.additem6').css("display", "block");
	return false;
});
$('body').on('click', '.additem6', function() {
	$('#sections .section:nth-child(6)').css("display", "block");
	$('.additem6').css("display", "none");
	$('.additem7').css("display", "block");
	return false;
});
$('body').on('click', '.additem7', function() {
	$('#sections .section:nth-child(7)').css("display", "block");
	$('.additem7').css("display", "none");
	$('.additem8').css("display", "block");
	return false;
});
$('body').on('click', '.additem8', function() {
	$('#sections .section:nth-child(8)').css("display", "block");
	$('.additem8').css("display", "none");
	$('.additem9').css("display", "block");
	return false;
});
$('body').on('click', '.additem9', function() {
	$('#sections .section:nth-child(9)').css("display", "block");
	$('.additem9').css("display", "none");
	$('.additem10').css("display", "block");
	return false;
});
$('body').on('click', '.additem10', function() {
	$('#sections .section:nth-child(10)').css("display", "block");
	$('.additem10').css("display", "none");
    return false;
});

//remove section
		$('#sections').on('click', '.remove', function() {
		    //fade out section
		    $(this).parent().fadeOut(300, function(){
		        //remove parent element (main section)
		        $(this).parent().parent().empty();
		        return false;
		    });
		    return false;
		});


     	$( "#getRate1" ).change(function() {
			var id = $( "#getRate1" ).val();
			
		  	$( "#getRateValue1" ).load( "{{ URL('sale/rate/') }}/" + id  , function(data) {
			  	var obj = jQuery.parseJSON( data );
			  	$( "#getRateValue1" ).val(obj.rate);
			});	
		});
		
		$( "#qty1" ).blur(function() {
			var price = $("#total").val();	
			var qty = $("#qty").val();	
			var total = parseInt($("#getRateValue1").val()*$("#qty1").val()) + parseInt($("#getRateValue2").val()*$("#qty2").val()) + parseInt($("#getRateValue3").val()*$("#qty3").val()) +parseInt($("#getRateValue4").val()*$("#qty4").val()) + parseInt($("#getRateValue5").val()*$("#qty5").val()) + parseInt($("#getRateValue6").val()*$("#qty6").val()) + parseInt($("#getRateValue7").val()*$("#qty7").val()) +parseInt($("#getRateValue8").val()*$("#qty8").val()) + parseInt($("#getRateValue9").val()*$("#qty9").val())+parseInt($("#getRateValue10").val()*$("#qty10").val());	
			$("#total").val(total);
			
			
		});
		$( "#qty2" ).blur(function() {
			var price = $("#total").val();	
			var qty = $("#qty").val();	
			var total = parseInt($("#getRateValue1").val()*$("#qty1").val()) + parseInt($("#getRateValue2").val()*$("#qty2").val()) + parseInt($("#getRateValue3").val()*$("#qty3").val()) +parseInt($("#getRateValue4").val()*$("#qty4").val()) + parseInt($("#getRateValue5").val()*$("#qty5").val()) + parseInt($("#getRateValue6").val()*$("#qty6").val()) + parseInt($("#getRateValue7").val()*$("#qty7").val()) +parseInt($("#getRateValue8").val()*$("#qty8").val()) + parseInt($("#getRateValue9").val()*$("#qty9").val())+parseInt($("#getRateValue10").val()*$("#qty10").val());	
			$("#total").val(total);
			
			
		});
		$( "#qty3" ).blur(function() {
			var price = $("#total").val();	
			var qty = $("#qty").val();	
			var total = parseInt($("#getRateValue1").val()*$("#qty1").val()) + parseInt($("#getRateValue2").val()*$("#qty2").val()) + parseInt($("#getRateValue3").val()*$("#qty3").val()) +parseInt($("#getRateValue4").val()*$("#qty4").val()) + parseInt($("#getRateValue5").val()*$("#qty5").val()) + parseInt($("#getRateValue6").val()*$("#qty6").val()) + parseInt($("#getRateValue7").val()*$("#qty7").val()) +parseInt($("#getRateValue8").val()*$("#qty8").val()) + parseInt($("#getRateValue9").val()*$("#qty9").val())+parseInt($("#getRateValue10").val()*$("#qty10").val());	
			$("#total").val(total);
			
			
		});
		$( "#qty4" ).blur(function() {
			var price = $("#total").val();	
			var qty = $("#qty").val();	
			var total = parseInt($("#getRateValue1").val()*$("#qty1").val()) + parseInt($("#getRateValue2").val()*$("#qty2").val()) + parseInt($("#getRateValue3").val()*$("#qty3").val()) +parseInt($("#getRateValue4").val()*$("#qty4").val()) + parseInt($("#getRateValue5").val()*$("#qty5").val()) + parseInt($("#getRateValue6").val()*$("#qty6").val()) + parseInt($("#getRateValue7").val()*$("#qty7").val()) +parseInt($("#getRateValue8").val()*$("#qty8").val()) + parseInt($("#getRateValue9").val()*$("#qty9").val())+parseInt($("#getRateValue10").val()*$("#qty10").val());	
			$("#total").val(price);
			
			
		});
		$( "#qty5" ).blur(function() {
			var price = $("#total").val();	
			var qty = $("#qty").val();	
			var total = parseInt($("#getRateValue1").val()*$("#qty1").val()) + parseInt($("#getRateValue2").val()*$("#qty2").val()) + parseInt($("#getRateValue3").val()*$("#qty3").val()) +parseInt($("#getRateValue4").val()*$("#qty4").val()) + parseInt($("#getRateValue5").val()*$("#qty5").val()) + parseInt($("#getRateValue6").val()*$("#qty6").val()) + parseInt($("#getRateValue7").val()*$("#qty7").val()) +parseInt($("#getRateValue8").val()*$("#qty8").val()) + parseInt($("#getRateValue9").val()*$("#qty9").val())+parseInt($("#getRateValue10").val()*$("#qty10").val());	
			$("#total").val(total);
			
			
		});
		$( "#qty6" ).blur(function() {
			var price = $("#total").val();	
			var qty = $("#qty").val();	
			var total = parseInt($("#getRateValue1").val()*$("#qty1").val()) + parseInt($("#getRateValue2").val()*$("#qty2").val()) + parseInt($("#getRateValue3").val()*$("#qty3").val()) +parseInt($("#getRateValue4").val()*$("#qty4").val()) + parseInt($("#getRateValue5").val()*$("#qty5").val()) + parseInt($("#getRateValue6").val()*$("#qty6").val()) + parseInt($("#getRateValue7").val()*$("#qty7").val()) +parseInt($("#getRateValue8").val()*$("#qty8").val()) + parseInt($("#getRateValue9").val()*$("#qty9").val())+parseInt($("#getRateValue10").val()*$("#qty10").val());	
			$("#total").val(total);
			
			
		});
		$( "#qty7" ).blur(function() {
			var price = $("#total").val();	
			var qty = $("#qty").val();	
			var total = parseInt($("#getRateValue1").val()*$("#qty1").val()) + parseInt($("#getRateValue2").val()*$("#qty2").val()) + parseInt($("#getRateValue3").val()*$("#qty3").val()) +parseInt($("#getRateValue4").val()*$("#qty4").val()) + parseInt($("#getRateValue5").val()*$("#qty5").val()) + parseInt($("#getRateValue6").val()*$("#qty6").val()) + parseInt($("#getRateValue7").val()*$("#qty7").val()) +parseInt($("#getRateValue8").val()*$("#qty8").val()) + parseInt($("#getRateValue9").val()*$("#qty9").val())+parseInt($("#getRateValue10").val()*$("#qty10").val());	
			$("#total").val(total);
			
			
		});
		$( "#qty8" ).blur(function() {
			var price = $("#total").val();	
			var qty = $("#qty").val();	
			var total = parseInt($("#getRateValue1").val()*$("#qty1").val()) + parseInt($("#getRateValue2").val()*$("#qty2").val()) + parseInt($("#getRateValue3").val()*$("#qty3").val()) +parseInt($("#getRateValue4").val()*$("#qty4").val()) + parseInt($("#getRateValue5").val()*$("#qty5").val()) + parseInt($("#getRateValue6").val()*$("#qty6").val()) + parseInt($("#getRateValue7").val()*$("#qty7").val()) +parseInt($("#getRateValue8").val()*$("#qty8").val()) + parseInt($("#getRateValue9").val()*$("#qty9").val())+parseInt($("#getRateValue10").val()*$("#qty10").val());	
			$("#total").val(total);
			
			
		});
		$( "#qty9" ).blur(function() {
			var price = $("#total").val();	
			var qty = $("#qty").val();	
			var total = parseInt($("#getRateValue1").val()*$("#qty1").val()) + parseInt($("#getRateValue2").val()*$("#qty2").val()) + parseInt($("#getRateValue3").val()*$("#qty3").val()) +parseInt($("#getRateValue4").val()*$("#qty4").val()) + parseInt($("#getRateValue5").val()*$("#qty5").val()) + parseInt($("#getRateValue6").val()*$("#qty6").val()) + parseInt($("#getRateValue7").val()*$("#qty7").val()) +parseInt($("#getRateValue8").val()*$("#qty8").val()) + parseInt($("#getRateValue9").val()*$("#qty9").val())+parseInt($("#getRateValue10").val()*$("#qty10").val());	
			$("#total").val(total);
			
			
		});
		$( "#qty10" ).blur(function() {
			var price = $("#total").val();	
			var qty = $("#qty").val();	
			var total = parseInt($("#getRateValue1").val()*$("#qty1").val()) + parseInt($("#getRateValue2").val()*$("#qty2").val()) + parseInt($("#getRateValue3").val()*$("#qty3").val()) +parseInt($("#getRateValue4").val()*$("#qty4").val()) + parseInt($("#getRateValue5").val()*$("#qty5").val()) + parseInt($("#getRateValue6").val()*$("#qty6").val()) + parseInt($("#getRateValue7").val()*$("#qty7").val()) +parseInt($("#getRateValue8").val()*$("#qty8").val()) + parseInt($("#getRateValue9").val()*$("#qty9").val())+parseInt($("#getRateValue10").val()*$("#qty10").val());	
			$("#total").val(total);
			
			
		});
		$( "#discountp" ).blur(function() {
			var price = $("#total").val();	
			var total = parseInt($("#getRateValue1").val()*$("#qty1").val()) + parseInt($("#getRateValue2").val()*$("#qty2").val()) + parseInt($("#getRateValue3").val()*$("#qty3").val()) +parseInt($("#getRateValue4").val()*$("#qty4").val()) + parseInt($("#getRateValue5").val()*$("#qty5").val()) + parseInt($("#getRateValue6").val()*$("#qty6").val()) + parseInt($("#getRateValue7").val()*$("#qty7").val()) +parseInt($("#getRateValue8").val()*$("#qty8").val()) + parseInt($("#getRateValue9").val()*$("#qty9").val())+parseInt($("#getRateValue10").val()*$("#qty10").val());	
			$("#total").val(price);
			var discountp = $("#discountp").val();	
			discount = parseInt(total * discountp / 100) ;
			$("#total").val(total-discount);
			$("#discount").val(discount);
			
		});
		
		$( "#pamount" ).blur(function() {
			var price = $("#pamount").val();	
			var total = $("#total").val();
			discount = parseInt(price - total ) ;
			$("#camount").val(discount);
			
		});
		


		 // Add and Remove Item Sets

            // var item_wrapper  = $("#sections"); //Fields wrapper
            // var add_item      = $(".additem"); //Add button ID
            
            // for (var i=1; i < 2;i++) {
            //        $(add_item).on("click",function(e){ //on add input button click
            //         e.preventDefault();
                    
            //             $(item_wrapper).append('<div class="row section" id="sale-container0"><div class="col-xs-4 col-sm-4 col-md-4"><div class="form-group"><strong>Item:</strong><select title="Select an Item" class="form-control selectpicker" data-live-search="true" id="getRate'+i+'" name="itemid[]" tabindex="-98"><option class="bs-title-option" value="">Select an Item</option><option value="1">Burger</option><option value="2">Sandwitch</option><option value="3">Pizza</option><option value="4">Chicken Fry</option></select></div></div><div class="form-group hide"><input placeholder="User Id" class="form-control" name="uid" type="hidden" value="2"></div><div class="col-xs-4 col-sm-4 col-md-4"><div class="form-group"><strong>Rate:</strong><input placeholder="Rate" class="form-control" id="getRateValue'+i+'" readonly="readonly" name="rate[]" type="text"></div></div><div class="col-xs-4 col-sm-4 col-md-4"><div class="form-group"><strong>Quantity:</strong><input placeholder="Quantity" class="form-control" id="qty" name="qty[]" type="text"></div></div></div><div class="col-sm-12"><a href="#" class="btn btn-primary remove-item">Remove Item</a></div>'); //add input box
                    

            //         i++; 
            //     });
                
            //     $(item_wrapper).on("click",".remove-item", function(e){ //user click on remove text
            //         var remove = confirm("Are you sure you want to delete the Item??");
            //         if (remove == true) {
            //             e.preventDefault(); $(this).parents('.panel-body > div').remove(); x--;
            //         }
            //     })

            // }
            
     	$( "#getRate2" ).change(function() {
			var id2 = $( "#getRate2" ).val();
			
		  	$( "#getRateValue2" ).load( "{{ URL('sale/rate/') }}/" + id2  , function(data) {
			  	var obj = jQuery.parseJSON( data );
			  	$( "#getRateValue2" ).val(obj.rate);
			});	
		});
		$( "#getRate3" ).change(function() {
			var id2 = $( "#getRate3" ).val();
			
		  	$( "#getRateValue3" ).load( "{{ URL('sale/rate/') }}/" + id2  , function(data) {
			  	var obj = jQuery.parseJSON( data );
			  	$( "#getRateValue3" ).val(obj.rate);
			});	
		});
		$( "#getRate4" ).change(function() {
			var id2 = $( "#getRate4" ).val();
			
		  	$( "#getRateValue4" ).load( "{{ URL('sale/rate/') }}/" + id2  , function(data) {
			  	var obj = jQuery.parseJSON( data );
			  	$( "#getRateValue4" ).val(obj.rate);
			});	
		});
		$( "#getRate5" ).change(function() {
			var id2 = $( "#getRate5" ).val();
			
		  	$( "#getRateValue5" ).load( "{{ URL('sale/rate/') }}/" + id2  , function(data) {
			  	var obj = jQuery.parseJSON( data );
			  	$( "#getRateValue5" ).val(obj.rate);
			});	
		});
		$( "#getRate6" ).change(function() {
			var id2 = $( "#getRate6" ).val();
			
		  	$( "#getRateValue6" ).load( "{{ URL('sale/rate/') }}/" + id2  , function(data) {
			  	var obj = jQuery.parseJSON( data );
			  	$( "#getRateValue6" ).val(obj.rate);
			});	
		});
		$( "#getRate7" ).change(function() {
			var id2 = $( "#getRate7" ).val();
			
		  	$( "#getRateValue7" ).load( "{{ URL('sale/rate/') }}/" + id2  , function(data) {
			  	var obj = jQuery.parseJSON( data );
			  	$( "#getRateValue7" ).val(obj.rate);
			});	
		});
		$( "#getRate8" ).change(function() {
			var id2 = $( "#getRate8" ).val();
			
		  	$( "#getRateValue8" ).load( "{{ URL('sale/rate/') }}/" + id2  , function(data) {
			  	var obj = jQuery.parseJSON( data );
			  	$( "#getRateValue8" ).val(obj.rate);
			});	
		});
		$( "#getRate9" ).change(function() {
			var id2 = $( "#getRate9" ).val();
			
		  	$( "#getRateValue9" ).load( "{{ URL('sale/rate/') }}/" + id2  , function(data) {
			  	var obj = jQuery.parseJSON( data );
			  	$( "#getRateValue9" ).val(obj.rate);
			});	
		});
		$( "#getRate10" ).change(function() {
			var id2 = $( "#getRate10" ).val();
			
		  	$( "#getRateValue10" ).load( "{{ URL('sale/rate/') }}/" + id2  , function(data) {
			  	var obj = jQuery.parseJSON( data );
			  	$( "#getRateValue10" ).val(obj.rate);
			});	
		});

</script>	


	
@endsection