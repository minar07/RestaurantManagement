<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Website.cart');
    }

     /**
     * Store a newly created resource in storage.
     *
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->withWarning( 'Item is already in your cart!' );
        }

        Cart::add($request->id, $request->name, 1, $request->price)
            ->associate('App\Menu');

        return redirect()->route('cart.index')->with('success_message', 'Item was added to your cart!');
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
   

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }


    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Item has been removed!');
    }


    public function add($id)
    {
        $product = Menu::find($id);
        $item = Cart::add($product->id, $product->title, 1, $product->price);
        return back();
    }
    // public function update($id)
    // {
    //     $product = Menu::find($id);
    //     $item = Cart::update($product->id, qty);
    //     return back();
    // }
    public function remove($id)
    {
        $product = Menu::find($id);
        $item = Cart::remove($product->id);
        return back()->with('success_message', 'Item has been removed!');
    }
}