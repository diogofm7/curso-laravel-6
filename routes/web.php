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
    return view('welcome');
});

Route::get('/contato', function (){
    return view('site.contact');
});

Route::get('/empresa', function (){
    return 'Sobre a Empresa';
});

Route::post('/register', function(){
    return '';
});

/* Route::any aceita todos os tipos de requisição HTTP (GET, POST, ...), TOMAR CUIDADO AO USAR */
Route::any('/any', function(){
    return 'Any';
});

/* Route::match indica quais os tipos de requisição HTTP irá aceita */
Route::match(['get', 'post'], '/match', function(){
    return 'Match';
});

/* URL Dinamica */
Route::get('/categorias/{flag1}', function ($prm1){
    return "Produtos da categoria: {$prm1}";
});

Route::get('/categoria/{flag}/posts', function ($prm1){
    return "Posts da categoria: {$prm1}";
});

Route::get('/produtos/{idProduct?}', function ($idProduct = ''){
    return "Produto(s) {$idProduct}";
});
