<?php

use App\Http\Controllers\CartController;
use App\Mail;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\PriceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get(
    '/',
    [ProductController::class, 'OrderLists']

    // test_function () {
    //     return view('welcome');
    // }

)->middleware(['auth']);

Route::get('/products/{id?}', [ProductController::class, 'products'])->name('catalog')->middleware(['auth']);
Route::get('/product/list', [App\Http\Controllers\ProductController::class, 'list'])->name('list')->middleware(['auth']);

Route::get('/pagination', array('as' => 'ajax.pagination', 'uses' => 'ProductsController@getProducts'))->middleware(['auth']);

Route::get('locale/{locale?}', [UserSettingsController::class, 'setLocale'])->name('locale')->middleware(['auth']);


Route::get('/product/{id?}', [ProductController::class, 'product'])->name('product')->middleware(['auth']);

Route::get('/cart', [CartController::class, 'index'])->middleware(['auth']);

Route::get('/cart/add', [CartController::class, 'add'])->name('add')->middleware(['auth']);
Route::get('/cart/set', [CartController::class, 'set'])->name('set')->middleware(['auth']);

Route::get('/delivery', [ProductController::class, 'delivery'])->middleware(['auth']);

Route::get('/drafts', [DraftController::class, 'index'])->middleware(['auth']);

Route::get('/draft-edit/{id?}', [DraftController::class, 'DraftEdit'])->middleware(['auth']);
Route::get('/draft/add', [App\Http\Controllers\DraftController::class, 'add'])->name('add')->middleware(['auth']);
Route::get('/draft/copy/{id?}', [DraftController::class, 'DraftCopy'])->middleware(['auth']);
Route::get('/draft/delete/{id?}', [DraftController::class, 'DraftDelete'])->middleware(['auth']);

Route::get('/order-lists', [ProductController::class, 'OrderLists'])->middleware(['auth']);

Route::get('/prices', [PriceController::class, 'index'])->middleware(['auth']);
Route::get('/tree-category', [PriceController::class, 'treeCategory'])->middleware(['auth']);
Route::get('/price/check-category', [PriceController::class, 'checkCategory'])->middleware(['auth']);

Route::get('/price/download/{id?}', [PriceController::class, 'download'])->middleware(['auth']);