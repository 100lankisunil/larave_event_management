<?php

use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventsController::class, 'index'])->name('homePage');
Route::post('/insertEvent', [EventsController::class, 'insertEvent'])->name('insert_Event');
