<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', function () {
    return view('accueil');
});
Route::get('/first', function () {
    return "bonjour dialika";
});
?>