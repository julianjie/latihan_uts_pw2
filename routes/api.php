<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontakController;


Route::get('/kontak',[KontakController::class,'index']);
Route::get('/kontak/{kontak}',[KontakController::class,'show']);
Route::post('/kontak/store',[KontakController::class,'store']);
Route::patch('/kontak/{kontak}',[KontakController::class,'update']);
Route::delete('/kontak/{kontak}',[KontakController::class,'destroy']);
