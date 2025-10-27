<?php
//ADMIN
Route::group(['middleware' => 'CheckAdmin','prefix' => 'admin'], function() {

	Route::get('/dashboard', 'AdminController@showAdminWelcome')->name('admin-dashboard');

	//Texts
	Route::get('/texts','AdminController@showTexts')->name('texts');
	Route::get('/single-text/{slug}','AdminController@showSingleTexts')->name('single-text');
	Route::post('/change-text','AdminController@changeText')->name('change-text');

	// Academics
	Route::get('/academics','AdminController@getAdminAcademics')->name('admin-academics');
	Route::post('/add-academic','AdminController@addAcademic')->name('add-academic');
	Route::post('/edit-academic','AdminController@editAcademic')->name('edit-academic');
	Route::post('/delete-academic/{id}','AdminController@deleteAcademic')->name('delete-academic');
	Route::get('edit-single-academic/{academic_id}','AdminController@editSingleAcademic')->name('edit-single-academic');

	//Partners
	Route::get('/partners','AdminController@adminPartners')->name('admin-partners');
	Route::post('/upload-partner','AdminController@uploadPartner')->name('upload-partner');
	Route::post('/edit-partner/{partner_id}','AdminController@editPartner')->name('edit-partner');
	Route::post('/delete-partner/{id}','AdminController@deletePartner')->name('delete-partner');

	//Faq
	Route::get('faq','AdminController@faq')->name('admin-faq');
	Route::post('/edit-faq/{id}','AdminController@editFaq')->name('edit-faq');
	Route::post('/delete-faq/{id}','AdminController@deleteFaq')->name('delete-faq');
	Route::post('/add-faq','AdminController@addFaq')->name('add-faq');
	Route::post('/change-about-picture/{id}','AdminController@changeAboutPicture')->name('change-about-picture');
	Route::get('/faq-categories','AdminController@getFaqCategories')->name('faq-categories');
	Route::post('/faq-categories/{category_id}','AdminController@editFaqCategories')->name('edit-faq-category');
	Route::get('/edit-faq-by-category/{category_id}', 'AdminController@getFaqByCategory')->name('edit-faq-by-category');

	//Images
	Route::get('/images','AdminController@images')->name('images');
	Route::post('/images/add','AdminController@addImage')->name('add-image');
	Route::post('/images/edit/{image_id}','AdminController@editImage')->name('edit-image');

	//Applications
	Route::get('/applications','AdminController@applications')->name('applications');
	Route::get('/applications/{id}','AdminController@application')->name('application');

	//Dynamic news
	Route::get('/news','NewsController@index')->name('dynamic-news');
	Route::post('/news/create','NewsController@store')->name('dynamic-news-create');
	Route::get('/news/edit/{news_id}','NewsController@show')->name('edit-news');
	Route::post('/news/delete/{news_id}','NewsController@destroy')->name('delete-news');
	Route::post('/news/update/{news_id}','NewsController@update')->name('dynamic-news-update');
	Route::get('/news/images/attributes','NewsController@getImagesAttributes')->name('news-images-attributes');
	Route::post('/news/images/attributes/{image_id}','NewsController@changeImageAttributes')->name('change-image-attributes');

	//Facts hub
	Route::get('/facts-hub','FactsHubController@index')->name('facts-hub');
	Route::post('/facts-hub/create','FactsHubController@store')->name('facts-hub-create');
	Route::get('/facts-hub/edit/{news_id}','FactsHubController@show')->name('edit-facts-hub');
	Route::post('/facts-hub/delete/{news_id}','FactsHubController@destroy')->name('delete-facts-hub');
	Route::post('/facts-hub/update/{news_id}','FactsHubController@update')->name('facts-hub-update');
	Route::get('/facts-hub/images/attributes','FactsHubController@getImagesAttributes')->name('facts-hub-images-attributes');
	Route::post('/facts-hub/images/attributes/{image_id}','FactsHubController@changeImageAttributes')->name('change-facts-hub-attributes');

	//Facts hub
	Route::get('/press-release','PressReleaseController@index')->name('press-release');
	Route::post('/press-release/create','PressReleaseController@store')->name('press-release-create');
	Route::get('/press-release/edit/{news_id}','PressReleaseController@show')->name('edit-press-release');
	Route::post('/press-release/delete/{news_id}','PressReleaseController@destroy')->name('delete-press-release');
	Route::post('/press-release/update/{news_id}','PressReleaseController@update')->name('press-release-update');
	Route::get('/press-release/images/attributes','PressReleaseController@getImagesAttributes')->name('press-release-images-attributes');
	Route::post('/press-release/images/attributes/{image_id}','PressReleaseController@changeImageAttributes')->name('change-press-release-attributes');

	//Authors
	Route::get('/authors','AdminController@showAuthors')->name('edit-authors');
	Route::post('/edit/{author_id}','AdminController@editAuthorNews')->name('edit-author');
	Route::post('/authors/add','AdminController@addAuthorNews')->name('add-author');
	Route::post('/delete/{author_id}','AdminController@deleteAuthor')->name('delete-author');
	Route::get('/authors/{author_id}','AdminController@showSingleAuthor')->name('show-author');

	//Newsletter
	Route::get('/newsletter','AdminController@newsletter')->name('admin-newsletter');
	Route::get('/newsletter-stats','AdminController@newsletterStats')->name('admin-newsletter-stats');
	Route::post('/newsletter/save','AdminController@saveNewsletter')->name('record-newsletter');
	Route::post('/subscription-update/{id}','AdminController@updateSubscribtion')->name('update-subscribtion');
	Route::post('/subscriber/add','AdminController@addSubscriber')->name('add-subscriber');
	Route::get('/find-subscriber','AdminController@findSubscriber')->name('find-subscriber');

	Route::post('/add-iso-icon','AdminProgramController@addIsoIcon')->name('add-iso-icon');
	Route::post('/delete-iso-icon/{id}','AdminProgramController@deleteIsoIcon')->name('delete-iso-icon');

	Route::get('/jobs','AdminController@jobs')->name('admin-jobs');
	Route::post('/job/add','AdminController@addJob')->name('add-job');
	Route::post('/job/edit/{id}','AdminController@addJob')->name('edit-job');
	Route::post('/job/delete/{id}','AdminController@deleteJob')->name('delete-job');
	Route::get('/edit-single-job/{id}','AdminController@editSingleJob')->name('edit-single-job');

	Route::get('/job-categories','AdminController@jobsCategories')->name('admin-job-categories');
	Route::post('/job/category/add','AdminController@addJobCategory')->name('add-job-category');
	Route::post('/job/category/edit/{id}','AdminController@editJobCategory')->name('edit-job-category');
	Route::post('/job/category/delete/{id}','AdminController@deleteJobCategory')->name('delete-job-category');

	Route::get('/ai-users','AdminController@aiUsers')->name('admin-ai-users');
	Route::get('/ai-services','AdminController@aiServices')->name('admin-ai-services');
	Route::post('/add-ai-user','AdminController@addAiUser')->name('add-ai-user');
	Route::post('/edit-ai-user/{id}','AdminController@editAiUser')->name('edit-ai-user');
	Route::post('/add-ai-service','AdminController@addAiService')->name('add-ai-service');
	Route::post('/edit-ai-service/{id}','AdminController@editAiService')->name('edit-ai-service');
	Route::post('/delete-ai-service/{id}','AdminController@deleteAiService')->name('delete-ai-service');
	Route::get('/admin-ai-texts','AdminController@aiTexts')->name('admin-ai-texts');
	Route::post('/edit-ai-text','AdminController@editAiTexts')->name('edit-ai-text');

	//Plans and features
	Route::get('/plans','AdminController@plans')->name('admin-plans');
	Route::get('/features','AdminController@features')->name('admin-features');
	Route::post('/feature/add','AdminController@addFeature')->name('feature.add');
	Route::post('/feature/delete/{feature_id}','AdminController@deleteFeature')->name('feature.delete');
	Route::post('/plans/add','AdminController@addPlans')->name('plans.add');

	//Meetings
	Route::get('/meetings','AdminController@meetings')->name('admin-meetings');
	Route::post('/meeting/add','AdminController@createMeeting')->name('meeting.add');

	//Courses
	Route::get('/courses','AdminController@courses')->name('admin-courses');
	Route::post('/courses/add','AdminController@addCourse')->name('course.add');
});
