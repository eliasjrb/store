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

use App\Http\Controllers\CheckoutController;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');
Route::get('/category/{slug}', 'CategoryController@index')->name('category.single');
Route::get('/store/{slug}', 'StoreController@index')->name('store.single');

Route::prefix('cart')->name('cart.')->group(function(){
    Route::get('/', 'CartController@index')->name('index');
    Route::post('add', 'CartController@add')->name('add');
    Route::get('remove/{slug}', 'CartController@remove')->name('remove');
    Route::get('cancel', 'CartController@cancel')->name('cancel');
});

Route::prefix('checkout')->name('checkout.')->group(function(){
    Route::get('/', 'CheckoutController@index')->name('index');
    Route::post('/proccess', 'CheckoutController@proccess')->name('proccess');
    Route::get('/thanks','CheckoutController@thanks')->name('thanks');
});

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
        // Route::prefix('stores')->name('stores.')->group(function(){
        //     Route::get('/', 'StoreController@index')->name('index');
        //     Route::get('/create', 'StoreController@create')->name('create');
        //     Route::post('/store', 'StoreController@store')->name('store');
        //     Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
        //     Route::post('/update/{store}', 'StoreController@update')->name('update');
        //     Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
        // });
        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');

        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
    
        Route::get('orders/my', 'OrdersController@index')->name('orders.my');
    });
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/model',function(){
    // $products = \App\Product::all();
    // $user = new \App\User();

    // $user->name = 'Usúario Teste';
    // $user->email = 'teste@gmail.com';
    // $user->password = bcrypt('12345678');
    // return $user->save();

    //Mass Assignment - Atribuiçao em Massa

    // $user = \App\User::create([
    //     'name' => 'Elias Braga',
    //     'email' => 'elias@gmail.com',
    //     'password' => bcrypt('123456789')
    // ]);
    
    //Mass Update edição em massa 

    // $user = \App\User::find(42);
    // $user = $user->update([
    //     'name' => 'elias junior'
    // ]);
    // dd($user);

    $user = \App\User::find(4);

    return $user->store;

    return \App\User::all();

});