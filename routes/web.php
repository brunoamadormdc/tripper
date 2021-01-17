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

Route::get('/', 'SiteController@index');
Route::get('/{category}/post/{post}', 'SiteController@post');
Route::get('/hoteis', 'SiteController@hotels');
Route::get('/destinos', 'SiteController@destinies')->name('destinos');
Route::get('/destino/{destiny}', 'SiteController@destiny')->name('destiny');
Route::get('/dicas', 'SiteController@tips')->name('dicas');
Route::get('/categorias/{categories}', 'SiteController@generalcategories');
Route::get('/vantagens', 'SiteController@benefits')->name('vantagens');
Route::get('/noticias', 'SiteController@notices')->name('noticias');
Route::get('/vistos', 'SiteController@vistos')->name('vistos');
Route::get('/cambio', 'SiteController@cambio')->name('cambio');
Route::get('/chip', 'SiteController@chip')->name('chip');
Route::get('/seguros', 'SiteController@seguros')->name('seguros');
Route::get('/traslados', 'SiteController@traslados')->name('traslados');
Route::get('/pacotes', 'SiteController@packages')->name('pacotes');
Route::get('/contato', 'SiteController@contato')->name('contato');
Route::get('/reservas', 'SiteController@reservas')->name('reservas');
Route::get('/monte-sua-viagem', 'SiteController@mountyourtrip')->name('monte-sua-viagem');
Route::get('/reservar', 'SiteController@reservar')->name('reservar');
Route::get('/hoteis', 'SiteController@hotels')->name('hotels');
Route::post('/comentar', 'GuestsController@storeComment')->name('commentpost');
Route::post('/formreserva', 'homeController@formReserva')->name('formreserva');

Route::get('/luxury', 'SiteController@luxury')->name('luxury');
Route::get('/passagensaereas', 'SiteController@passagens')->name('passagensaereas');



//Admin Routes
Route::group(['prefix' => 'admin'], function () {

    Auth::routes();

    Route::get('/', 'HomeController@index');

    Route::resource('users', 'UserController');

    Route::resource('testes', 'TesteController');

    Route::resource('destinies', 'DestinyController');

    Route::resource('destinyPhotos', 'Destiny_photoController');

    Route::resource('tips', 'TipController');

    Route::resource('packages', 'PackageController');

    Route::resource('firstHomeBanners', 'First_home_bannerController');

    Route::resource('banners', 'BannerController');

    Route::resource('registrationKeys', 'Registration_KeyController');

    Route::resource('posts', 'PostController');

    Route::resource('postPhotos', 'Post_PhotoController');

    Route::resource('postDetails', 'Post_DetailController');

    Route::resource('postVideos', 'Post_VideoController');

    Route::resource('categories', 'CategoryController');

    Route::resource('postComments', 'Post_commentController');
    Route::resource('files', 'FileController');

});
