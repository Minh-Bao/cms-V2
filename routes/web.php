<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Site\SliderController;
use App\Http\Controllers\Site\SitebuilderController;
use App\Http\Controllers\Site\SliderImageController;
use App\Http\Controllers\Site\WebsiteblocController;
use App\Http\Controllers\Site\WebsitepageController;
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
Route::get('/sitemap.xml', [SitemapController::class,'index']);
Route::get('/sitemap.xml/articles', [SitemapController::class,'articles']);

//Contact
Route::post('/contact/send', [ContactController::class,'send'])->name('contact');

Route::get('/', [ SiteController::class,'index'])->name('site.homepage')->middleware('https');
// Route::get('/home', [AdminController::class,'index'])->name('home');
Route::get('/feed', 'App\Http\Controllers\FeedController@xml')->name('feed');
Route::post('/send', [SiteController::class, 'form'])->name('site.send.form');



Route::prefix('admin')->group(function() {	

	Route::get('/', [AdminController::class,'index'])->name('admin.index'); // Homepage

	// Pages
	Route::resource('/websitepage',WebsitepageController::class); // Pages
	Route::get('/websitepage/{id}/delete',[WebsitepageController::class, 'destroy'])->name('websitepage.delete'); // delete page
	Route::resource('/websitebloc',WebsiteblocController::class); // Blocs
	Route::get('/websitebloc/{id}/clone',[WebsiteblocController::class, 'clone'])->name('websitebloc.clone'); // Clone a bloc
	Route::post('/ajax/websitebloc/sort.json',[WebsiteblocController::class,'sort'])->name('bloc.sort'); // Sort blocs
	Route::get('/websitebloc/{id}/delete',[WebsiteblocController::class,'destroy'])->name('websiteblocs.destroy'); // delete a  bloc
	Route::put('/Websitepage/{id}', [WebsitepageController::class, 'setDate'])->name('websitepage.setDate'); // Schedule a publication

	// Sliders
	Route::resource('/slider',SliderController::class); //Sliders
	Route::get('/slider/{id}/delete',[SliderController::class,'destroy'])->name('slider.delete'); // Delete a  slider
	Route::resource('/sliderimage',SliderImageController::class); //slider's imagess
	Route::post('/ajax/sliderimage/sort.json',[SliderImageController::class,'sort'])->name('sliderimage.sort'); // sort slides
	Route::get('/sliderimage/{id}/delete',[SliderImageController::class, 'delete'])->name('sliderimage.delete'); // Delete a  slide

	Route::post('/config/{id}/update',[SitebuilderController::class,'update'])->name('sitebuilder.config.update'); 
	Route::get('/config/{id}/change',[SitebuilderController::class,'change'])->name('sitebuilder.image.change'); 
	Route::get('/sitebuilder',[SitebuilderController::class,'element'])->name('sitebuilder'); // Sitebuilder controller


});

//Show page on site
Route::get('/{type}/{slug}', [SiteController::class,'page'])->name('site.page')->middleware('https');

//Feed RSS
Route::get('/feed', [FeedController::class,'xml'])->name('feed');

//Livewire








