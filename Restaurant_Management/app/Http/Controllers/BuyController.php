<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Buy;
use App\RawMaterial;


class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Buy::orderBy('id','DESC')->paginate(5);
        return view('buy.index',compact('items'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rawMaterial = RawMaterial::pluck('title','id');
        return view('buy.create',compact('rawMaterial'));
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
            'itemid' => 'required',
            'uid' => 'required',
            'rate' => 'required',
            'qty' => 'required',
        ]);


        $buy = Buy::create($request->all());


        return redirect()->route('buy.index')
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
        $item = Buy::find($id);
        return view('buy.show',compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Buy::find($id);
        $rawMaterial = RawMaterial::pluck('title','id');
        // $rawMaterialItem = $item->rawMaterial->pluck('id','id')->toArray();
        return view('buy.edit',compact('item','rawMaterial'));
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


        Buy::find($id)->update($request->all());

        //  foreach ($request->input('rawMaterial') as $key => $value) {
        //     $buy->attachRawMaterial($value);
        // }


        return redirect()->route('buy.index')
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
        Buy::find($id)->delete();
        return redirect()->route('buy.index')
                        ->with('success','Item deleted successfully');
    }
}
