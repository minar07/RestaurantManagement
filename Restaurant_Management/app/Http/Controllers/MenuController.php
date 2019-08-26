<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Support\Facades\Storage;
use Image;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Menu::orderBy('id','DESC')->paginate(5);
        return view('Website.Admin.Menu.index',compact('items'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Website.Admin.Menu.create');
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
            'title' => 'required',
            'image' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
        ]);


  
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // $destination  =  base_path() . '/public/uploads';
            // $image->move($destination ,$fileNameToStore);
            $image_store = Image::make($image->getRealPath());              
            $image_store->save(public_path('uploads/' .$fileNameToStore));
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $menu = new Menu;
        $menu->title            = $request->input('title');
        $menu->description      = $request->input('description');
        $menu->image            = $fileNameToStore;
        $menu->price            = $request->input('price');
        $menu->category_id      = $request->input('category_id');
        $menu->quantity         = $request->input('quantity');
        $menu->save();



        return redirect()->route('menu.index')
                        ->with('success','Menu created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Menu::find($id);
        return view('Website.Admin.Menu.show',compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Menu::find($id);
        return view('Website.Admin.Menu.edit',compact('item'));
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
       
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // $destination  =  base_path() . '/public/uploads';
            // $image->move($destination ,$fileNameToStore);
            $image_store = Image::make($image->getRealPath());              
            $image_store->save(public_path('uploads/' .$fileNameToStore));
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $menu = Menu::find($id);
        $menu->title            = $request->input('title');
        $menu->description      = $request->input('description');
        if($request->hasFile('image')){
            $menu->image = $fileNameToStore;
        }
        $menu->price            = $request->input('price');
        $menu->category_id      = $request->input('category_id');
        $menu->quantity         = $request->input('quantity');
        $menu->save();

        return redirect()->route('menu.index')
                        ->with('success','Menu updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // Menu::find($id)->delete();

        $menu = Menu::find($id);

        if($menu->image != 'noimage.jpg'){           
           Storage::delete('public/uploads/'.$menu->image);
        }
        $menu->delete();

        return redirect()->route('menu.index')
                        ->with('success','Menu deleted successfully');
    }
}
