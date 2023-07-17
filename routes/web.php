<?php

use App\Http\Livewire\CreateProfileForm;
use App\Http\Livewire\ImagesUpload;
use App\Http\Livewire\Matchmaker;
use App\Http\Livewire\RandomUser;
use App\Http\Livewire\SelectTags;
use App\Http\Livewire\Tags;
use App\Models\tag;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware(['auth'])->group(function () {
Route::get('/images', ImagesUpload::class);
Route::get('/tags',Tags::class);
Route::get('/preference',SelectTags::class);
Route::get('/profiles',CreateProfileForm::class);
Route::get('/match',Matchmaker::class);    
});
