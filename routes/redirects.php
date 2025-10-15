<?php

use App\Route as TranslatedRoute;

Route::get('/de',function(){
	return redirect()->route('welcome-de',[],301);
});

Route::get('/faq', function(){
	return redirect()->to('/de/faq',301);
});

Route::get('/studies/mba', function(){
	return redirect()->to('/de/mba',301);
});

Route::get('/academic/15', function(){
	return redirect()->to('/en/lecturers',301);
});

Route::get('/studies/mba/mba-healthcare-management', function(){
	return redirect()->to('/en/mba/health-care-management',301);
});

Route::get('/recognition', function(){
	return redirect()->to('/en/recognition-of-prior-learning',301);
});

Route::get('/single-faq-category/6', function(){
	return redirect()->to('/en/faq/coaching',301);
});

Route::get('/studies/mba/MBA-Leadership-&-Coaching', function(){
	return redirect()->to('/en/mba/coaching-leadership',301);
});

Route::get('/studies/certificates-advanced-studies/Digital-Product-Management', function(){
	return redirect()->to('/en/cas-online/digital-product-management-certificate',301);
});

Route::get('/partners', function(){
	return redirect()->to('/en/accreditation-partners',301);
});

Route::get('/studies/certificates-advanced-studies/Career-Development', function(){
	return redirect()->to('/en/cas-online',301);
});

Route::get('/publishing', function(){
	return redirect()->to('/en/book-publishing',301);
});

Route::get('/single-faq-category/4', function(){
	return redirect()->to('/en/faq/events',301);
});

Route::get('/studies/certificates-advanced-studies', function(){
	return redirect()->to('/en/cas-online',301);
});

Route::get('/lang/de', function(){
	return redirect()->to('/',301);
});

Route::get('/accreditation', function(){
	return redirect()->to('/en/accreditation-partners',301);
});

Route::get('/en/partners', function(){
	return redirect()->to('/en/accreditation-partners',301);
});
Route::get('/de/partners_de', function(){
	return redirect()->to('/de/akkreditierung-und-partner',301);
});

Route::get('/help-desk', function(){
	return redirect()->to('/en/student-assistance-team',301);
});

Route::get('/student-advisory-service', function(){
	return redirect()->to('/en/student-assistance-team',301);
});

Route::get('/academic/40', function(){
	return redirect()->to('/en/lecturers',301);
});

Route::get('/coaching', function(){
	return redirect()->to('/en/coaching-services',301);
});

Route::get('/academic/19', function(){
	return redirect()->to('/en/lecturers',301);
});

Route::get('/academic/26', function(){
	return redirect()->to('/en/lecturers',301);
});

Route::get('/academic/20', function(){
	return redirect()->to('/en/lecturers',301);
});

Route::get('/academic/21', function(){
	return redirect()->to('/en/lecturers',301);
});

Route::get('/academic/38', function(){
	return redirect()->to('/en/lecturers',301);
});

Route::get('/single-faq-category/9', function(){
	return redirect()->to('/en/faq/coaching',301);
});

Route::get('/en/contact', function(){
	return redirect()->to('/en/student-assistance-team',301);
});

Route::get('/de/contact', function(){
	return redirect()->to('/de/studienberatung',301);
});

Route::get('/accreditation', function(){
	return redirect()->to('/en/accreditation-partners',301);
});

Route::get('/de/kontakt', function(){
	return redirect()->to('/de/studienberatung',301);
});

Route::get('/en/cas-online', function(){
	return redirect('/en',301);
});
Route::get('/de/cas-online', function(){
	return redirect('/',301);
});
Route::get('/de/cas-online/copywriting-kurs', function(){
	return redirect('/',301);
});
Route::get('/de/cas-online/seo-kurs', function(){
	return redirect('/',301);
});
Route::get('/de/cas-online/bwl-kurs', function(){
	return redirect('/',301);
});
Route::get('/de/cas-online/produktmanagement-weiterbildung', function(){
	return redirect('/',301);
});
Route::get('/en/cas-online/copywriting-course', function(){
	return redirect('/en',301);
});
Route::get('/de/cas-online/weiterbildung-coaching', function(){
	return redirect('/',301);
});
Route::get('/de/cas-online/weiterbildung-marketing', function(){
	return redirect('/',301);
});
Route::get('/en/cas-online/seo-course-marketing', function(){
	return redirect('/en',301);
});
Route::get('/en/cas-online/business-administration-course', function(){
	return redirect('/en',301);
});
Route::get('/en/cas-online/cyber-security-course', function(){
	return redirect('/en',301);
});
Route::get('/de/cas-online/management-im-gesundheitswesen', function(){
	return redirect('/',301);
});
Route::get('/en/cas-online/digital-product-management-certificate', function(){
	return redirect('/en',301);
});
Route::get('/de/cas-online/weiterbildung-social-media-management', function(){
	return redirect('/',301);
});
Route::get('/en/cas-online/social-media-management-course', function(){
	return redirect('/en',301);
});
Route::get('/en/cas-online/health-care-management-course', function(){
	return redirect('/en',301);
});
Route::get('/de/master/public-health-studium', function(){
	return redirect('/de/master/gesundheitswissenschaften',301);
});
Route::get('/en/doctorate/doctor-in-public-health', function(){
	return redirect('/en/doctorate/doctor-of-health-sciences',301);
});
Route::get('/de/mba/produktmanagement-studium', function(){
	return redirect('/',301);
});
Route::get('/de/mba/digital-marketing-studium', function(){
	return redirect('/',301);
});
Route::get('/de/doktorat/doctor-of-public-health', function(){
	return redirect('/de/doktorat/doktor-der-gesundheitswissenschaften',301);
});
Route::get('/de/master/digitalisierung-studium', function(){
	return redirect('/',301);
});
Route::get('/de/mba/gesundheitsmanagement-studium', function(){
	return redirect('/',301);
});
Route::get('/en/master-degree/digitalization', function(){
	return redirect('/',301);
});
Route::get('/en/mba/coaching-leadership', function(){
	return redirect('/en/mba',301);
});
Route::get('/en/mba/digital-marketing-degree', function(){
	return redirect('/en/mba',301);
});
Route::get('/en/mba/health-care-management', function(){
	return redirect('/',301);
});
Route::get('/en/master-degree/mph', function(){
	return redirect('/',301);
});
