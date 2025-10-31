<?php

use App\Route as TranslatedRoute;
//PUBLIC
//When you add a new public translated route in db - it should be before programs and studies routes


Route::get('/404','MainController@notFound')->name('404');

Route::get('/sitemap-images.xml', 'SitemapController@imageSitemap');

Route::get('/send-newsletter','NewsletterSendController@send');

Auth::routes();

Route::group(['prefix' => 'parent'],function(){

	Route::get('/dashboard', 'ParentController@dashboard')->name('parent.dashboard');

	Route::get('/meeting','ParentController@meetings')->name('parent.meetings');

	Route::get('/student/add','ParentController@createStudent')->name('parent.create.student');

	Route::post('/student/create','ParentController@addStudent')->name('student.add');

	Route::get('/payments','ParentController@payments')->name('parent.payments');

	Route::get('/documentation','ParentController@documentation')->name('parent.documentation');

	Route::get('/invoices','ParentController@invoices')->name('parent.invoices');
});



Route::group(['middleware'=>'translateUrl'],function(){
	$routes = TranslatedRoute::whereIn('sitemap',[0,1])->get();
	foreach($routes as $route){
		Route::get($route->route_en,$route->action)->name($route->slug);
	}
});


// Route::group(['prefix' => 'de','middleware'=>'translateUrl'],function(){
// 	$routes = TranslatedRoute::whereIn('sitemap',[0,1])->where('id','!=',1)->get();
// 	foreach($routes as $route){
// 		Route::get($route->route_de,$route->action)->name($route->slug.'-de');
// 	}
// });
#By design the project should have 5 languages, but only 2 for now
// Route::group(['prefix' => 'es','middleware'=>'translateUrl'],function(){
// 	$routes = TranslatedRoute::whereIn('sitemap',[0,1])->get();
// 	foreach($routes as $route){
// 		Route::get($route->route_es,$route->action)->name($route->slug.'-es');
// 	}
// });

// Route::group(['prefix' => 'ru','middleware'=>'translateUrl'],function(){
// 	$routes = TranslatedRoute::whereIn('sitemap',[0,1])->get();
// 	foreach($routes as $route){
// 		Route::get($route->route_ru,$route->action)->name($route->slug.'-ru');
// 	}
// });

// Route::group(['prefix' => 'bg','middleware'=>'translateUrl'],function(){
// 	$routes = TranslatedRoute::whereIn('sitemap',[0,1])->get();
// 	foreach($routes as $route){
// 		Route::get($route->route_bg,$route->action)->name($route->slug.'-bg');
// 	}
// });
		
Route::post('/get-selected-program', 'MainController@getSelectedProgram')->name('get-selected-program');

Route::post('/use-redeem-code', 'MainController@useRedeemCode')->name('use-redeem-code');
	


Route::post('/apply-now/{conference_id}','MainController@postApplyNow')->name('apply-now');

Route::post('/receive-application', 'MainController@receiveApplication')->name('receive-application');

Route::post('/logout','MainController@logout')->name('logout');

Route::post('/accept-cookies','MainController@acceptCookies');

Route::post('/custom-cookies','MainController@customCookies');

#single program contact form (modal when you click learn more)
Route::post('/request-information', 'ContactController@sendRequestForProgram')->name('request-information');

#phone modal on bottom right icon
Route::post('/phone-contact','ContactController@sendPhoneContact')->name('phone-contact');

#home page contact form
Route::post('/contact','ContactController@sendContact')->name('contact');

#assitent page request
Route::post('/general-request','ContactController@generalRequest')->name('general-request');

Route::post('/get-programs','MainController@getPrograms')->name('get-programs');

Route::post('/get-payments-options','MainController@getPaymentOption')->name('get-payments-options');

Route::post('/subscribe','MainController@subscribe')->name('subscribe');

Route::post('/appoint-hour','CalendarController@appointHour')->name('appoint-hour');

Route::post('/record-appointment-details','CalendarController@recordAppointment')->name('record-appointment-details');

Route::post('/unsubscribe-user/{id}','MainController@unsubscribeUser')->name('unsubscribe-user');

/*
Route::get('/down', function() {
  	$exitCode = Artisan::call('down');
  	return 'Application config cleared';
});

// Clear application config:
Route::get('/config-clear', function() {
  	$exitCode = Artisan::call('config:clear');
  	return 'Application config cleared';
});

// Clear application cache:
Route::get('/cache-clear', function() {
  	$exitCode = Artisan::call('cache:clear');
  	return 'Application cache cleared';
});

// Clear view cache:
Route::get('/view-clear', function() {
	$exitCode = Artisan::call('view:clear');
	return 'View cache cleared';
});

// Clear route cache:
Route::get('/route-clear', function() {
	$exitCode = Artisan::call('route:clear');
	return 'Route cache cleared';
});
*/