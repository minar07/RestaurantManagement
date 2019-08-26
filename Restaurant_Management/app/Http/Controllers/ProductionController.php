<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Production;


class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Production::orderBy('id','DESC')->paginate(5);
        return view('production.index',compact('items'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('production.create');
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
            'raw_materialsid' => 'required',
            'sellable_itemsid' => 'required',
            'raw_materials_qty' => 'required',
            'sellable_items_qty' => 'required',
        ]);


        Production::create($request->all());


        return redirect()->route('production.index')
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
        $item = Production::find($id);
        return view('production.show',compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Production::find($id);
        return view('production.edit',compact('item'));
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
            'raw_materialsid' => 'required',
            'sellable_itemsid' => 'required',
            'raw_materials_qty' => 'required',
            'sellable_items_qty' => 'required',
        ]);


        Production::find($id)->update($request->all());


        return redirect()->route('production.index')
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
        Production::find($id)->delete();
        return redirect()->route('production.index')
                        ->with('success','Item deleted successfully');
    }
}
