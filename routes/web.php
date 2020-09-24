<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\url\UrlController;

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

Route::get('/test', function(){
	return view('index');
});




Route::prefix('user')->group(function(){


	Route::prefix('url')->group(function(){
		Route::get('api-list', [UrlController::class, 'apiList'])->name('user-list-api-url');
		Route::get('list-url', [UrlController::class, 'index'])->name('user-list-url');
		Route::get('add-url', [UrlController::class, 'tambah'])->name('user-add-url');
		Route::post('save-add-url', [UrlController::class, 'save'])->name('user-save-add-url');
		Route::get('edit-page-url/{id}', [UrlController::class, 'editPage'])->name('user-edit-url-page');
	
	});

});