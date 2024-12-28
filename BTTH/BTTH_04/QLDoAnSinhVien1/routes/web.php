<?php

use App\Http\Controllers\IssueController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IssueController::class, 'index'])->name('issues.index');
Route::resource('issues', IssueController::class);
