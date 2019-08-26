<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sale;
use App\Invoice;
use App\SellableItem;
use Auth;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
		$items = Sale::where('invoice','=',$id)->get();
		$invoice = Invoice::find($id);
		
		try {
			$connector = new WindowsPrintConnector("rongta");
			$printer = new Printer($connector);
			$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
			$printer -> setJustification(Printer::JUSTIFY_CENTER);
			$printer -> setEmphasis(true);
			$printer -> text("Bouffage"); 
			$printer -> setEmphasis(false);
			$printer -> text("\nCafe & Restaurant.\n");
			$printer -> selectPrintMode();
			$printer -> text("25/9 tajmahal road , Mohammadpur, Dhaka-1207\n");
			$printer -> text("Phone # 01775135533\n");
			$printer -> text("Order Time " . $invoice->created_at . "\n");
			$printer -> text("Invoice No. " . $id. "\n");
			$printer -> feed();
			$amount = 0;
			$printer -> text("   Item                    Qty  Rate   Price(TK)"."\n");
			$printer -> text("------------------------------------------------"."\n");
			foreach($items as $team){
				$items = new item($team->item->title, $team->qty,$team->rate,$team->qty*$team->rate );
				$printer -> setEmphasis(true);
				$printer -> text($items ."\n");
				$printer -> setEmphasis(false);
				$amount += $team->qty*$team->rate ;
			}
			$printer -> text("------------------------------------------------"."\n");
			$printer -> setEmphasis(true);
			$length = ceil(log10($amount));
			$tax = new item("Vat:", '','',floor($amount * $invoice->tax/100) );
			$discount = new item("Discount (" . $invoice->discountp . "%)  :", '','',$invoice->discount ); 
			$total = (int)$amount + (int)floor($amount * $invoice->tax/100) - (int)$invoice->discount ; 
			
			$printer -> text("Sub Total:                          " . $amount . ".00\n");
			$printer -> text($tax);
			$printer -> text($discount);
			$printer -> text("Total:                              " . $total . ".00\n");
			$printer -> setEmphasis(false);
			$printer -> text("------------------------------------------------"."\n");
			$printer -> text("Payment Method                        " . $invoice->pmethod . "\n");
			$printer -> text("Paid Amount                          " . $invoice->pamount . ".00\n");
			$printer -> text("Change Amount                        " . ( $invoice->pamount  - $total ). ".00\n");
			$printer -> feed();
			$printer -> text("Thank You. Please Come Again\n");
			$printer -> text("Developed by http://www.shinygleam.com\n");
			$printer -> feed();
			$printer -> cut();
			$printer -> pulse(0, 100, 100);
			$printer -> close();
		
		} catch (Exception $e) {
			echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
		}
        $connector = null;
		
		return redirect()->route('sale.index')
                        ->with('success','Printing Complete');
    }
	
	public function printck($id)
    {
		$items = Sale::where('invoice','=',$id)->get();
		$invoice = Invoice::find($id);
		
		try {
			$connector = new WindowsPrintConnector("rongta");
			$printer = new Printer($connector);
			$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
			$printer -> setJustification(Printer::JUSTIFY_CENTER);
			$printer -> setEmphasis(false);
			$printer -> text("Order Time " . $invoice->created_at . "\n");
			$printer -> text("Invoice No. " . $id. "\n");
			$printer -> feed();
			$amount = 0;
			$printer -> text("   Item                    Qty  Rate   Price(TK)"."\n");
			$printer -> text("------------------------------------------------"."\n");
			foreach($items as $team){
				$items = new item($team->item->title, $team->qty,'','' );
				$printer -> setEmphasis(true);
				$printer -> text($items ."\n");
				$printer -> setEmphasis(false);
				$amount += $team->qty*$team->rate ;
			}
			$printer -> text("------------------------------------------------"."\n");
			$printer -> setEmphasis(true);
			$printer -> feed();
			$printer -> cut();
			$printer -> close();
		
		} catch (Exception $e) {
			echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
		}
        $connector = null;
		
		return redirect()->route('sale.index')
                        ->with('success','Printing Complete');
    }
	
	public function rate($id)
    {
        $rate = SellableItem::find($id);
        echo $rate;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Invoice::orderBy('id','DESC')->paginate(5);
        return view('sale.index',compact('items'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sell = SellableItem::pluck('title','id');
        return view('sale.create',compact('sell','rate'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'item_id' => 'required',
            'uid' => 'required',
            'rate' => 'required',
            'qty' => 'required',
			'total' => 'required',
        ]);
		
		$user = Auth::user()->id ;
        $data = $request->all();
		$invoice = Invoice::create(
							array(
								'user_id' => $user ,
								'total'=>$request->total,
								'tax' => $request->tax,
								'discount' => $request->discount,
								'discountp' => $request->discountp,
								'pmethod' => $request->pmethod,
								'pamount' => $request->pamount
							) 
						);
		$price = 0; 
		print_r($data);
        for($i=0;$i<10;$i++){
				if(@$data['rate'][$i]!=NULL || @$data['rate'][$i] !=0 ){
				$info = array(
									'item_id'=>@$data['item_id'][$i],
									'user_id'=>@$data['uid'],
									'rate'=>@$data['rate'][$i],
									'qty'=>@$data['qty'][$i],
									'invoice'=>$invoice->id 
								);
				$price = $price + $data['rate'][$i] * $data['qty'][$i] ;
				
				$sale = Sale::create($info);
				print_r($info);
				}
        }
		
		
		
		Invoice::find($invoice->id)->update(array('total'=>$price));
		
        return redirect()->route('sale.index')
                        ->with('success','Item created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Sale::where('invoice','=',$id)->get();
		$i=0;
        return view('sale.show',compact('items','i'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Sale::find($id);
        $sell = SellableItem::pluck('title','id');
        $sellItem = $item->itemid ;
        return view('sale.edit',compact('item','sell','sellItem'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'itemid' => 'required',
            'uid' => 'required',
            'rate' => 'required',
            'qty' => 'required',
        ]);


        Sale::find($id)->update($request->all());


        return redirect()->route('sale.index')
                        ->with('success','Item updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoice::find($id)->delete();
        return redirect()->route('sale.index')
                        ->with('success','Item deleted successfully');
    }
	
	public function iteamdestroy($id)
    {
		$invoice = Sale::find($id);
		Sale::find($id)->delete();
        $price = Sale::where('invoice','=',$invoice->invoice)->sum(DB::raw('rate * qty'));
        $invoices = Invoice::where('id','=',$invoice->invoice)->update(array('total'=>$price));
		return redirect()->route('sale.index')
                        ->with('success','Item deleted successfully');
    }
}


class item
{
    private $name;
    private $price;
    private $dollarSign;
	private $quantity ;
	
    public function __construct($name = '', $quantity = 1, $unit = 0 , $price = '')
    {
        $this -> name = $name;
		$this -> unit = $unit;
		$this -> quantity = $quantity;
        $this -> price = $price;
    }
    
    public function __toString()
    {
        $col = 0;
		$length = strlen($this -> name);
		
		$pad = "";
        $left = str_pad($this -> name, $col) ;
		if($this -> quantity != 'Qty') {
		for($i=$length;$i<25;$i++){
			$pad .= " ";
		}
		}
		$left .= $pad;
		
		$quantity = str_pad($this -> quantity, $col) ;
		$pad = "";
		for($i=0;$i<4;$i++){
			$pad .= " ";
		}
		$quantity .= $pad;
		
		$unit = str_pad($this -> unit, $col) ;
		$pad = "";
		
		for($i=0;$i<4;$i++){
			$pad .= " ";
		}
		$unit .= $pad;
		
        $right = str_pad( $this -> price . ".00", $col);
		$blank = "";
        if($this->price == 0)
			$blank = "     ";
		else{
			if($this -> quantity == ''  )
			for($i=strlen($this -> price);$i<=5;$i++){
				$blank .= " ";
			}
		}
		return "$left$blank$quantity$unit$right\n";
		
    }
}