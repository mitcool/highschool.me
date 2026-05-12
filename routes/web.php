<?php

Route::get('/404','MainController@notFound')->name('404');

Route::get('/sitemap-images.xml', 'SitemapController@imageSitemap');

Route::get('/send-newsletter','NewsletterSendController@send');

Route::post('/set-timezone', function (\Illuminate\Http\Request $request) {
    session(['timezone' => $request->timezone]);
    return response()->json();
});

Auth::routes();

Route::group(['prefix' => 'parent','middleware' => 'parent'],function(){

	Route::get('/dashboard', 'ParentController@dashboard')->name('parent.dashboard');
	Route::get('/meetings','ParentController@meetings_all')->name('parent.meetings');
	Route::get('/meetings/{student_id}','ParentController@meetings_student')->name('parent.meetings.student');
	Route::get('/student/add','ParentController@createStudent')->name('parent.create.student');
	Route::post('/student/create','ParentController@addStudent')->name('student.add');
	Route::get('/select-track/{student_id}','ParentController@selectTrack')->name('parent.select-track');
	Route::post('/update-track/{student_id}','ParentController@updateTrack')->name('parent.update-student-track');
	Route::get('/student/documents/{student_id}','ParentController@studentDocuments')->name('parent.student.documents');
	Route::post('/student/documents/submit','ParentController@studentDocumentsSubmit')->name('parent.student.documents.submit');
	Route::get('/student/module/courses/{student_id}','ParentController@studentModuleCourses')->name('parent.student.module.courses');
	Route::get('/student/sessions/{student_id}','ParentController@studentSessions')->name('parent.student.sessions');
	Route::get('/payments','ParentController@payments')->name('parent.payments');
	Route::get('/invoices','ParentController@invoices')->name('parent.invoices');
	Route::get('/invoices/{invoice_id}', 'ParentController@singleInvoice')->name('parent.single-invoice');
	Route::get('/student/profile/{student_id}','ParentController@studentProfile')->name('parent.student.profile');
	Route::get('/student/profile/{student_id}/pre-exam/{exam_id}','ParentController@studentPreExam')->name('parent.student.pre-exam');
	Route::get('/student/profile/{student_id}/exam-results/{exam_id}','ParentController@studentExamResults')->name('parent.student.exam-results');
	Route::get('/protocols', 'ParentController@protocolsPage')->name('parent.protocols.index');
	Route::get('/protocols/{student_id}', 'ParentController@studentProtocol')->name('parent.protocols.show');
	Route::get('/diplomas','ParentController@diplomas')->name('parent.diplomas');
    Route::get('/request-copy/{id}','ParentController@requestCopy')->name('request-copy');
	Route::post('/request-copy/{id}','ParentController@requestCopyPost')->name('request-copy-post');
	Route::post('request-physical-copy-post/{diploma_id}','ParentController@requestPhysicalCopyPost')->name('request-physical-copy-post');
	Route::get('/physical-copy-request-success/{diploma_id}','ParentController@physicalCopyRequest')->name('parent.physical-copy-request-success');
	Route::get('/pay-copy-success','ParentConroller@payCopySuccess')->name('parent.pay-copy-success');
	Route::get('copies-number/{diploma_id}','ParentController@copiesNumber')->name('parent.copies-number');
	Route::post('/change-diploma-copies-count/{diploma_id}/{type}','ParentController@changeDiplomaCopiesCount')->name('change-diploma-copies-count');
	Route::get('/profile','ParentController@profile')->name('parent.profile');
	Route::get('/application-fee/{student_id}','ParentController@applicationFee')->name('application-fee');
	Route::get('/application-fee-success/{student_id}','ParentController@applicationFeeSuccess')->name('application-fee-success');
	Route::get('/enrollment-fee/{student_id}/{plan_id}/{payment_type}','ParentController@enrollmentFee')->name('enrollment-fee');
	Route::get('/enrollment-fee-success','ParentController@enrollmentFeeSuccess')->name('enrollment-fee-success');
	Route::post('/extend-plan/{student_id}','ParentController@extendPlan')->name('extend-plan');
	Route::get('/extend-plan-success','ParentController@extendPlanSuccess')->name('extend-plan-success');
	Route::post('/request-family-consultation','ParentController@requestFamilyConsultation')->name('request-family-consultation');
	Route::post('/confirm-meeting/{meeting_id}','ParentController@confirmMeeting')->name('confirm-meeting');
	Route::post('/change-courses-count/{course_id}/{action}','ParentController@changeCourseTypeCount')->name('change-course-type-count');
	Route::get('/course-type-checkout/{student_id}','ParentController@studentCourseTypeCheckout')->name('parent.student.course-type.checkout');
	#releted to Group Session,menotring sessions and coaching sessions
	Route::post('/change-session-count/{session_id}/{action}','ParentController@changeSessionCount')->name('change-session-count');
	Route::get('/sessions-checkout/{student_id}','ParentController@studentSessionsCheckout')->name('parent.student.sessions.checkout');
	Route::post('/sessions-pay/{student_id}','ParentController@studentSessionsPay')->name('parent.student.sessions.pay');
	Route::post('/course-type-pay/{student_id}','ParentController@studentCourseTypePay')->name('parent.student.courses-type.pay');
	Route::get('/course-type-pay-success/{student_id}','ParentController@studentCourseTypeSuccess')->name('parent.courses-type-pay-success');
	Route::get('/session-pay-success/{student_id}','ParentController@studentSessionsSuccess')->name('session-pay-success');
	Route::post('/enroll/{course_id}','ParentController@enroll')->name('enroll');
	Route::post('/update-enrolled-course-status/{enrolled_course_id}','ParentController@updateEnrolledCourseStatus')->name('update-enrolled-course-status');
	Route::post('/transfer-program-pay/{student_id}','ParentController@transferProgramPay')->name('parent.transfer-program-pay');
	Route::get('/transfer-program-pay-success/{student_id}/{type}/{plan_id}','ParentController@transferProgramPaySuccess')->name('parent.transfer-pay-success');
	Route::get('/reset-password', 'ParentController@resetPassPage')->name('parent.reset.password.page');
	#related to leaves
	Route::get('/request-leave', 'ParentController@requestLeavePage')->name('parent.request-leave');
	Route::post('/store-leave', 'ParentController@requestLeave')->name('parent.store-leave');
	Route::get('/plans','ParentController@plans')->name('parent.plans');
	Route::post('/terminate-plan/{plan_id}','ParentController@terminatePlan')->name('terminate-plan');
	Route::get('/change-plan/{student_id}','ParentController@changePlan')->name('change-plan');
	Route::post('/update-plan/{student_id}','ParentController@updatePlan')->name('parent.update-plan');
	Route::get('/update-plan-success/{student_id}/{requested_plan}/{type}','ParentController@updatePlanSuccess')->name('parent.update-plan-success');
	Route::get('/enrollment-confirmation/{student_id}','ParentController@enrollmentConfirmation')->name('enrollment-confirmation');
	Route::get('/parent.request-verification-of-graduation/{student_id}','ParentController@requestVerificationOfGraduation')->name('parent.request-verification-of-graduation');
	Route::get('/verification-of-graduation-success/{student_id}','ParentController@verificationOfGraduationSuccess')->name('parent.verification-of-graduation-success');
	Route::get('/request-verification-of-graduation-pdf/{student_id}','ParentController@requestVerificationOfGraduationPdf')->name('parent.request-verification-of-graduation-pdf');
	#notifications
	Route::get('/all-notifications', 'ParentController@showNotifications')->name('parent.notifications');

});

