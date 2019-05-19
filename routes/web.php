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
    
    $books = DB::table('books')->get();

    return view('index',['books' => $books]);
});

Route::get('books', 'BooksController@index');
Route::get('book/{id}', 'BooksController@show');
Route::get('mybooks', 'BooksController@mybooks');
Route::post('books', 'BooksController@store');
Route::get('delete/{id}', 'BooksController@delete');
Route::get('editbook/{id}', 'BooksController@edit');
Route::post('editbook/{id}', 'BooksController@save');

Route::get('collection', 'CollectionController@index');
Route::get('removebook/{id}', 'CollectionController@remove');
Route::get('addbook/{id}', 'CollectionController@add');

Route::get('/register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');
Route::get('/editprofile', 'RegistrationController@edit');
Route::post('/saveprofile', 'RegistrationController@save');
 
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');