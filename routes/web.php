<?php

Route::get('/404','MainController@notFound')->name('404');

Route::get('/sitemap-images.xml', 'SitemapController@imageSitemap');

Route::get('/send-newsletter','NewsletterSendController@send');

Auth::routes();

Route::group(['prefix' => 'parent','middleware' => 'parent'],function(){

	Route::get('/dashboard', 'ParentController@dashboard')->name('parent.dashboard');

	Route::get('/meeting','ParentController@meetings')->name('parent.meetings');

	Route::get('/student/add','ParentController@createStudent')->name('parent.create.student');

	Route::post('/student/create','ParentController@addStudent')->name('student.add');

	Route::get('/student/documents/{student_id}','ParentController@studentDocuments')->name('parent.student.documents');

	Route::post('/student/documents/submit','ParentController@studentDocumentsSubmit')->name('parent.student.documents.submit');

	Route::get('/student/module/courses/{student_id}','ParentController@studentModuleCourses')->name('parent.student.module.courses');

	Route::get('/student/sessions/{student_id}','ParentController@studentSessions')->name('parent.student.sessions');

	Route::get('/payments','ParentController@payments')->name('parent.payments');

	Route::get('/invoices','ParentController@invoices')->name('parent.invoices');

	Route::get('/invoices/{invoice_id}', 'ParentController@singleInvoice')->name('parent.single-invoice');

	Route::get('/inquiries','ParentController@inquiries')->name('parent.inquiries');

	Route::get('/new-inquiry','ParentController@newInquiry')->name('parent.new-inquiry');

	Route::post('/send-inquiry','ParentController@sendInquiry')->name('parent.send-inquiry');

	Route::get('/student/profile/{student_id}','ParentController@studentProfile')->name('parent.student.profile');

	Route::get('/parent/profile','ParentController@profile')->name('parent.profile');

	Route::get('/application-fee/{student_id}','ParentController@applicationFee')->name('application-fee');

	Route::get('/application-fee-success/{student_id}','ParentController@applicationFeeSuccess')->name('application-fee-success');

	Route::get('/enrollment-fee/{student_id}/{plan_id}/{payment_type}','ParentController@enrollmentFee')->name('enrollment-fee');

	Route::get('/enrollment-fee-success','ParentController@enrollmentFeeSuccess')->name('enrollment-fee-success');

	Route::post('/extend-plan/{student_id}','ParentController@extendPlan')->name('extend-plan');

	Route::get('/extend-plan-success','ParentController@extendPlanSuccess')->name('extend-plan-success');

	Route::post('/request-family-consultation','ParentController@requestFamilyConsultation')->name('request-family-consultation');

	Route::post('/confirm-meeting/{meeting_id}','ParentController@confirmMeeting')->name('confirm-meeting');
	
	#releted to Group Session,menotring sessions and coaching sessions
	Route::post('/change-session-count/{session_id}/{action}','ParentController@changeSessionCount')->name('change-session-count');

	Route::get('/sessions-checkout/{student_id}','ParentController@studentSessionsCheckout')->name('parent.student.sessions.checkout');

	Route::post('/sessions-pay/{student_id}','ParentController@studentSessionsPay')->name('parent.student.sessions.pay');

	Route::get('/session-pay-success/{student_id}','ParentController@studentSessionsSuccess')->name('session-pay-success');

	Route::post('/book-group-session/{session_id}','ParentController@bookGroupSession')->name('book-group-session');

	Route::post('/book-mentoring-session/{session_id}','ParentController@bookMentoringSession')->name('book-mentoring-session');

	Route::get('/book-session-success','ParentController@bookSessionSuccess')->name('book-session-success');

	Route::post('/enroll/{course_id}','ParentController@enroll')->name('enroll');


});

Route::group(['prefix' => 'student','middleware' => 'student'],function(){
	Route::get('/dashboard', 'StudentController@dashboard')->name('student.dashboard');
	Route::get('/reset-password', 'StudentController@resetPassPage')->name('student.reset.password.page');
	Route::get('/ambassador-program', 'StudentController@ambassadorPage')->name('student.ambassador-program');
	Route::get('/activities/{platform_id}', 'StudentController@getActivities')->name('student.get-activity');
	Route::post('/store-activity', 'StudentController@storeActivity')->name('student.store-activity');
	Route::get('/my-courses', 'StudentController@myCoursesPage')->name('student.my-courses');
	Route::get('/course/{course_id}','StudentController@singleCourse')->name('student.single-course');
});

Route::post('/parent/update','ParentController@updateInfo')->name('parent.update-info');

Route::group(['prefix' => 'educator'],function(){
	Route::get('/dashboard', 'EducatorController@dashboard')->name('educator.dashboard');
	Route::get('/meetings','EducatorController@meetings')->name('educator.meetings');
});

Route::post('/parent/pay/plan/{student_id}','ParentController@parentPayPlan')->name('parent.pay.plan');

//Public routes
Route::get('/','MainController@showWelcome')->name('welcome');

Route::get('/school-overview','AboutController@showhighschoolOverview')->name('school-overview');

Route::get('/mission-statement','AboutController@showMissionStatement')->name('mission-statement');

Route::get('/contact','MainController@contact')->name('student-advisory-service');

Route::get('/academics','AboutController@showAcademics')->name('academics');

Route::get('/accreditation','AboutController@showAccreditation')->name('accreditation');