Route::group(['prefix' => 'student','middleware' => 'student'],function(){
	Route::get('/dashboard', 'StudentController@dashboard')->name('student.dashboard');
	Route::get('/reset-password', 'StudentController@resetPassPage')->name('student.reset.password.page');
	Route::get('/ambassador-program', 'StudentController@ambassadorPage')->name('student.ambassador-program');
	Route::get('/activities/{platform_id}', 'StudentController@getActivities')->name('student.get-activity');
	Route::post('/store-activity', 'StudentController@storeActivity')->name('student.store-activity');
	Route::post('/ambassador/redeem', 'StudentController@redeemRewards')->name('ambassador.redeem');
	Route::get('/diplomas','StudentController@diplomas')->name('student.diplomas');
	Route::get('/generate-pdf-diploma/{student_id}','StudentController@generatePdfDiploma')->name('student.generate-pdf-diploma');
	Route::post('/request-diploma-copy','StudentController@requestDiplomaCopy')->name('request-diploma-copy');
    Route::get('/request-diploma-copy-success','StudentController@requestDiplomaCopySuccess')->name('request-diploma-copy-success');
    Route::get('/digital-transcript/{student_id}','StudentController@digitalTransript')->name('student.generate-pdf-transcript');
	
	Route::get('/profile','StudentController@profile')->name('student.profile');
	#notifications
	Route::get('/all-notifications', 'StudentController@showNotifications')->name('student.notifications');

	Route::middleware('student.long_leave_restriction')->group(function () {
		Route::get('/my-courses', 'StudentController@myCoursesPage')->name('student.my-courses');
		Route::get('/course/{course_id}','StudentController@singleCourse')->name('student.single-course');
		Route::get('/course-material/{material_id}', 'StudentController@singleMaterial')->name('student.course-material');
		Route::get('/course-video/{video_id}', 'StudentController@singleVideo')->name('student.course-video');
		Route::get('/study-mentor','StudentController@studyMentor')->name('student.study-mentor');
		Route::get('/study-mentor/{slug}','StudentController@singleStudyMentor')->name('student.single-study-mentor');
		Route::get('/single-study-mentor-chat/{slug}','StudentController@singleStudyMentorChat')->name('student.single-study-mentor-chat');
		# chat gpt Route::post('/study-mentor-chat','StudentController@singleStudyMentorChatPost')->name('student.study-mentor-chat-post');
		Route::post('/study-mentor-chat','StudentController@claudeChat')->name('student.study-mentor-chat-post');
		Route::get('/exams','StudentController@exams')->name('student.exams');
		Route::get('/exams/{id}','StudentController@singleExam')->name('student.single-exam');
		Route::get('/exams/result/{id}','StudentController@singleExamResults')->name('student.single-exam-results');
		Route::post('/submit-exam/{exam_id}','StudentController@submitExam')->name('submit-exam');
		Route::post('/fail-exam/{exam_id}','StudentController@failExam')->name('fail-exam');
		Route::get('/self-assessment-test/{material_id}', 'StudentController@selfAssessmentTest')->name('student.self-assessment-test');
		Route::post('/self-assessment-test-submit/{attempt}', 'StudentController@submitSelfAssessmentTest')->name('student.self-assessment-test-submit');
		Route::get('/self-assessment-test-review', 'StudentController@selfAssessmentTestReview')->name('student.self-assessment-review');
		Route::get('/pre-exam/{subject_id}','StudentController@preExam')->name('student.pre-exam');
		Route::post('/submit-pre-exam','StudentController@submitPreExam')->name('submit-pre-exam-exam');
 		Route::post('/record-fraud','StudentController@recordFraud')->name('record-fraud');
		Route::get('/meetings','StudentController@meetings')->name('student.meetings');
		Route::post('/book-group-session/{session_id}','ParentController@bookGroupSession')->name('book-group-session');
		Route::post('/book-mentoring-session/{session_id}','ParentController@bookMentoringSession')->name('book-mentoring-session');
		Route::post('/book-coaching-session/{session_id}','ParentController@bookCoachingSession')->name('book-coaching-session');
		Route::get('/book-session-success','ParentController@bookSessionSuccess')->name('book-session-success');
	});
});

