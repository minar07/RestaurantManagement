<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'WebsiteController@index')->name('home');
Route::get('/menu/{category}', 'WebsiteController@category')->name('menu');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{menu}', 'CartController@destroy')->name('cart.destroy');
Route::patch('/cart/{menu}', 'CartController@update')->name('cart.update');
Route::get('/search', 'WebsiteController@search_menu')->name('search_menu');


Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');


Route::get('empty', function () {
    Cart::destroy();
});

Route::get('/websettings', 'WebsiteController@settings')->name('websettings');
Route::get('/menu-settings', 'WebsiteController@menu_settings')->name('menusettings');
Route::get('/special-menu', 'WebsiteController@special_menu')->name('specialmenu');



Route::auth();

Route::group(['middleware' => ['auth']], function() {

	
	Route::get('/addTo_cart/{id}', ['uses' =>'cartController@add'])->name('addTo_cart');
	

	Route::get('/dashboard', 'HomeController@index');
	
	Route::get('/print/{id}', 'SaleController@print');
	Route::get('/printck/{id}', 'SaleController@printck');
	Route::get('/printck/{id}', 'SaleController@printck');
	Route::delete('sale/iteam/{id}',['as'=>'sale.iteamdestroy','uses'=>'SaleController@iteamdestroy','middleware' => ['permission:sale-delete']]);
	
	//Route::resource('users','UserController');
	Route::get('users',['as'=>'users.index','uses'=>'UserController@index','middleware' => ['permission:user-list|user-create|user-edit|user-delete']]);
	Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
	Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store','middleware' => ['permission:user-create']]);
	Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show']);
	Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit','middleware' => ['permission:user-edit']]);
	Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update','middleware' => ['permission:user-edit']]);
	Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy','middleware' => ['permission:user-delete']]);


	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);


	Route::get('itemCRUD2',['as'=>'itemCRUD2.index','uses'=>'ItemCRUD2Controller@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
	Route::get('itemCRUD2/create',['as'=>'itemCRUD2.create','uses'=>'ItemCRUD2Controller@create','middleware' => ['permission:item-create']]);
	Route::post('itemCRUD2/create',['as'=>'itemCRUD2.store','uses'=>'ItemCRUD2Controller@store','middleware' => ['permission:item-create']]);
	Route::get('itemCRUD2/{id}',['as'=>'itemCRUD2.show','uses'=>'ItemCRUD2Controller@show']);
	Route::get('itemCRUD2/{id}/edit',['as'=>'itemCRUD2.edit','uses'=>'ItemCRUD2Controller@edit','middleware' => ['permission:item-edit']]);
	Route::patch('itemCRUD2/{id}',['as'=>'itemCRUD2.update','uses'=>'ItemCRUD2Controller@update','middleware' => ['permission:item-edit']]);
	Route::delete('itemCRUD2/{id}',['as'=>'itemCRUD2.destroy','uses'=>'ItemCRUD2Controller@destroy','middleware' => ['permission:item-delete']]);


	Route::get('buy',['as'=>'buy.index','uses'=>'BuyController@index','middleware' => ['permission:buy-list|buy-create|buy-edit|buy-delete']]);
	Route::get('buy/create',['as'=>'buy.create','uses'=>'BuyController@create','middleware' => ['permission:buy-create']]);
	Route::post('buy/create',['as'=>'buy.store','uses'=>'BuyController@store','middleware' => ['permission:buy-create']]);
	Route::get('buy/{id}',['as'=>'buy.show','uses'=>'BuyController@show']);
	Route::get('buy/{id}/edit',['as'=>'buy.edit','uses'=>'BuyController@edit','middleware' => ['permission:buy-edit']]);
	Route::patch('buy/{id}',['as'=>'buy.update','uses'=>'BuyController@update','middleware' => ['permission:buy-edit']]);
	Route::delete('buy/{id}',['as'=>'buy.destroy','uses'=>'BuyController@destroy','middleware' => ['permission:buy-delete']]);


	Route::get('sale',['as'=>'sale.index','uses'=>'SaleController@index','middleware' => ['permission:sale-list|sale-create|sale-edit|sale-delete']]);
	Route::get('sale/create',['as'=>'sale.create','uses'=>'SaleController@create','middleware' => ['permission:sale-create']]);
	Route::post('sale/create',['as'=>'sale.store','uses'=>'SaleController@store','middleware' => ['permission:sale-create']]);
	Route::get('sale/{id}',['as'=>'sale.show','uses'=>'SaleController@show']);
	Route::get('sale/{id}/edit',['as'=>'sale.edit','uses'=>'SaleController@edit','middleware' => ['permission:sale-edit']]);
	Route::patch('sale/{id}',['as'=>'sale.update','uses'=>'SaleController@update','middleware' => ['permission:sale-edit']]);
	Route::delete('sale/{id}',['as'=>'sale.destroy','uses'=>'SaleController@destroy','middleware' => ['permission:sale-delete']]);
	Route::get('sale/rate/{id}',['as'=>'sale.rate','uses'=>'SaleController@rate']);


	Route::get('rawMaterial',['as'=>'rawMaterial.index','uses'=>'RawMaterialController@index','middleware' => ['permission:rawMaterial-list|rawMaterial-create|rawMaterial-edit|rawMaterial-delete']]);
	Route::get('rawMaterial/create',['as'=>'rawMaterial.create','uses'=>'RawMaterialController@create','middleware' => ['permission:rawMaterial-create']]);
	Route::post('rawMaterial/create',['as'=>'rawMaterial.store','uses'=>'RawMaterialController@store','middleware' => ['permission:rawMaterial-create']]);
	Route::get('rawMaterial/{id}',['as'=>'rawMaterial.show','uses'=>'RawMaterialController@show']);
	Route::get('rawMaterial/{id}/edit',['as'=>'rawMaterial.edit','uses'=>'RawMaterialController@edit','middleware' => ['permission:rawMaterial-edit']]);
	Route::patch('rawMaterial/{id}',['as'=>'rawMaterial.update','uses'=>'RawMaterialController@update','middleware' => ['permission:rawMaterial-edit']]);
	Route::delete('rawMaterial/{id}',['as'=>'rawMaterial.destroy','uses'=>'RawMaterialController@destroy','middleware' => ['permission:rawMaterial-delete']]);


	Route::get('sellableItem',['as'=>'sellableItem.index','uses'=>'SellableItemController@index','middleware' => ['permission:sellableItem-list|sellableItem-create|sellableItem-edit|sellableItem-delete']]);
	Route::get('sellableItem/create',['as'=>'sellableItem.create','uses'=>'SellableItemController@create','middleware' => ['permission:sellableItem-create']]);
	Route::post('sellableItem/create',['as'=>'sellableItem.store','uses'=>'SellableItemController@store','middleware' => ['permission:sellableItem-create']]);
	Route::get('sellableItem/{id}',['as'=>'sellableItem.show','uses'=>'SellableItemController@show']);
	Route::get('sellableItem/{id}/edit',['as'=>'sellableItem.edit','uses'=>'SellableItemController@edit','middleware' => ['permission:sellableItem-edit']]);
	Route::patch('sellableItem/{id}',['as'=>'sellableItem.update','uses'=>'SellableItemController@update','middleware' => ['permission:sellableItem-edit']]);
	Route::delete('sellableItem/{id}',['as'=>'sellableItem.destroy','uses'=>'SellableItemController@destroy','middleware' => ['permission:sellableItem-delete']]);


	Route::get('production',['as'=>'production.index','uses'=>'ProductionController@index','middleware' => ['permission:production-list|production-create|production-edit|production-delete']]);
	Route::get('production/create',['as'=>'production.create','uses'=>'ProductionController@create','middleware' => ['permission:production-create']]);
	Route::post('production/create',['as'=>'production.store','uses'=>'ProductionController@store','middleware' => ['permission:production-create']]);
	Route::get('production/{id}',['as'=>'production.show','uses'=>'ProductionController@show']);
	Route::get('production/{id}/edit',['as'=>'production.edit','uses'=>'ProductionController@edit','middleware' => ['permission:production-edit']]);
	Route::patch('production/{id}',['as'=>'production.update','uses'=>'ProductionController@update','middleware' => ['permission:production-edit']]);
	Route::delete('production/{id}',['as'=>'production.destroy','uses'=>'ProductionController@destroy','middleware' => ['permission:production-delete']]);


	Route::get('category',['as'=>'category.index','uses'=>'CategoryController@index','middleware' => ['permission:category-list|category-create|category-edit|category-delete']]);
	Route::get('category/create',['as'=>'category.create','uses'=>'CategoryController@create','middleware' => ['permission:category-create']]);
	Route::post('category/create',['as'=>'category.store','uses'=>'CategoryController@store','middleware' => ['permission:category-create']]);
	Route::get('category/{id}',['as'=>'category.show','uses'=>'CategoryController@show']);
	Route::get('category/{id}/edit',['as'=>'category.edit','uses'=>'CategoryController@edit','middleware' => ['permission:category-edit']]);
	Route::patch('category/{id}',['as'=>'category.update','uses'=>'CategoryController@update','middleware' => ['permission:category-edit']]);
	Route::delete('category/{id}',['as'=>'category.destroy','uses'=>'CategoryController@destroy','middleware' => ['permission:category-delete']]);


	Route::get('admin-menu',['as'=>'menu.index','uses'=>'MenuController@index','middleware' => ['permission:menu-list|menu-create|menu-edit|menu-delete']]);
	Route::get('admin-menu/create',['as'=>'menu.create','uses'=>'MenuController@create','middleware' => ['permission:menu-create']]);
	Route::post('admin-menu/create',['as'=>'menu.store','uses'=>'MenuController@store','middleware' => ['permission:menu-create']]);
	Route::get('admin-menu/{id}',['as'=>'menu.show','uses'=>'MenuController@show']);
	Route::get('menu/{id}/edit',['as'=>'menu.edit','uses'=>'MenuController@edit','middleware' => ['permission:menu-edit']]);
	Route::patch('admin-menu/{id}',['as'=>'menu.update','uses'=>'MenuController@update','middleware' => ['permission:menu-edit']]);
	Route::delete('admin-menu/{id}',['as'=>'menu.destroy','uses'=>'MenuController@destroy','middleware' => ['permission:menu-delete']]);
});
