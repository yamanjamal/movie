<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\TvController;
use App\Http\Controllers\ActorsController;

route::view('/fortest','fortest')->name('movies_page');
// route::view('/movie','/movies/show')->name('show');

Route::get('/'	, [MoviesController::class, 'index'])->name('movie');
Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('show');
// Route::get('/toprated', [MoviesController::class, 'toprated'])->name('movie_toprated');
Route::get('/toprated/{page}', [MoviesController::class, 'toprated'])->name('movie_toprated');
Route::get('/nowplaying/{page}', [MoviesController::class, 'nowplaying'])->name('movie_nowplaying');
Route::get('/papuler/{page}', [MoviesController::class, 'papuler'])->name('movie_papuler');


Route::get('/tv', [TvController::class, 'index'])->name('tv');
Route::get('/tv/{id}', [TvController::class, 'show'])->name('tv.show');
Route::get('/tv/{id}/season/{season}', [TvController::class, 'season'])->name('tv.show.season');
Route::get('/tv/{id}/season/{season}/episode/{episode}', [TvController::class, 'episode'])->name('tv.show.episode');
Route::get('/topratedtv/{page}', [TvController::class, 'toprated'])->name('tv_toprated');
Route::get('/nowplayingtv/{page}', [TvController::class, 'nowplaying'])->name('tv_nowplaying');
Route::get('/papulertv/{page}', [TvController::class, 'papuler'])->name('tv_papuler');




Route::get('/actors/{page}', [ActorsController::class, 'index'])->name('actor');
Route::get('/actor/{id}', [ActorsController::class, 'show'])->name('actor.show');
Route::get('/actorknownfor/{id}', [ActorsController::class, 'knownfor'])->name('actor.known');

// route::view('/sidebar','layouts.sidebar')->name('sidebar');