Route::group(['prefix' => 'educator','middleware' => 'educator'],function(){
	Route::get('/dashboard', 'EducatorController@dashboard')->name('educator.dashboard');
	Route::get('/courses','EducatorController@courses')->name('educator.courses');
	Route::get('/meetings','EducatorController@meetings')->name('educator.meetings');
	Route::get('/exams','EducatorController@exams')->name('educator.exams');
	// Route::get('/self-assesment','EducatorController@selfAssessment')->name('educator.self-assessment');
	Route::get('/submissions','EducatorController@submissions')->name('educator.submissions');
	Route::get('/invoices','EducatorController@invoices')->name('educator.invoices');
	Route::get('/invoices/{invoice_id}', 'EducatorController@singleInvoice')->name('educator.single-invoice');
	Route::get('/reset-password', 'EducatorController@resetPassPage')->name('educator.reset.password.page');
	Route::post('/add-asses-question', 'EducatorController@storeSelfAssessQuestion')->name('educator.add-asses-question');
	Route::get('/edit-self-assessment-question/{question_id}', 'EducatorController@editSelfAssessmentQuestionPage')->name('educator.edit-single-self-assessment-question');
	Route::post('/edit-single-self-assessment-question/{question_id}', 'EducatorController@editSelfAssessmentQuestion')->name('educator.self-assessment-update');
	Route::post('/delete-single-self-assessment-question/{question_id}', 'EducatorController@deleteSelfAssessmentQuestion')->name('educator.delete-self-asses-question');
	Route::post('/exams/add','EducatorController@createExam')->name('educator.create-exam');
	// Route::get('/add-exam-questions', 'EducatorController@addExamQuestionsPage')->name('educator.add-exam-question');
	// Route::post('/add-exam-question', 'EducatorController@addExamQuestion')->name('educator.exam-question-add');
	// Route::get('/edit-exam-question/{question_id}', 'EducatorController@editQuestionPage')->name('educator.update-exam-question');
	// Route::post('/edit-exam-single-question/{question_id}', 'EducatorController@editExamQuestion')->name('educator.update-question-exam');
	Route::post('/delete-exam-question', 'EducatorController@deleteExamQuestion')->name('educator.delete-exam-question');
	Route::get('/materials-by-course/{course}', 'EducatorController@materialsByCourse')->name('educator.materials-by-course');
	Route::get('/submissions/{submition_id}','EducatorController@showSingleSubmission')->name('educator.single-submission');
	Route::post('/evaluate-exam/{exam_id}','EducatorController@evaluateExam')->name('educator.evaluate-exam');
	Route::get('/materials/{course_id}','EducatorController@editCourseMaterials')->name('educator.course-materials');
	Route::post('/course-material/add','EducatorController@addCourseMaterials')->name('educator.add-course-material');
	Route::post('/new-course-request','EducatorController@requestNewCourse')->name('educator.request-new-course');
	Route::get('/profile','EducatorController@profile')->name('educator.profile');
	Route::get('/complaints','EducatorController@complaints')->name('educator.complaints');
	Route::post('/complaints','EducatorController@createComplaint')->name('create-complaint');
	#notifications
	Route::get('/all-notifications', 'EducatorController@showNotifications')->name('educator.notifications');

});

