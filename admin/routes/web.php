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

Route::resource('admin/service', 'Admin\\ServiceController');
Route::resource('admin/main-dish', 'Admin\\MainDishController');
Route::resource('admin/our-story', 'Admin\\OurStoryController');
Route::resource('admin/master-chefs', 'Admin\\MasterChefsController');
Route::resource('admin/chefs', 'Admin\\ChefsController');
Route::resource('admin/availability', 'Admin\\AvailabilityController');
Route::resource('admin/gallary', 'Admin\\GallaryController');
Route::resource('admin/album', 'Admin\\AlbumController');
Route::resource('admin/about-us', 'Admin\\AboutUsController');
Route::resource('admin/philosophy', 'Admin\\PhilosophyController');
Route::resource('admin/statistic', 'Admin\\StatisticController');
Route::resource('admin/about-services', 'Admin\\AboutServicesController');
Route::resource('admin/our-services-head', 'Admin\\OurServicesHeadController');
Route::resource('admin/our-services-body', 'Admin\\OurServicesBodyController');

Route::resource('admin/featur-dish-head', 'Admin\\FeaturDishHeadController');
Route::resource('admin/feature-dish-body', 'Admin\\FeatureDishBodyController');
Route::resource('admin/food-menu', 'Admin\\FoodMenuController');
Route::resource('admin/slide-menu', 'Admin\\SlideMenuController');
Route::resource('admin/category', 'Admin\\CategoryController');
Route::resource('admin/tag', 'Admin\\TagController');
Route::resource('admin/contact-us', 'Admin\\ContactUsController');

Route::resource('pages/home', 'Pages\\HomeController');
Route::resource('pages/menus', 'Pages\\MenusController');
Route::resource('pages/contact', 'Pages\\ContactController');
Route::resource('pages/about', 'Pages\\AboutController');

Route::resource('admin/branch-head', 'Admin\\BranchHeadController');
Route::resource('admin/branch-body', 'Admin\\BranchBodyController');
Route::resource('admin/drop-line', 'Admin\\DropLineController');

Route::resource('admin/basic-details', 'Admin\\BasicDetailsController');
Route::resource('admin/award', 'Admin\\AwardController');