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
Route::get("/", "UserController@showHome");
Route::get("/about", "UserController@showAbout");

Route::get("/contact", "UserController@showContact");
Route::post("/contact","UserController@doPemesanan");
Route::get("/contact/bayar/{id}", "UserController@showbayar");
Route::post("/contact/bayar/{id}", "UserController@doBayar");
Route::post("/contact/delete/{id}", "UserController@deletePemesanan");

Route::get("/tabel/pemesanan", "UserController@showTabel");
Route::get("tabel/pemesanan/delete/{id}", "UserController@deleteTabelPemesanan");
Route::get("/tabel/pemesanan/status/{id}", "UserController@PesananSelesai");

Route::get("/daftar", "UserController@showDaftar");
Route::post("/daftar", "UserController@doDaftar");
Route::get("/login", "UserController@showLogin");
Route::post("/login", "UserController@doLogin");
Route::get("/menu", "UserController@showMenu");
Route::get("/logout", "UserController@doLogout");
Route::get("/user","UserController@showAkun");
Route::post("/user","UserController@editAkun");
Route::get("/user/edit/avatar", "UserController@showAvatar");
Route::post("/user/edit/avatar", "UserController@editAvatar");
Route::get("/user/edit/email", "UserController@showEmail");
Route::post("/user/edit/email", "UserController@doEmail");
Route::get("/user/edit/password", "UserController@showPassword");
Route::post("/user/edit/password", "UserController@doPassword");
Route::get("/menu/{id}", "UserController@aboutMenu");
Route::post("/menu/{id}", "UserController@doReview");
Route::get("/menu/review/delete/{id}", "UserController@sdeleteReview");
Route::post("/menu/review/delete/{id}", "UserController@deleteReview");
Route::get("/menu/delete/{id}", "UserController@sdeleteMenu");
Route::post("/menu/delete/{id}", "UserController@deleteMenu");
Route::get("/menu/edit/{id}", "UserController@showEditMenu");
Route::post("/menu/edit/{id}", "UserController@editMenu");
Route::get("/menu/edit/{id}/gambar", "UserController@showGambar");
Route::post("/menu/edit/{id}/gambar", "UserController@editGambar");
Route::get("/add/menu", "UserController@showTMenu");
Route::post("/add/menu", "UserController@tambahMenu");
