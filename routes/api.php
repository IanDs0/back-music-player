<?php

use App\Http\Controllers\Api\AlbumController;
use App\Http\Controllers\Api\MusicController;
use App\Http\Controllers\Api\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SearchController::class, 'all']);
Route::get('/search/{name}', [SearchController::class, 'search']);

Route::get('/album', [AlbumController::class, 'index']);
Route::post('/album', [AlbumController::class, 'store']);
Route::get('/album/{id}', [AlbumController::class, 'show']);
Route::delete('/album/{id}', [AlbumController::class, 'destroy']);
Route::put('/album/{album_id}/add_music/{music_id}', [AlbumController::class, 'add_music']);
Route::delete('/album/{album_id}/add_music/{music_id}', [AlbumController::class, 'remove_music']);

Route::post('/music', [MusicController::class, 'store']);
Route::delete('/album/{id}', [MusicController::class, 'destroy']);


