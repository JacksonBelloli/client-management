<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('clients', 'App\Http\Controllers\Api\ClientController')->only([
    'index', 'store', 'show', 'update', 'destroy'
])->middleware('auth.basic');
