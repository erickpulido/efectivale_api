<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// guests
Route::get('/user-confirm', function () {
    return view('auth/user-confirm', ['title' => "Confirmación pendiente"]);
});

// usuarios autenticados redirecciona
Route::get('/', function () {
    if ( auth()->check()) return redirect('/requests');
    return view('auth/user-authenticate', ['title' => "Iniciar sesion", 'js' => "auth/user-authentication.js"]);
});

Route::get('/logout', function() {
    Session::flush();
    return redirect('/');
});

// usuarios autenticados y habilitados
Route::group(['middleware' => ['auth', 'status:habilitado']], function () {
    Route::get('/requests', function () {
        return view('clients/requests', ['title' => "Peticiones de clientes", 'js' => "client/requests.js"]);
    });
});

// usuarios autenticados, administradores y habilitados
Route::group(['middleware' => ['auth', 'role:admin', 'status:habilitado']], function () {
    Route::get('/users', function () {
        return view('users/users', ['title' => "Administración de usuarios", 'js' => "user/users.js"]);
    });
});
