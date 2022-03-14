<?php

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
    return view('dashboard.dashboard');
});

Route::get('/login', function () {
    return view('login.login');
});

Route::get('/asset-categories', 'AssetCategoryController@index')->name('asset-category.index');
// Route::get('/datatable', 'AssetCategoryController@datatable')->name('asset-category.datatable');
Route::get('/asset-category-create', 'AssetCategoryController@create')->name('asset-category.create');
Route::post('/asset-categories', 'AssetCategoryController@store')->name('asset-category.store');
Route::get('/asset-categories/{id}/edit', 'AssetCategoryController@edit')->name('asset-category.edit');
Route::post('/asset-categories/{id}/update', 'AssetCategoryController@update')->name('asset-category.update');
Route::get('/asset-categories/{id}/delete', 'AssetCategoryController@destroy')->name('asset-category.destroy');

Route::get('/asset', 'AssetController@index')->name('asset.index');
Route::get('/asset-create', 'AssetController@create')->name('asset.create');
Route::post('/asset', 'AssetController@store')->name('asset.store');
Route::get('/asset/{id}/edit', 'AssetController@edit')->name('asset.edit');
Route::get('/asset/{id}/detail', 'AssetController@detail')->name('asset.detail');
Route::post('/asset/{id}/update', 'AssetController@update')->name('asset.update');
Route::get('/asset/{id}/delete', 'AssetController@destroy')->name('asset.destroy');

Route::get('/locations', 'LocationController@index')->name('location.index');
Route::get('/location-create', 'LocationController@create')->name('location.create');
Route::post('/locations', 'LocationController@store')->name('location.store');
Route::get('/location/{id}/edit', 'LocationController@edit')->name('location.edit');
Route::get('/location/{id}/detail', 'LocationController@detail')->name('location.detail');
Route::post('/location/{id}/update', 'LocationController@update')->name('location.update');
Route::get('/location/{id}/delete', 'LocationController@destroy')->name('location.destroy');

Route::get('/floor', 'FloorController@index')->name('floor.index');
Route::get('/floor-create', 'FloorController@create')->name('floor.create');
Route::post('/floors', 'FloorController@store')->name('floor.store');
Route::get('/floor/{id}/edit', 'FloorController@edit')->name('floor.edit');
Route::post('/floor/{id}/update', 'FloorController@update')->name('floor.update');
Route::get('/floor/{id}/delete', 'FloorController@destroy')->name('floor.destroy');

Route::get('/rooms', 'RoomController@index')->name('room.index');
Route::get('/room-create', 'RoomController@create')->name('room.create');
Route::post('/rooms', 'RoomController@store')->name('room.store');
Route::get('/room/{id}/edit', 'RoomController@edit')->name('room.edit');
Route::post('/room/{id}/update', 'RoomController@update')->name('room.update');
Route::get('/room/{id}/delete', 'RoomController@destroy')->name('room.destroy');

Route::get('/stock-movements', 'StockMovementController@index')->name('stock-movement.index');
Route::get('/stock-movement-create', 'StockMovementController@create')->name('stock-movement.create');
Route::post('/stock-movements', 'StockMovementController@store')->name('stock-movement.store');
Route::get('/stock-movement/{id}/edit', 'StockMovementController@edit')->name('stock-movement.edit');
// add item stock movement
Route::get('/stock-movement/{id}/edit/addItem', 'StockMovementController@addItem')->name('stock-movement.addItem');