Route::post('/parent/pay/plan/{student_id}','ParentController@parentPayPlan')->name('parent.pay.plan');
Route::get('/digital-transcript/{student_id}','StudentController@digitalTransript')->name('student.generate-pdf-transcript');


//Public routes

Route::group(['middleware' => 'text'],function(){
	
	Route::get('/','MainController@showWelcome')->name('welcome');

	Route::get('/early-registration','MainController@earlyRegistration')->name('early-registration');

	Route::get('/faq/{category}','FooterController@getSingleFaqCategory')->name('single-faq-category');

	Route::get('/school-overview','AboutController@showhighschoolOverview')->name('school-overview');

	Route::get('/mission-statement','AboutController@showMissionStatement')->name('mission-statement');

	Route::get('/contact','MainController@contact')->name('student-advisory-service');

	Route::get('/academics','AboutController@showAcademics')->name('academics');

	Route::get('/accreditation','AboutController@showAccreditation')->name('accreditation');

	Route::get('/iso-9001-2015', 'AboutController@showFirstIso')->name('first-iso');

	Route::get('/iso-21001-2018', 'AboutController@showSecondIso')->name('second-iso');

	//Route::get('/iso-27001-2022', 'AboutController@showThirdIso')->name('third-iso');

	Route::get('/florida-department-of-education', 'AboutController@showFloridaDepartment')->name('florida-department');

	//Route::get('/college-board', 'AboutController@showCollegeBoard')->name('college-board');

	Route::get('/united-nations', 'AboutController@showUNpage')->name('united-nations');

	//Route::get('/american-college-test', 'AboutController@showACTpage')->name('american-college-test');

	Route::get('/blog','MainController@showBlog')->name('blog');

	Route::get('/blog/{slug}','MainController@showSingleBlog')->name('single-article');

	Route::get('/faq','FooterController@showFaq')->name('faq');

	Route::get('/students-in-spotlight','AboutController@showStudentsInSpotlight')->name('students-in-spotlight');

	Route::get('/feature/{slug}','MainController@feature')->name('single-feature');

	Route::get('/code-of-conduct','FooterController@showCodeOfEtics')->name('code-of-ethics');

	Route::get('/freshman-kit','FooterController@starterKit')->name('starter-kit');

	Route::get('/newsletter','MainController@showNewsletter')->name('newsletter');

	Route::get('/fact-hub','MainController@showFactsHub')->name('facts-hub');

	Route::get('/facts-hub/{slug}','MainController@showSingleFactsHub')->name('single-facts-hub');

	Route::get('/press-releases','MainController@showPressRelease')->name('press-release');

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

	Route::get('/transfer-program/{slug}','CurriculumController@showSingleTransferProgramCourse')->name('single-tranfer-program-course');

	Route::get('/honors-high-school','CurriculumController@honorsHighSchool')->name('honors-high-school');

	Route::get('/advanced-placement','CurriculumController@advancedPlacement')->name('advanced-placement');

	Route::get('/advanced-placement/{slug}','CurriculumController@showSingleApCourse')->name('single-ap-course');

	Route::get('/psat','CurriculumController@psat')->name('psat');

	Route::get('/act','CurriculumController@act')->name('act');

	Route::get('/cte','CurriculumController@cte')->name('cte');

	Route::get('/clep','CurriculumController@clep')->name('clep');

	Route::get('/clep/{slug}','CurriculumController@showSingleClepCourse')->name('single-clep-course');

	Route::get('/esol','CurriculumController@esol')->name('esol'); #a.k.a english courses

	Route::get('/learning-mentoring','CurriculumController@learningMentoring')->name('learning-mentoring');

	Route::get('/admission-process','AdmissionController@admissionProcess')->name('admission-process');

	Route::get('/enrollment-criteria','AdmissionController@enrolmentCriteria')->name('enrollment-criteria');

	Route::get('/enrollment-options','AdmissionController@enrolmentOptions')->name('enrollment-options');

	Route::get('/tuition','AdmissionController@tuition')->name('tuition');

	Route::get('/tuition-assistance','AdmissionController@tuitionAssistance')->name('tuition-assistance');

	Route::get('/apply','AdmissionController@apply')->name('apply');

	Route::get('/ambassador-program','AdmissionController@ambassadorProgram')->name('ambassador-program');

	Route::get('/terms-and-conditions', 'FooterController@terms')->name('terms-and-conditions');

	Route::get('/sitemap','SitemapController@showSitemapHTML')->name('sitemap');
});

