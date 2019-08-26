<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Menu;

class WebsiteController extends Controller
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
        return view('Website.home');
    }
    public function menu()
    {
        return view('Website.menu',compact('categories'));
    }
 
    public function settings()
    {
        return view('Website.Admin.settings');
    }

    public function menu_settings()
    {
        return view('Website.Admin.menusettings');
    }
    public function special_menu()
    {
        return view('Website.Admin.specialmenu');
    }

    public function category(Category $category){

        $menu_item = $category->menus()->latest()->paginate(8);
        return view('Website.menu', compact('category', 'category_item', 'menu_item'));
                                                                                                                    
    } 


    public function search_menu(Request $request)
    {
        $search = $request->input('search');

        $menus = Menu::orderBy('created_at','desc')->with('category')->search($search)->paginate(8);


        return view('Website.search',['menus'=>$menus]);
    }

}
