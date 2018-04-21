<?php

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
    $asset = \App\Models\Asset::find(1);
    $history = $asset->revisionHistory;
    foreach ($history as $value){
        dd($value->fieldName());
    }
    dd($history);
    return view('welcome');
});
