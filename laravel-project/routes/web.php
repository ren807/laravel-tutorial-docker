<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('chirps', ChirpController::class)
	->only(['index', 'store', 'edit', 'update', 'destroy'])
	->middleware(['auth', 'verified']);

Route::prefix('contents')->middleware('auth')->group(function() {
	Route::get('/list', [ContentController::class, 'list'])->name('contents.list');
	Route::get('/create', [ContentController::class, 'create'])->name('contents.create');
	Route::get('/update/{content_id}', [ContentController::class, 'update'])->name('contents.update');
	Route::get('/delete/{content_id}', [ContentController::class, 'delete'])->name('contents.delete');
	Route::post('/save', [ContentController::class, 'save'])->name('contents.save');
});

require __DIR__.'/auth.php';
