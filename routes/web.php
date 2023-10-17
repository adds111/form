<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Storage;
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
    Route::get('/', function ()
    {
        if (\Illuminate\Support\Facades\Auth::check()) {
            $files = Storage::Files('public/txt');
            $dirs = Storage::directories('public/txt');
            return view('private' , ['files' => $files, 'dirs' => $dirs]);
        }
        return view('login');
    })->name('login');

    Route::name('user.')->group(function ()
    {
        Route::view('/private', 'private')->middleware('auth')->name('private');
        Route::get('/login', function ()
        {

            if (\Illuminate\Support\Facades\Auth::check()) {
            $files = Storage::Files('public/txt');
            $dirs = Storage::directories('public/txt');
            return view('private' , ['files' => $files, 'dirs' => $dirs]);
            }

            return view('login');
        })->name('login');

        Route::post('/login','\App\Http\Controllers\RegController@loginq');
        Route::get('/reg' ,function ()
        {
            if(\Illuminate\Support\Facades\Auth::check()) {
                $files = Storage::Files('public/txt');
                $dirs = Storage::directories('public/txt');
                return view('private' , ['files' => $files, 'dirs' => $dirs]);
            }
            return view('reg');
        })->name('reg');

        Route::get('/Download/', '\App\Http\Controllers\RegController@download');
        Route::post('/upload', '\App\Http\Controllers\RegController@upload');

        Route::get('/logout', function ()
        {
            Auth::logout();
            return redirect('/');
        })->name('logout');
        Route::post('/reg', '\App\Http\Controllers\RegController@saveVal');
    });

