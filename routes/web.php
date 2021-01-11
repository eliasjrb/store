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

Route::get('/', function () {
    return view('welcome');
})->name('home');

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
    });
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');