Route::get('/blog','MainController@showBlog')->name('blog');

Route::get('/blog/{slug}','MainController@showSingleBlog')->name('single-article');

Route::get('/faq','FooterController@showFaq')->name('faq');

Route::get('/faq/{category}','FooterController@getSingleFaqCategory')->name('single-faq-category');

Route::get('/students-in-spotlight','AboutController@showStudentsInSpotlight')->name('students-in-spotlight');

Route::get('/feature/{slug}','MainController@feature')->name('single-feature');

Route::get('/code-of-ethics','FooterController@showCodeOfEtics')->name('code-of-ethics');

Route::get('/starter-kit','FooterController@starterKit')->name('starter-kit');

Route::get('/newsletter','MainController@showNewsletter')->name('newsletter');

Route::get('/facts-hub','MainController@showFactsHub')->name('facts-hub');

Route::get('/facts-hub/{slug}','MainController@showSingleFactsHub')->name('single-facts-hub');

Route::get('/press-release','MainController@showPressRelease')->name('press-release');

Route::get('/press-release/{slug}','MainController@showSinglePressRelease')->name('single-press-release');

Route::get('/accessibility','FooterController@accessibility')->name('accessibility');

Route::get('/leadership','AboutController@showLeadership')->name('leadership');

Route::get('/partnership','AboutController@showPartnership')->name('partnership');

Route::get('/highschool-programs','AcademicsController@highSchoolPrograms')->name('highschool-programs');

Route::get('/graduation-requirements','AcademicsController@graduationRequirements')->name('graduation-requirements');

Route::get('/credit-recovery','AcademicsController@creditRecovery')->name('credit-recovery');

Route::get('/credit-transfer','AcademicsController@creditTransfer')->name('credit-transfer');

Route::get('/awards','AcademicsController@awards')->name('awards');

Route::get('/international-students','AcademicsController@internationalStudents')->name('international-students');

Route::get('/standard-high-school','CurriculumController@standardHighSchool')->name('standard-high-school');

Route::get('/transfer-program','CurriculumController@transferProgram')->name('transfer-program');

Route::get('/honors-high-school','CurriculumController@honorsHighSchool')->name('honors-high-school');

Route::get('/advanced-placement','CurriculumController@advancedPlacement')->name('advanced-placement');

Route::get('/psat','CurriculumController@psat')->name('psat');

Route::get('/act','CurriculumController@act')->name('act');

Route::get('/cte','CurriculumController@cte')->name('cte');

Route::get('/clep','CurriculumController@clep')->name('clep');

Route::get('/esol','CurriculumController@esol')->name('esol'); #a.k.a english courses

Route::get('/learning-mentoring','CurriculumController@learningMentoring')->name('learning-mentoring');

Route::get('/admission-process','CurriculumController@admissionProcess')->name('admission-process');

Route::get('/enrollment-criteria','AdmissionController@enrolmentCriteria')->name('enrollment-criteria');

Route::get('/enrollment-options','AdmissionController@enrolmentOptions')->name('enrollment-options');

Route::get('/tuition','AdmissionController@tuition')->name('tuition');

Route::get('/tuition-assistance','AdmissionController@tuitionAssistance')->name('tuition-assistance');

Route::get('/apply','AdmissionController@apply')->name('apply');

Route::get('/ambassador-program','AdmissionController@ambassadorProgram')->name('ambassador-program');

Route::post('parent/reupload/document/{student_id}','ParentController@reuploadDocuments')->name('parent.reupload.document');

// Route::get('/iso','AdmissionController@iso')->name('iso');

#cronjob
Route::get('/check-subscriptions','CronjobController@checkSubscribtions')->name('check-subscriptions');

#sitemaps
Route::get('/sitemap','SitemapController@showSitemapHTML')->name('sitemap');
Route::get('/sitemap.xml','SitemapController@sitemap')->name('sitemap-xml');


		
// Route::post('/get-selected-program', 'MainController@getSelectedProgram')->name('get-selected-program');

// Route::post('/use-redeem-code', 'MainController@useRedeemCode')->name('use-redeem-code');
	
// Route::post('/apply-now/{conference_id}','MainController@postApplyNow')->name('apply-now');

// Route::post('/receive-application', 'MainController@receiveApplication')->name('receive-application');

Route::post('/logout','MainController@logout')->name('logout');

Route::post('/accept-cookies','MainController@acceptCookies');

Route::post('/custom-cookies','MainController@customCookies');

// #single program contact form (modal when you click learn more)
// Route::post('/request-information', 'ContactController@sendRequestForProgram')->name('request-information');

// #phone modal on bottom right icon
// Route::post('/phone-contact','ContactController@sendPhoneContact')->name('phone-contact');

// #home page contact form
// Route::post('/contact','ContactController@sendContact')->name('contact');

// #assitent page request
// Route::post('/general-request','ContactController@generalRequest')->name('general-request');

// Route::post('/get-programs','MainController@getPrograms')->name('get-programs');

// Route::post('/get-payments-options','MainController@getPaymentOption')->name('get-payments-options');

Route::post('/subscribe','MainController@subscribe')->name('subscribe');

Route::post('/unsubscribe-user/{id}','MainController@unsubscribeUser')->name('unsubscribe-user');

Route::get('/verify/mail/{confcode}', 'MainController@verifyAccount');

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