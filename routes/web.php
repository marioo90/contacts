<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

//CONTACTS
Route::get('/', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts');
Route::get('/newContact', [App\Http\Controllers\ContactController::class, 'newContact'])->name('newContact');
Route::get('showDetails', [App\Http\Controllers\ContactController::class, 'showDetails']);
Route::post('submitContact', [App\Http\Controllers\ContactController::class, 'createContact']);  
Route::post('editContact', [App\Http\Controllers\ContactController::class, 'update']);  
Route::delete('contacts/delete/{id}',[App\Http\Controllers\ContactController::class, 'delete'])->name('contacts.destroy');

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
