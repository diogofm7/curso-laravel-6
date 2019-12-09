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

/*
Route::get('redirect1', function (){
    return redirect('redirect2');
});
*/
Route::redirect('redirect1', 'redirect2');

Route::get('redirect2', function (){
    return 'Redirect 02';
});

/*
Route::get('view', function () {
    return view('welcome');
});
*/
Route::view('view', 'welcome');

Route::get('redirect3', function (){
    return redirect()->route('url.name');
});

Route::get('nome-url', function (){
   return 'Hey hey hey';
})->name('url.name');

/*
Route::middleware([])->group(function (){

    Route::prefix('admin')->group(function (){

        Route::namespace('Admin')->group(function (){

            Route::name('admin.')->group(function (){
                Route::get('dashboard', 'TesteController@teste')->name('dashboard');

                Route::get('financeiro', 'TesteController@teste')->name('financeiro');

                Route::get('produtos', 'TesteController@teste')->name('produtos');

                Route::get('/', function (){
                    return redirect()->route('admin.dashboard');
                })->name('home');
            });

        });

    });

});
*/
Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function (){
    Route::get('dashboard', 'TesteController@teste')->name('dashboard');

    Route::get('financeiro', 'TesteController@teste')->name('financeiro');

    Route::get('produtos', 'TesteController@teste')->name('produtos');

    Route::get('/', function (){
        return redirect()->route('admin.dashboard');
    })->name('home');
});



Route::get('/login', function (){
    return 'login';
})->name('login');
