$(document).ready(function() {
	CKEDITOR.replace('education_en');
	CKEDITOR.replace('education_de');
	CKEDITOR.replace('education_bg');
	CKEDITOR.replace('research_en');
	CKEDITOR.replace('research_de');
	CKEDITOR.replace('research_bg');
	CKEDITOR.replace('publishing_en');
	CKEDITOR.replace('publishing_de');
	CKEDITOR.replace('publishing_bg');
	CKEDITOR.replace('conferences_en');
	CKEDITOR.replace('conferences_de');
	CKEDITOR.replace('conferences_bg');
	CKEDITOR.replace('workshop_en');
	CKEDITOR.replace('workshop_de');
	CKEDITOR.replace('workshop_bg');
	CKEDITOR.replace('coaching_en');
	CKEDITOR.replace('coaching_de');
	CKEDITOR.replace('coaching_bg');
	CKEDITOR.replace('networking_en');
	CKEDITOR.replace('networking_de');
	CKEDITOR.replace('networking_bg');
	$('#institute_education_form').submit(function(e) {
		let education_en_text = CKEDITOR.instances.education_en.getData();
		let education_de_text = CKEDITOR.instances.education_de.getData();
		let education_bg_text = CKEDITOR.instances.education_bg.getData();
		if(!education_en_text || !education_de_text || !education_bg_text) {
			alert('Education page texts are required.');
			e.preventDefault();
		}	
	});
	$('#institute_reasearch_form').submit(function(e) {
		let research_en_text = CKEDITOR.instances.research_en.getData();
		let research_de_text = CKEDITOR.instances.research_de.getData();
		let research_bg_text = CKEDITOR.instances.research_bg.getData();
		if(!research_en_text || !research_de_text || !research_bg_text) {
			alert('Research page texts are required.');
			e.preventDefault();
		}	
	});
	$('#institute_publishing_form').submit(function(e) {
		let publishing_en_text = CKEDITOR.instances.publishing_en.getData();
		let publishing_de_text = CKEDITOR.instances.publishing_de.getData();
		let publishing_bg_text = CKEDITOR.instances.publishing_bg.getData();
		if(!publishing_en_text || !publishing_de_text || !publishing_bg_text) {
			alert('Publishing page texts are required.');
			e.preventDefault();
		}	
	});
	$('#institute_conferences_form').submit(function(e) {
		let conferences_en_text = CKEDITOR.instances.conferences_en.getData();
		let conferences_de_text = CKEDITOR.instances.conferences_de.getData();
		let conferences_bg_text = CKEDITOR.instances.conferences_bg.getData();
		if(!conferences_en_text || !conferences_de_text || !conferences_bg_text) {
			alert('Conferences page texts are required.');
			e.preventDefault();
		}	
	});
	$('#institute_workshop_form').submit(function(e) {
		let workshop_en_text = CKEDITOR.instances.workshop_en.getData();
		let workshop_de_text = CKEDITOR.instances.workshop_de.getData();
		let workshop_bg_text = CKEDITOR.instances.workshop_bg.getData();
		if(!workshop_en_text || !workshop_de_text || !workshop_bg_text) {
			alert('Workshop page texts are required.');
			e.preventDefault();
		}	
	});
	$('#institute_coaching_form').submit(function(e) {
		let coaching_en_text = CKEDITOR.instances.coaching_en.getData();
		let coaching_de_text = CKEDITOR.instances.coaching_de.getData();
		let coaching_bg_text = CKEDITOR.instances.coaching_bg.getData();
		if(!coaching_en_text || !coaching_de_text || !coaching_bg_text) {
			alert('Coaching page texts are required.');
			e.preventDefault();
		}	
	});
	$('#institute_networking_form').submit(function(e) {
		let networking_en_text = CKEDITOR.instances.networking_en.getData();
		let networking_de_text = CKEDITOR.instances.networking_de.getData();
		let networking_bg_text = CKEDITOR.instances.networking_bg.getData();
		if(!networking_en_text || !networking_de_text || !networking_bg_text) {
			alert('Networking page texts are required.');
			e.preventDefault();
		}	
	});
});	