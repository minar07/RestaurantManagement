<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\Category;
use App\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        $categories = Category::all();
        View::share('categories', $categories);
        
        $tab_category = Category::where('category', '!=', 'Special Menu')->get();
        View::share('tab_category', $tab_category);
        
        $menus = Menu::all();
        View::share('menus', $menus);
        
        $special_menus = Menu::where('category_id','1')->get();
        View::share('special_menus', $special_menus);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
