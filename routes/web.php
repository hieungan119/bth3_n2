<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/','App\Http\Controllers\BookController@listBooks');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/sach','App\Http\Controllers\BookController@listBooks');

Route::get('/sach/theloai/{id}','App\Http\Controllers\BookController@theloai');

Route::get('sach/chitiet/{id}','App\Http\Controllers\BookController@chitiet');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/sach','App\Http\Controllers\BookController@listBooks');

Route::get('/sach/theloai/{id}','App\Http\Controllers\BookController@theloai');

Route::get('sach/chitiet/{id}','App\Http\Controllers\BookController@chitiet');

Route::get('/accountpanel','App\Http\Controllers\AccountController@accountpanel')->middleware('auth')->name("account");

Route::post('/saveaccountinfo','App\Http\Controllers\AccountController@saveaccountinfo')->middleware('auth')->name('saveinfo');

Route::get('/login', function() {
    return "Đây là trang đăng nhập - Hãy cài đặt Controller cho nó sau nhé!";
})->name('login');

Route::get('/register', function() {
    return "Đây là trang đăng ký - Hãy cài đặt Controller cho nó sau nhé!";
})->name('register');

Route::get('/testemail','App\Http\Controllers\MailController@testemail');


require __DIR__.'/auth.php';

Route::get('/book/list','App\Http\Controllers\BookController@booklist')
->middleware('auth')->name("booklist");

Route::get('/book/create','App\Http\Controllers\BookController@bookcreate')
->middleware('auth')->name("bookcreate");
Route::get('/book/edit/{id}','App\Http\Controllers\BookController@bookedit')
->middleware('auth')->name("bookedit");
Route::post('/book/save/{action}','App\Http\Controllers\BookController@booksave'
)
->middleware('auth')->name("booksave");
Route::post('/book/delete','App\Http\Controllers\BookController@bookdelete')
->middleware('auth')->name("bookdelete");

Route::get('/sach','App\Http\Controllers\BookController@listBooks');

Route::get('/sach/theloai/{id}','App\Http\Controllers\BookController@theloai');

Route::get('sach/chitiet/{id}','App\Http\Controllers\BookController@chitiet');

Route::get('/accountpanel','App\Http\Controllers\AccountController@accountpanel')
->middleware('auth')->name("account");

Route::post('/saveaccountinfo','App\Http\Controllers\AccountController@saveaccountinfo')
->middleware('auth')->name('saveinfo');
Route::post('/bookview', [BookController::class, 'bookview'])->name('bookview');
