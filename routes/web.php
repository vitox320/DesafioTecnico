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

Route::get("/", [\App\Http\Controllers\UsuarioController::class, 'main'])->name("site.main");

Route::group(['prefix' => 'usuarios'], function () {
    Route::get("/", [\App\Http\Controllers\UsuarioController::class, 'index'])->name("usuario.index");
    Route::get("/create", [\App\Http\Controllers\UsuarioController::class, 'create'])->name("usuario.create");
    Route::post("/store", [\App\Http\Controllers\UsuarioController::class, 'store'])->name("usuario.store");
    Route::get("/view/{id}", [\App\Http\Controllers\UsuarioController::class, 'show'])->name("usuario.view");
    Route::get("/edit/{id}", [\App\Http\Controllers\UsuarioController::class, 'edit'])->name("usuario.edit");
    Route::put("/update/{id}", [\App\Http\Controllers\UsuarioController::class, 'update'])->name("usuario.update");
    Route::delete("/delete/{id}", [\App\Http\Controllers\UsuarioController::class, 'destroy'])->name("usuario.delete");
});

Route::group(["prefix" => "logradouro"], function () {
    Route::get("/", [\App\Http\Controllers\LogradouroController::class, 'index'])->name("logradouro.index");
    Route::get("/create", [\App\Http\Controllers\LogradouroController::class, 'create'])->name("logradouro.create");
    Route::post("/store", [\App\Http\Controllers\LogradouroController::class, 'store'])->name("logradouro.store");
    Route::get("/view/{id}", [\App\Http\Controllers\LogradouroController::class, 'view'])->name("logradouro.view");
    Route::post("/buscaLogradouroPorCep/{cep}", [\App\Http\Controllers\LogradouroController::class, 'buscaLogradouroPorCep'])->name("logradouro.buscaLogradouro");
    Route::get("/edit/{id}", [\App\Http\Controllers\LogradouroController::class, 'edit'])->name("logradouro.edit");
    Route::put("/update/{id}", [\App\Http\Controllers\LogradouroController::class, 'update'])->name("logradouro.update");
    Route::delete("/delete/{id}", [\App\Http\Controllers\LogradouroController::class, 'destroy'])->name("logradouro.delete");
});

Route::group(["prefix" => "perfil"], function () {
    Route::get("/", [\App\Http\Controllers\PerfilController::class, 'index'])->name("perfil.index");
    Route::get("/create", [\App\Http\Controllers\PerfilController::class, 'create'])->name("perfil.create");
    Route::post("/store", [\App\Http\Controllers\PerfilController::class, 'store'])->name("perfil.store");
    Route::get("/view/{id}", [\App\Http\Controllers\PerfilController::class, 'show'])->name("perfil.view");
    Route::get("/edit/{id}", [\App\Http\Controllers\PerfilController::class, 'edit'])->name("perfil.edit");
    Route::put("/update/{id}", [\App\Http\Controllers\PerfilController::class, 'update'])->name("perfil.update");
    Route::delete("/delete/{id}", [\App\Http\Controllers\PerfilController::class, 'destroy'])->name("perfil.delete");
});

