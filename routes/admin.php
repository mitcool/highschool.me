<?php
//ADMIN
Route::group(['middleware' => 'CheckAdmin','prefix' => 'admin'], function() {

	Route::get('/dashboard', 'AdminController@showAdminWelcome')->name('admin-dashboard');

	//Texts
	Route::get('/texts','AdminController@showTexts')->name('texts');
	Route::get('/single-text/{slug}','AdminController@showSingleTexts')->name('single-text');
	Route::post('/change-text','AdminController@changeText')->name('change-text');

	//Conferences
	Route::get('/all-conferences', 'AdminController@showAdminAllConferences')->name('all-conferences');
	Route::get('/edit-conference/{id}', 'AdminController@showAdminEditConference')->name('edit-conference');
	Route::post('/delete-conference-image', 'AdminController@deleteConferenceImage')->name('delete-conference-image');
	Route::post('/edit-conference-post/{id}', 'AdminController@editConferencePost')->name('edit-conference-post');
	Route::get('/add-new-conference', 'AdminController@showAdminAddNewConference')->name('add-new-conference');
	Route::post('/publish-new-conference', 'AdminController@publishAdminNewConference')->name('publish-new-conference');
	Route::post('/delete-conference/{confernce_id}', 'AdminController@deleteConference')->name('delete-conference');

	//Publications
	Route::get('/all-publications', 'AdminController@showAdminAllPublications')->name('all-publications');
	Route::get('/edit-publication/{id}', 'AdminController@showAdminEditPublication')->name('edit-publication');
	Route::post('/delete-publication/{id}', 'AdminController@deletePublication')->name('delete-publication');
	Route::post('/edit-publication-post/{id}', 'AdminController@editPublicationPost')->name('edit-publication-post');
	Route::get('/add-new-publication', 'AdminController@showAdminAddNewPublication')->name('add-new-publication');
	Route::post('/publish-new-publication', 'AdminController@publishAdminNewPublication')->name('publish-new-publication');

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

	//Programs
	Route::get('/programs', 'AdminProgramController@showPrograms')->name('programs');
	Route::get('/program-update/{slug}', 'AdminProgramController@showUpdateProgram')->name('update-program-page');
	Route::get('/program/edit/{id}','AdminProgramController@editSingleProgram')->name('edit-single-program');
	Route::post('/update-single-program', 'AdminProgramController@updateProgram')->name('update-single-program');
	Route::post('/add-redeem-code', 'AdminProgramController@addRedeemCode')->name('admin-add-redeem-code');
	Route::get('/studies','AdminProgramController@studies')->name('studies');
	Route::post('/edit-study/{study_id}','AdminProgramController@editStudy')->name('edit-study');

	//Program page sections
	#step 1
	Route::get('/add-program', 'AdminProgramController@showAddProgram')->name('add-program-page');
	Route::post('/add-program-form', 'AdminProgramController@addProgram')->name('add-program-form');
	#step 2
	Route::get('/program-video/{id}','AdminProgramController@programVideo')->name('program-video');
	Route::post('/program-video','AdminProgramController@addProgramVideo')->name('add-program-video');
	#step 3
	Route::get('/program-benefits/{id}','AdminProgramController@programBenefits')->name('program-benefits');
	Route::post('/program-benefits','AdminProgramController@addProgramBenefits')->name('add-program-benefits');
	#step 4
	Route::get('/iso-certificate/{id}','AdminProgramController@isoCertificate')->name('iso-certificate');
	Route::post('/iso-certificate-text','AdminProgramController@isoCertificateText')->name('iso-certificate-text');
	#step 5
	Route::get('/ai-support/{id}','AdminProgramController@aiSupport')->name('ai-support');
	Route::post('ai-support-add','AdminProgramController@addAiSupportText')->name('add-ai-support');
	#step 6
	Route::get('/program-facts/{id}','AdminProgramController@programFacts')->name('program-facts');
	Route::post('program-facts-add','AdminProgramController@addProgramFacts')->name('add-program-facts');
	#step 7
	Route::get('/study-program-content/{id}','AdminProgramController@studyProgramContent')->name('study-program-content');
	Route::post('study-program-content-add','AdminProgramController@addStudyProgramContent')->name('add-study-program-content');
	#step 8
	Route::get('/study-requirements/{id}','AdminProgramController@studyRequirements')->name('study-requirements');
	Route::post('study-requirements-add','AdminProgramController@addStudyRequirements')->name('add-study-requirements');
	#step 9
	Route::get('/required-documents/{id}','AdminProgramController@requiredDocuments')->name('required-documents');
	Route::post('required-documents-add','AdminProgramController@addRequiredDocuments')->name('add-required-documents');
	#step 10
	Route::get('/tuition-fees/{id}','AdminProgramController@tuitionFees')->name('tuition-fees');
	Route::post('tuition-fees-add','AdminProgramController@addTuitionFees')->name('add-tuition-fees');
	#step 11
	Route::get('/financing/{id}','AdminProgramController@financing')->name('financing');
	Route::post('financing-add','AdminProgramController@addFinancing')->name('add-financing');
	#step 12
	Route::get('/career-path/{id}','AdminProgramController@careerPath')->name('career-paths');
	Route::post('career-path-add','AdminProgramController@addCareerPath')->name('add-career-paths');
	#step 13
	Route::get('/partners/{id}','AdminProgramController@partners')->name('partners');
	Route::post('partners-add','AdminProgramController@addPartner')->name('add-partners');
	#step 14
	Route::get('/testimonials/{id}','AdminProgramController@testimonials')->name('testimonials');
	Route::post('testimonials-add','AdminProgramController@addTestimonial')->name('add-testimonials');
	#step 15
	Route::get('/knowledge-for-success/{id}','AdminProgramController@knowledgeForSuccess')->name('knowledge-for-success');
	Route::post('knowledge-for-success-add','AdminProgramController@addKnowledgeForSuccess')->name('add-knowledge-for-success');

	//Tutorials HelpDesk
    Route::get('/tutorials','AdminController@showTutorials')->name('admin-tutorials');
	Route::post('/tutorial/create','AdminController@addTutorial')->name('add-tutorial');
	Route::post('/tutorial/delete/{tutorial_id}','AdminController@deleteTutorial')->name('delete-tutorial');
	Route::get('/tutorial/edit/{id}','AdminController@editTutorial')->name('edit-tutorial');
	Route::post('/tutorial/edit/{id}','AdminController@editTutorialPost')->name('edit-tutorial-post');

	//Testimonials
	Route::get('/testimonials','AdminController@testimonials')->name('admin-testimonials');
	Route::post('/testimonial/add','AdminController@addTestimonial')->name('add-testimonial');
	Route::get('/testimonial/edit/{id}','AdminController@editTestimonial')->name('edit-testimonial');
	Route::post('/testimonial/edit/{id}','AdminController@editTestimonialPost')->name('edit-testimonial-post');
	Route::post('/testimonial/delete/{id}','AdminController@deleteTestimonial')->name('delete-testimonial');

	//Images
	Route::get('/images','AdminController@images')->name('images');
	Route::post('/images/add','AdminController@addImage')->name('add-image');
	Route::post('/images/edit/{image_id}','AdminController@editImage')->name('edit-image');

	//Applications
	Route::get('/applications','AdminController@applications')->name('applications');
	Route::get('/applications/{id}','AdminController@application')->name('application');

	//Requests
	Route::get('/general-requests','RequestsController@generalRequests')->name('general-requests');
	Route::get('/program-requests','RequestsController@programlRequests')->name('program-requests');
	Route::get('/phone-requests','RequestsController@phoneRequests')->name('phone-requests');
	Route::get('/fact-sheet-requests','RequestsController@factSheetRequests')->name('fact-sheet-requests');

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
});
