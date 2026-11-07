<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/whoami', function () {
    return 'Fritz C. Springael | Block 4C | ITRACKB4 Laravel 12';
});


Route::get('/product', [ProductsController::class, 'index']);

Route::get('/movies/featured', [MovieController::class, 'featured'])->name('movies.featured');
// Old route-parameter filter — redirects to the new query-string version
Route::get('/movies/filter/{genre?}', function ($genre = null) {
    return redirect()->route('movies.index', $genre ? ['genre' => $genre] : []);
});

Route::resource('movies', MovieController::class);
