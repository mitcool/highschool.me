$(document).ready(function() {
	CKEDITOR.replace('business_en');
	CKEDITOR.replace('business_de');
	CKEDITOR.replace('business_bg');
	CKEDITOR.replace('medicine_en');
	CKEDITOR.replace('medicine_de');
	CKEDITOR.replace('medicine_bg');
	CKEDITOR.replace('humanities_en');
	CKEDITOR.replace('humanities_de');
	CKEDITOR.replace('humanities_bg');
	CKEDITOR.replace('engineering_en');
	CKEDITOR.replace('engineering_de');
	CKEDITOR.replace('engineering_bg');
	CKEDITOR.replace('media_en');
	CKEDITOR.replace('media_de');
	CKEDITOR.replace('media_bg');
	$('#departments_business_form').submit(function(e) {
		let business_en_text = CKEDITOR.instances.business_en.getData();
		let business_de_text = CKEDITOR.instances.business_de.getData();
		let business_bg_text = CKEDITOR.instances.business_bg.getData();
		if(!business_en_text || !business_de_text || !business_bg_text) {
			alert('Business, Management & Law page texts are required.');
			e.preventDefault();
		}	
	});
	$('#departments_medicine_form').submit(function(e) {
		let medicine_en_text = CKEDITOR.instances.medicine_en.getData();
		let medicine_de_text = CKEDITOR.instances.medicine_de.getData();
		let medicine_bg_text = CKEDITOR.instances.medicine_bg.getData();
		if(!medicine_en_text || !medicine_de_text || !medicine_bg_text) {
			alert('Medicine, Health & Social Science page texts are required.');
			e.preventDefault();
		}	
	});
	$('#departments_humanities_form').submit(function(e) {
		let humanities_en_text = CKEDITOR.instances.humanities_en.getData();
		let humanities_de_text = CKEDITOR.instances.humanities_de.getData();
		let humanities_bg_text = CKEDITOR.instances.humanities_bg.getData();
		if(!humanities_en_text || !humanities_de_text || !humanities_bg_text) {
			alert('Humanities page texts are required.');
			e.preventDefault();
		}	
	});
	$('#departments_engineering_form').submit(function(e) {
		let engineering_en_text = CKEDITOR.instances.engineering_en.getData();
		let engineering_de_text = CKEDITOR.instances.engineering_de.getData();
		let engineering_bg_text = CKEDITOR.instances.engineering_bg.getData();
		if(!engineering_en_text || !engineering_de_text || !engineering_bg_text) {
			alert('Engineering & IT page texts are required.');
			e.preventDefault();
		}	
	});
	$('#departments_media_form').submit(function(e) {
		let media_en_text = CKEDITOR.instances.media_en.getData();
		let media_de_text = CKEDITOR.instances.media_de.getData();
		let media_bg_text = CKEDITOR.instances.media_bg.getData();
		if(!media_en_text || !media_de_text || !media_bg_text) {
			alert('Media, Communications & Culture.');
			e.preventDefault();
		}	
	});
});	