Route::post('/early-registration','MainController@earlyRegistrationSubmit')->name('early-registration-submit');

Route::post('/parent/reupload/document/{student_id}','ParentController@reuploadDocuments')->name('parent.reupload.document');

// Route::get('/iso','AdmissionController@iso')->name('iso');

#cronjob
Route::get('/check-subscriptions','CronjobController@checkSubscribtions')->name('check-subscriptions');
Route::get('/check-exams','CronjobController@failExamsWhereStudentDoesntShowTo')->name('check-exams');
Route::get('/update-questions','CronjobController@updateStudyMentorQuestions')->name('update-questions');
Route::get('/sessions-reminder','CronjobController@sessionsReminder')->name('session-reminder');
Route::get('/promote-student-grades','CronjobController@promoteStudentGrades')->name('promote-student-grades');

#sitemaps

Route::get('/sitemap.xml','SitemapController@sitemap')->name('sitemap-xml');

#resetPassword
Route::middleware('auth')->group(function () {
    Route::post('/change-password', 'MainController@updatePassword')->name('user.password.update');
	Route::get('/help-desk','MainController@helpDesk')->name('help-desk');
	Route::get('/help-desk/new/{slug?}','MainController@newHelpDesk')->name('new-help-desk');
	Route::get('/single-help-desk/{slug}','MainController@singleHelpDesk')->name('single-help-desk');
	Route::post('/send-message/{slug?}','MainController@sendHelpDeskQustion')->name('send-help-desk');
});

#delete single notification and all notifications, ajax - get count of unread notifications
Route::middleware('auth')->group(function () {
	Route::post('/delete-single-notification/{notification_id}', 'Controller@deleteSingleNotification')->name('admin.delete-single-notification');
	Route::post('/delete-notifications', 'Controller@deleteAllNotifications')->name('admin.delete-notifications');
	Route::get('/get-unread-count', 'Controller@ajaxUnreadCount')->name('get-unread-count');
});
		
Route::post('/logout','MainController@logout')->name('logout');

Route::post('/accept-cookies','MainController@acceptCookies');

Route::post('/custom-cookies','MainController@customCookies');

Route::post('/subscribe','MainController@subscribe')->name('subscribe');

Route::post('/unsubscribe-user/{id}','MainController@unsubscribeUser')->name('unsubscribe-user');

Route::get('/verify/mail/{confcode}', 'MainController@verifyAccount')->name('verify.mail');

Route::get('/verify/mail/resend/{confcode}', 'MainController@resendVerificationLink')->name('verify.mail.resend');

Route::post('/get-courses','AdminController@getCourses')->name('get-courses');

Route::post('/delete-exam/{exam_id}','AdminController@deleteExam')->name('delete-exam');

Route::post('/edit-exam/{exam_id}','AdminController@editExam')->name('edit-exam');

Route::get('/exam-protocol/{exam_id}','StudentController@examProtocol')->name('exam-protocol');

Route::post('/parent/update','ParentController@updateInfo')->name('parent.update-info');

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
