<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
return $request->user();
});
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
Route::group(['middleware' => ['jwt.verify']], function (){

Route::group(['middleware' => ['api.superadmin']], function (){

Route::delete('/class1/{id}', 'Class1Controller@destroy');
Route::delete('/student/{id}', 'StudentController@destroy');
Route::delete('/book/{id}', 'BookController@destroy');
Route::delete('/book_borrowing/{id}', 'Book_BorrowingController@destroy');
Route::delete('/book_borrowing_detail/{id}', 'Book_Borrowing_DetailController@destroy');
Route::delete('/book_return/{id}', 'Book_ReturController@destroy');
});

Route::group(['middleware' => ['api.admin']], function (){

Route::post('/class1', 'Class1Controller@store');
Route::put('/class1/{id}', 'Class1Controller@update');

Route::post('/student', 'StudentController@store');
Route::put('/student/{id}', 'StudentController@update');

Route::post('/book', 'BookController@store');
Route::put('/book/{id}', 'BookController@update');

Route::post('/book_borrowing', 'Book_BorrowingController@store');
Route::put('/book_borrowing/{id}', 'Book_BorrowingController@update');

Route::post('/book_borrowing_detail', 'Book_Borrowing_DetailController@store');
Route::put('/book_borrowing_detail/{id}', 'Book_Borrowing_DetailController@update');

Route::post('/book_return', 'Book_ReturnController@store');
Route::put('/book_return/{id}', 'Book_ReturController@update');
});

Route::get('/class1', 'Class1Controller@show');
Route::get('/class1/{id}', 'Class1Controller@detail');

Route::get('/student', 'StudentController@show');
Route::get('/student/{id}', 'StudentController@detail');

Route::get('/book', 'BookController@show');
Route::get('/book/{id}', 'BookController@detail');

Route::get('/book_borrowing', 'Book_BorrowingController@show');
Route::get('/book_borrowing/{id}', 'Book_BorrowingController@detail');

Route::get('/book_borrowing_detail', 'Book_Borrowing_DetailController@show');
Route::get('/book_borrowing_detail/{id}', 'Book_Borrowing_DetailController@detail');

Route::get('/book_return', 'Book_ReturnController@show');
Route::get('/book_return/{id}', 'Book_ReturnController@detail');
});