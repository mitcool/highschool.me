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
	Route::get('/edit-single-academic/{academic_id}','AdminController@editSingleAcademic')->name('edit-single-academic');

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
	
	//Facts hub
	Route::get('/facts-hub','FactsHubController@index')->name('admin-facts-hub');
	Route::post('/facts-hub/create','FactsHubController@store')->name('facts-hub-create');
	Route::get('/facts-hub/edit/{news_id}','FactsHubController@show')->name('edit-facts-hub');
	Route::post('/facts-hub/delete/{news_id}','FactsHubController@destroy')->name('delete-facts-hub');
	Route::post('/facts-hub/update/{news_id}','FactsHubController@update')->name('facts-hub-update');
	Route::get('/facts-hub/images/attributes','FactsHubController@getImagesAttributes')->name('facts-hub-images-attributes');
	Route::post('/facts-hub/images/attributes/{image_id}','FactsHubController@changeImageAttributes')->name('change-facts-hub-attributes');

	//Facts hub
	Route::get('/press-release','PressReleaseController@index')->name('admin-press-release');
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
	Route::get('/feature/edit/{feature_id}','AdminController@editFeature')->name('feature.edit');
	Route::post('/feature/update/{feature_id}','AdminController@updateFeature')->name('feature.update');
	Route::post('/feature/delete/{feature_id}','AdminController@deleteFeature')->name('feature.delete');
	Route::post('/plans/edit','AdminController@editPlans')->name('plans.edit');
	Route::get('/features/order','AdminController@featureOrder')->name('admin-features-order');
	Route::post('/features/reorder','AdminController@reOrderFeatures')->name('features-reorder');

	//Meetings
	Route::get('/group-session','AdminMeetingController@groupSessions')->name('admin-group-sessions');
	Route::get('/add-group-session','AdminMeetingController@addGroupSession')->name('add-group-session');
	Route::post('/create-group-session','AdminMeetingController@createGroupSession')->name('create-group-session');
	
	Route::get('/mentoring-session','AdminMeetingController@mentoringSessions')->name('admin-mentoring-sessions');
	Route::get('/add-mentoring-session','AdminMeetingController@addMentoringSession')->name('add-mentoring-session');
	Route::post('/create-mentoring-session','AdminMeetingController@createMentoringSession')->name('create-mentoring-session');

	Route::get('/coaching-session','AdminMeetingController@coachingSessions')->name('admin-coaching-sessions');
	Route::get('/add-coaching-session','AdminMeetingController@addCoachingSession')->name('add-coaching-session');
	Route::post('/create-coaching-session','AdminMeetingController@createCoachingSession')->name('create-coaching-session');

	Route::get('/educators','AdminController@educators')->name('admin-educators');
	Route::post('/educator/add','AdminController@createEducator')->name('create-educator');
	Route::post('/educator/delete/{educator_id}','AdminController@deleteEducator')->name('delete-educator');
	Route::post('/educator/edit','AdminController@editEducator')->name('edit-educator');

	//Exams
	Route::get('/exams','AdminController@exams')->name('admin-exams');
	Route::post('/get-courses','AdminController@getCourses')->name('get-courses');
	Route::post('/exams/add','AdminController@createExam')->name('create-exam');
	Route::get('/submissions','AdminController@showSubmissions')->name('admin-submissions');
	Route::get('/add-exam-questions', 'AdminController@addExamQuestionsPage')->name('admin.add-exam-question');
	Route::post('/add-exam-question', 'AdminController@addExamQuestion')->name('admin.exam-question-add');
	Route::get('/edit-exam-question/{question_id}', 'AdminController@editQuestionPage')->name('admin.update-exam-question');
	Route::post('/edit-exam-single-question/{question_id}', 'AdminController@editExamQuestion')->name('admin.update-question-exam');
	Route::post('/delete-exam-question', 'AdminController@deleteExamQuestion')->name('admin.delete-exam-question');
	Route::get('/submissions/{submition_id}','AdminController@showSingleSubmission')->name('single-submission');
	Route::post('/evaluate-exam/{exam_id}','AdminController@evaluateExam')->name('evaluate-exam');
	
	Route::get('/help-desk/parent','AdminController@parentHelpDesk')->name('admin-parent-help-desk');
	Route::get('/help-desk/student','AdminController@studentHelpDesk')->name('admin-student-help-desk');
	Route::get('/help-desk/new','AdminController@newHelpDesk')->name('admin.single-help-desk');

	Route::get('/family-consultations','AdminMeetingController@familyConsultations')->name('admin-family-consultations');
	Route::get('/add-family-consultation/{request_id}','AdminMeetingController@addFamilyConsultation')->name('add-family-consultation');
	Route::post('/create-family-consultation/{request_id}','AdminMeetingController@createFamilyConsultation')->name('create-family-consultation');
	Route::post('/mark-family-consultation-as-completed/{request_id}','AdminMeetingController@markFamilyConsultationAsCompleted')->name('mark-family-consultation-as-completed');
	//Courses
	Route::get('/courses','AdminController@courses')->name('admin-courses');
	Route::post('/courses/add','AdminController@addCourse')->name('course.add');
	Route::get('/course/edit/{course_id}','AdminController@editCourse')->name('course.edit');
	Route::post('/courses/update/{course_id}','AdminController@updateCourse')->name('course.update');
	Route::post('/courses/delete','AdminController@deleteCourse')->name('course.delete');

	//Public Courses
	Route::get('/courses-types','AdminController@courseTypes')->name('admin-courses-types');
	Route::post('/courses-types/add','AdminController@addCourseType')->name('course-types.add');
	Route::get('/course-types/edit/{course_id}','AdminController@editCourseType')->name('course-type.edit');
	Route::post('/courses-types/update/{course_id}','AdminController@updateCourseType')->name('course-type.update');
	Route::post('/courses-types/delete','AdminController@deleteCourseType')->name('course-type.delete');

	//Courses for the enrollment process
	Route::get('/enrollment-courses', 'AdminController@showAddEnrollmentCourse')->name('enrollment-courses');
	Route::post('/add-enrollment-course', 'AdminController@AddEnrollmentCourse')->name('add-enrollment-course');
	Route::get('/all-enrollment-courses', 'AdminController@allEnrollmentCoursesPage')->name('all-enrollment-courses');
	Route::get('/edit-enrollment-course/{course_id}', 'AdminController@editEnrollmentCoursePage')->name('edit-enrollment-course');
	Route::post('/update-enrollment-course/{course_id}', 'AdminController@updateEnrollmentCourse')->name('admin.update-enrollment-course');
	
	//Student documents 
	Route::get('/students/documents','AdminStudentController@studentDocuments')->name('admin-student-documents');
	Route::get('/student/documents/{student_id}','AdminStudentController@singleStudentDocument')->name('single-student-documents');
	Route::post('/students/documents/{student_id}','AdminStudentController@approveDocuments')->name('approve.student');
	Route::post('/approve/document/{action}','AdminStudentController@approveSingleDocument')->name('approve-document');
	Route::post('/approve/document','AdminStudentController@wrongDocument')->name('wrong-document');

	//Student Overview
	Route::get('/admin-student-overview','AdminStudentController@overview')->name('admin-student-overview');

	//Payments
	Route::get('/invoices', 'AdminController@showInvoices')->name('admin-invoices');
	Route::get('/invoices/{invoice_id}', 'AdminController@singleInvoice')->name('admin-single-invoice');

	//Ambassador program
	Route::get('/ambassador-links', "AdminController@showAmbassadorLinks")->name('admin.ambassador-links');
	Route::post('/update-ambassador-activity', 'AdminController@updateAmbassadorStatus')->name('admin.update-ambassador-activity');
	Route::get('/ambassador-rewards', 'AdminController@showAmbassadorRewards')->name('admin.ambassador-rewards');
	Route::get('/add-reward', 'AdminController@showAddRewardPage')->name('admin.add-reward');
	Route::post('add-new-reward', 'AdminController@addReward')->name('admin.add-new-reward');
	Route::get('/ambassador-activities', 'AdminController@showActivitiesPage')->name('admin.ambassador-activities');
	Route::get('/add-activity', 'AdminController@showAddActivityPage')->name('admin.add-activity');
	Route::post('/add-new-activity', 'AdminController@addActivity')->name('admin.add-new-activity');
	Route::get('/edit-single-reward/{reward_id}', 'AdminController@showEditRewardPage')->name('admin.edit-single-reward');
	Route::post('/edit-reward/{reward_id}', 'AdminController@updateReward')->name('admin.edit-reward');
	Route::post('/delete-reward/{reward_id}', 'AdminController@deleteReward')->name('admin.delete-reward');

	//Password functionality
	Route::get('/change-password', 'AdminController@changePassword')->name('admin.change-password');
	Route::post('/update-password', 'AdminController@updatePassword')->name('admin.update-password');

	//Students in Spotlights
	Route::get('/students-in-spotlight', 'AdminController@studentSpotlight')->name('admin.students-in-spotlights');
	Route::get('/edit-single-student/{student_id}','AdminController@editSingleStudent')->name('admin.edit-single-student');
	Route::post('/add-student-in-spotlight', 'AdminController@addStudentSpotlight')->name('admin.add-student-in-spotlight');
	Route::post('/edit-single-student-in-spotlight/{student_id}', 'AdminController@editStudentSpotlight')->name('admin.edit-single-student-in-spotlight');

	//Self-assessment functionality
	Route::get('/add-self-assessment-question', 'AdminController@addSelfAssessmentQuestionPage')->name('admin.add-self-assess-question');
	Route::get('/materials-by-course/{course}', 'AdminController@materialsByCourse')->name('admin.materials-by-course');
	Route::post('/add-asses-question', 'AdminController@storeSelfAssessQuestion')->name('admin.add-asses-question');
	Route::get('/edit-self-assessment-question/{question_id}', 'AdminController@editSelfAssessmentQuestionPage')->name('admin.edit-single-self-assessment-question');
	Route::post('/edit-single-self-assessment-question/{question_id}', 'AdminController@editSelfAssessmentQuestion')->name('admin.self-assessment-update');
	Route::post('/delete-single-self-assessment-question/{question_id}', 'AdminController@deleteSelfAssessmentQuestion')->name('admin.delete-self-asses-question');

	//Student leaves functionality
	Route::get('/all-requested-leaves', 'AdminController@requestedLeavesPage')->name('admin.all-requested-leaves');
	Route::get('/single-leave-reuqest/{request_id}', 'AdminController@singleLeaveRequestPage')->name('admin.single-leave-reuqest');
	Route::patch('/leave-requests/approve/{request_id}', 'AdminController@approveLeaveRequest')->name('admin.leave_requests.approve');
    Route::patch('/leave-requests/deny/{request_id}', 'AdminController@denyLeaveRequest')->name('admin.leave_requests.deny');

	Route::get('/single/student/{student_id}','AdminStudentController@singleStudentProfile')->name('admin.single-student');

	Route::get('/diploma-requests','AdminController@diplomaRequests')->name('admin-student-diploma-requests');
	Route::post('admin.change-diploma-printing-status/{request_id}','AdminController@ChangeDiplomaPrintingStatus')->name('admin.change-diploma-printing-status');

	Route::post('/transfer-course/{course_id}','AdminController@transfer')->name('transfer');
	Route::post('/transfer-course-back/{course_id}','AdminController@transferBack')->name('transfer-back');

	//Notifications
	Route::get('/notifications', 'AdminController@showNotifications')->name('admin.notifications');
});
