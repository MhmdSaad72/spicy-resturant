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

// Route::get('/', function () {
//     return view('welcome');
// });

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

Route::get('/', 'Pages\\HomeController@index')->name('home.index');

Route::get('pages/menus-1', 'Pages\\MenusController@index')->name('menus.index');
Route::get('pages/menus-2', 'Pages\\MenusController@show')->name('menus.show');
// Route::resource('pages/contact', 'Pages\\ContactController');
// Route::resource('pages/about', 'Pages\\AboutController');
Route::get('pages/about-1' , 'Pages\\AboutController@index')->name('about.index');
Route::get('pages/about-2' , 'Pages\\AboutController@show')->name('about.show');

Route::get('pages/contact-2' , 'Pages\\ContactController@show')->name('contact.index');
Route::get('pages/contact-1' , 'Pages\\ContactController@index')->name('contact.show');
Route::post('pages/contact' , 'Pages\\ContactController@store')->name('contact.store');
Route::get('admin/contact' , 'Pages\\ContactController@all')->name('contact.all');

Route::get('pages/dish/{id}' , 'Pages\\DishesController@show')->name('dish.show');


Route::get('pages/categories' , 'Admin\\CategoryController@allCategories')->name('categories.page');
Route::get('pages/category/{id}' , 'Admin\\CategoryController@showCategory')->name('category.page');
// Route::resource('pages/booking', 'Pages\\BookingController');
Route::group(['middleware' => ['auth']], function () {
  Route::get('pages/admin-bookings', 'Pages\\BookingController@bookings')->name('booking.bookings');
  Route::get('pages/personal-information/{id}' , 'UsersController@show')->name('personal.information');
  Route::get('pages/edit-information/{id}' , 'UsersController@edit')->name('edit.information');
  Route::patch('pages/edit-information/{id}' , 'UsersController@update')->name('update.information');
  Route::get('pages/change-password/{id}' , 'UsersController@changePassword')->name('change.password');
  Route::patch('pages/update-password/{id}' , 'UsersController@updatePassword')->name('update.password');
  Route::get('pages/reviews/{id}' , 'UsersController@review')->name('personal.review');
  Route::post('pages/reviews/{id}' , 'UsersController@storeReview')->name('store.review');
  Route::get('pages/edit-reviews/{id}' , 'UsersController@editReview')->name('edit.review');
  Route::patch('pages/update-reviews/{id}' , 'UsersController@updateReview')->name('update.review');
});
// Route::get('/password/reset', 'Auth\\ResetPasswordController@index')->name('password.reset');

Route::get('pages/booking', 'Pages\\BookingController@index')->name('booking.index');
Route::post('pages/booking', 'Pages\\BookingController@store')->name('booking.store');
Route::get('pages/booking/{id}/edit', 'Pages\\BookingController@edit')->name('booking.edit');
Route::patch('pages/booking/{id}/edit', 'Pages\\BookingController@update')->name('booking.update');
Route::get('pages/booking-confirmation/{id}', 'Pages\\BookingController@confirmation')->name('booking.confirm');
Route::get('pages/booking-cancellation/{id}', 'Pages\\BookingController@cancellation')->name('booking.cancel');
Route::patch('pages/booking-cancellation/{id}', 'Pages\\BookingController@confirmCancel')->name('booking.confirm.cancel');
Route::patch('pages/booking-cancellation/{id}', 'Pages\\BookingController@confirmCancel')->name('booking.confirm.cancel');
Route::get('pages/booking-cancelled' , 'pages\\BookingController@cancelled')->name('booking.cancelled');


Route::resource('admin/branch-head', 'Admin\\BranchHeadController');
Route::resource('admin/branch-body', 'Admin\\BranchBodyController');
Route::resource('admin/drop-line', 'Admin\\DropLineController');

Route::resource('admin/basic-details', 'Admin\\BasicDetailsController');
Route::resource('admin/award', 'Admin\\AwardController');

Auth::routes();

Route::get('/login', 'Auth\\LoginController@index')->name('login');
Route::get('/register', 'Auth\\RegisterController@index')->name('register');
