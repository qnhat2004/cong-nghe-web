<?php

use App\Http\Controllers\IssueController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IssueController::class, 'index'])->name('/');  
// Route::resource('issues', IssueController::class);

Route::get('/create', [IssueController::class, 'create'])->name('create');
Route::post('/store', [IssueController::class, 'store'])->name('store');
Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('destroy');
Route::get('/issues/{id}', [IssueController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [IssueController::class, 'update'])->name('update');