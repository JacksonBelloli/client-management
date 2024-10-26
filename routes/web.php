<?php

use App\Livewire\Clients\CreateClient;
use App\Livewire\Clients\ListClients;
use App\Services\ZipCodeService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->redirectTo('/admin');
});