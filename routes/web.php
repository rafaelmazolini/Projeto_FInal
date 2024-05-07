<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

//INCIO
Route::get('/', function () {
    return view('welcome');
});