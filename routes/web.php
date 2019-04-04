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
Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('pages.register');
});
Route::get('/create',function(){
    return view('recipes.create');
})->middleware('auth');
Route::get('/recipes',function(){
    return view('recipes.index');
});
Route::resource('recipes','RecipesController');
    
Route::post('recipes','RecipesController@store')->name('recipe.store');







Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/phpfirebase_sdk','FirebaseController@index');

Auth::routes();
