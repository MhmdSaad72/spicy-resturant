<?php

/*===========================
  basic route for home page
============================*/
Route::get('/', 'Pages\\HomeController@index')->name('home.index');
/*===========================
  all routes for admin panel
============================*/
Route::prefix('admin')->middleware(['auth' , 'role:admin'])->group(function () {
  Route::get('/dashboard' , 'HomeController@index')->name('dashboard');
  Route::get('/service', 'Admin\\ServiceController@index')->name('service.index');
  Route::get('/service/{id}/edit', 'Admin\\ServiceController@edit')->name('service.edit');
  Route::patch('/service/{id}', 'Admin\\ServiceController@update')->name('service.update');
  Route::get('/main-dish', 'Admin\\MainDishController@index')->name('main-dish.index');
  Route::get('/main-dish/{id}/edit', 'Admin\\MainDishController@edit')->name('main-dish.edit');
  Route::patch('/main-dish/{id}', 'Admin\\MainDishController@update')->name('main-dish.update');
  Route::get('/our-story', 'Admin\\OurStoryController@index')->name('our-story.index');
  Route::get('/our-story/{id}/edit', 'Admin\\OurStoryController@edit')->name('our-story.edit');
  Route::patch('/our-story/{id}', 'Admin\\OurStoryController@update')->name('our-story.update');
  Route::resource('/chefs', 'Admin\\ChefsController');
  Route::get('/availability', 'Admin\\AvailabilityController@index')->name('availability.index');
  Route::get('/availability/{id}/edit', 'Admin\\AvailabilityController@edit')->name('availability.edit');
  Route::patch('/availability/{id}', 'Admin\\AvailabilityController@update')->name('availability.update');
  Route::resource('/album', 'Admin\\AlbumController');
  Route::get('/about-us', 'Admin\\AboutUsController@index')->name('about-us.index');
  Route::get('/about-us/{id}/edit', 'Admin\\AboutUsController@edit')->name('about-us.edit');
  Route::patch('/about-us/{id}', 'Admin\\AboutUsController@update')->name('about-us.update');
  Route::get('/philosophy', 'Admin\\PhilosophyController@index')->name('philosophy.index');
  Route::get('/philosophy/{id}/edit', 'Admin\\PhilosophyController@edit')->name('philosophy.edit');
  Route::patch('/philosophy/{id}', 'Admin\\PhilosophyController@update')->name('philosophy.update');
  Route::resource('/statistic', 'Admin\\StatisticController');
  Route::resource('/about-services', 'Admin\\AboutServicesController');
  Route::resource('/our-services-body', 'Admin\\OurServicesBodyController');
  Route::get('/food-menu', 'Admin\\FoodMenuController@index')->name('food-menu.index');
  Route::get('/food-menu/{id}/edit', 'Admin\\FoodMenuController@edit')->name('food-menu.edit');
  Route::patch('/food-menu/{id}', 'Admin\\FoodMenuController@update')->name('food-menu.update');
  Route::resource('/slide-menu', 'Admin\\SlideMenuController');
  Route::resource('/category', 'Admin\\CategoryController');
  Route::resource('/tag', 'Admin\\TagController');
  Route::get('/contact-us', 'Admin\\ContactUsController@index')->name('contact-us.index');
  Route::get('/contact-us/{id}/edit', 'Admin\\ContactUsController@edit')->name('contact-us.edit');
  Route::patch('/contact-us/{id}', 'Admin\\ContactUsController@update')->name('contact-us.update');
  Route::get('/contact' , 'Pages\\ContactController@all')->name('contact.all');
  Route::resource('/branch-body', 'Admin\\BranchBodyController');
  Route::get('/basic-details', 'Admin\\BasicDetailsController@index')->name('basic-details.index');
  Route::get('/basic-details/{id}/edit', 'Admin\\BasicDetailsController@edit')->name('basic-details.edit');
  Route::patch('/basic-details/{id}', 'Admin\\BasicDetailsController@update')->name('basic-details.update');
  Route::resource('/award', 'Admin\\AwardController');
  Route::get('/bookings' , 'Admin\\BookingsController@index')->name('bookings.index');
  Route::get('/bookings/create' , 'Admin\\BookingsController@create')->name('bookings.create');
  Route::get('/bookings/{id}' , 'Admin\\BookingsController@show')->name('bookings.show');
  Route::delete('/bookings/{id}' , 'Admin\\BookingsController@destroy')->name('bookings.destroy');
  Route::get('/clients' , 'UsersController@clients')->name('clients');
  Route::get('/basic-reservation' , 'Admin\\BookingsController@view')->name('reservation.view');
  Route::get('/basic-reservation/{id}/edit' , 'Admin\\BookingsController@edit')->name('reservation.edit');
  Route::patch('/basic-reservation/{id}/edit' , 'Admin\\BookingsController@update')->name('reservation.update');
  Route::resource('/nav-bar', 'Admin\\NavBarController');
  Route::resource('/awards-accordion', 'Admin\\AwardsAccordionController');
 });

 /*===========================
     all routes for site
 ============================*/
 Route::prefix('pages')->group(function () {
   Route::get('/menus-1', 'Pages\\MenusController@index')->name('menus.index');
   Route::get('/menus-2', 'Pages\\MenusController@show')->name('menus.show');
   Route::get('/about-1' , 'Pages\\AboutController@index')->name('about.index');
   Route::get('/about-2' , 'Pages\\AboutController@show')->name('about.show');
   Route::get('/contact-2' , 'Pages\\ContactController@show')->name('contact.index');
   Route::get('/contact-1' , 'Pages\\ContactController@index')->name('contact.show');
   Route::post('/contact' , 'Pages\\ContactController@store')->name('contact.store');
   Route::get('/dish/{id}' , 'Pages\\DishesController@show')->name('dish.show');
   Route::get('/categories' , 'Admin\\CategoryController@allCategories')->name('categories.page');
   Route::get('/category/{id}' , 'Admin\\CategoryController@showCategory')->name('category.page');
   Route::get('/booking', 'Pages\\BookingController@index')->name('booking.index');
   Route::post('/booking', 'Pages\\BookingController@store')->name('booking.store');
   Route::get('/booking/{id}/edit', 'Pages\\BookingController@edit')->name('booking.edit');
   Route::patch('/booking/{id}/edit', 'Pages\\BookingController@update')->name('booking.update');
   Route::get('/booking-confirmation/{id}', 'Pages\\BookingController@confirmation')->name('booking.confirm');
   Route::get('/booking-cancellation/{id}', 'Pages\\BookingController@cancellation')->name('booking.cancel');
   Route::patch('/booking-cancellation/{id}', 'Pages\\BookingController@confirmCancel')->name('booking.confirm.cancel');
   Route::get('/booking-cancelled' , 'Pages\\BookingController@cancelled')->name('booking.cancelled');
   Route::get('/search' , 'Pages\\SearchController@index')->name('search');
   Route::post('/dish-review/{id}' , 'Pages\\DishesController@review')->name('review.dish');
   Route::get('/gallery' , 'Admin\\AlbumController@gallery')->name('gallery');
   Route::get('/typography' , 'Admin\\AlbumController@typography')->name('typography');
  });

/*===========================
all users routes
============================*/
Route::group(['middleware' => ['auth' , 'role:user' , 'verified']], function () {
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


/*===========================
all authentication routes
============================*/
Auth::routes(['verify' => true]);
Route::get('/login', 'Auth\\LoginController@index')->name('login');
Route::get('/register', 'Auth\\RegisterController@index')->name('register');

/*==============================
api routes for dashboard charts 
================================*/
Route::get('/chart/booking' , 'HomeController@chartBooking')->name('booking.chart');
Route::get('/chart/new-vistors' , 'HomeController@chartNewVistors')->name('newVistors');
