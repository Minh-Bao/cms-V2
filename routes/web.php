<?php

use App\Http\Controllers\SitemapController;
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

//sitemap//
Route::get('/sitemap.xml', 'App\Http\Controllers\SitemapController@index');
Route::get('/sitemap.xml/articles', 'App\Http\Controllers\SitemapController@articles');

//Contact
Route::post('/contact/send', 'App\Http\Controllers\ContactController@send')->name('contact');

Route::get('/', 'App\Http\Controllers\SiteController@index')->name('site.homepage');
Route::get('/home', 'App\Http\Controllers\AdminController@index')->name('home');

Route::post('/send', 'App\Http\Controllers\SiteController@form')->name('site.send.form');

//Login/reset password
Auth::routes(['verify' => true]);
Route::get('/admin/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('password/reset/{token?}', '\App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm');



Route::prefix('admin')->group(function() {	

	Route::get('/', '\App\Http\Controllers\AdminController@index')->name('admin.index'); // Accueil

	// Pages
	Route::resource('/websitepage','App\Http\Controllers\Site\WebsitepageController'); // Pages
	Route::get('/websitepage/{id}/delete','App\Http\Controllers\Site\WebsitepageController@destroy')->name('websitepage.delete'); // Supprime une page
	Route::resource('/websitebloc','App\Http\Controllers\Site\WebsiteblocController'); // Blocs
	Route::get('/websitebloc/{id}/clone','App\Http\Controllers\Site\WebsiteblocController@clone')->name('websitebloc.clone'); // Clone d'un bloc
	Route::post('/ajax/websitebloc/sort.json','App\Http\Controllers\Site\WebsiteblocController@sort')->name('bloc.sort'); // Tri des slides
	Route::get('/websitebloc/{id}/delete','App\Http\Controllers\Site\WebsiteblocController@destroy')->name('websiteblocs.destroy'); // Supprime un bloc
	Route::put('/Websitepage/{id}', 'App\Http\Controllers\Site\WebsitepageController@setDate')->name('websitepage.setDate'); // programme la publicarion

	// Sliders
	Route::resource('/slider','App\Http\Controllers\Site\SliderController'); //Sliders
	Route::get('/slider/{id}/delete','App\Http\Controllers\Site\SliderController@destroy')->name('slider.delete'); // Supprime un slider
	Route::resource('/sliderimage','App\Http\Controllers\Site\SliderimageController'); //Images des sliders
	Route::post('/ajax/sliderimage/sort.json','App\Http\Controllers\Site\SliderimageController@sort')->name('sliderimage.sort'); // Tri des slides
	Route::get('/sliderimage/{id}/delete','App\Http\Controllers\Site\SliderimageController@delete')->name('sliderimage.delete'); // Supprime un slide
	Route::get('/modal/picture', 'ModalController@picture')->name('modal.picture');

	Route::post('/config/{id}/update','App\Http\Controllers\Site\SitebuilderController@update')->name('sitebuilder.config.update'); 
	Route::get('/config/{id}/change','App\Http\Controllers\Site\SitebuilderController@change')->name('sitebuilder.image.change'); 
	Route::get('/sitebuilder','App\Http\Controllers\Site\SitebuilderController@element')->name('sitebuilder'); // Sitebuilder


});

//Show page on site
Route::get('/{type}/{slug}', 'App\Http\Controllers\SiteController@page')->name('site.page');








