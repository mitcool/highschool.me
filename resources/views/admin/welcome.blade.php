@extends('admin_template')
<style>
	.card{
        background: red;
		border-radius:5px;
		border-color: #025297;
	}

</style>
@section('content')


<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
  <div class="row my-3"  style="padding:30px;">
    <div class="col-md-12">
        <h2 class="text-center pt-5">Welcome {{ auth()->user()->fullname() }}</h2>
        <hr>
        <div>
         <p> <span class="font-weight-bold">Course types</span> – Adding new course type (such as CLEP, AP, etc.). You have the list with all the types of courses – you can change the prices, names and descriptions here. It is not recommended to delete them!</p>
          <p><span class="font-weight-bold">Enrollment Courses</span> – List of all the courses what we offer with option for editing and adding new ones.</p>
          <p><span class="font-weight-bold">Plans</span> – The names and the prices of the plans per month and per year can be changed from here.</p>
          <p><span class="font-weight-bold">Features</span> – Corresponds to the High School Plans page – for example you can add “Rolling Enrollment” feature from here with the respective tooltip.</p>
          <p><span class="font-weight-bold">Features order</span> – You can reorder the features from here.</p>
          <p><span class="font-weight-bold">Group Session for Students</span> – List with the Group Session links. There is option for adding.</p>
          <p><span class="font-weight-bold">Mentoring Session for Students</span> – List with the one-on-one sessions.</p>
          <p><span class="font-weight-bold">Coaching Session for Students – List with the coaching sessions.</p>
          <p><span class="font-weight-bold">Family Consultations</span> – List with the family consultations.</p>
          <p><span class="font-weight-bold">Ambassador Links</span> – The place from where the admin approves the social media activities.</p>
          <p><span class="font-weight-bold">Ambassador Activities</span> – The place to add new activities for which the students receive points.</p>
          <p><span class="font-weight-bold">Ambassador Rewards</span> – The place from where the admin can add what kind of rewards the students can earn.</p>
          <p><span class="font-weight-bold">News Explorer, Facts Hub and Press Release</span> – List with articles with option for adding and editing the existing ones.</p>
          <p><span class="font-weight-bold">Help Desk</span> – Split into Parent and Student for answering to their questions.</p>
          <p><span class="font-weight-bold">FAQ Categories, FAQ </span>– Correcting and adding new questions.</p>
          <p><span class="font-weight-bold">Texts</span> – Modifying the content on the regular pages.</p>
          <p><span class="font-weight-bold">Create Newsletter, Newsletter Stats</span> – Place to generate newsletter with rich content. In the Stats can be checked who subscribed and unsubscribed.</p>
          <p><span class="font-weight-bold">Student Management System -> Overview</span> – List with all the students in the school.</p>
          <p><span class="font-weight-bold">Student Management System -> Documents</span> – This is the place to check applications for new students in the school.</p>
          <p><span class="font-weight-bold">Educators</span> – List with teachers and a place to add new.</p>
          <p><span class="font-weight-bold">Exams</span> – Adding new exam for specific student.</p>
          <p><span class="font-weight-bold">Exam Questions</span> – Place to add questions for specific subject’s exam.</p>
          <p><span class="font-weight-bold">Self-assessment Questions</span> – Place to add self-assessment questions.</p>
          <p><span class="font-weight-bold">Submissions</span> – Here appear list with all the submitted exams by students so the admin can check them from here.</p>
          <p><span class="font-weight-bold">Invoices</span> – List with invoices.</p>
          <p><span class="font-weight-bold">Academics</span> – List with Educators on front page with option for adding a new one.</p>
          <p><span class="font-weight-bold">Students in spotlight</span> – List with students for the front page.</p>
          <p><span class="font-weight-bold">Absence Requests</span> – List with all the requests from parents for students’ absence. The admin can approve or reject them from here.</p>

        </div>
    </div>	
</div>
          
<div id="pdf-viewer"></div>

<!-- Include PDF.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.10.101/pdf.min.js"></script>
<script>
  // Tell PDF.js where the worker file is located
  pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.10.101/pdf.worker.min.js';

  // URL of your PDF
  const url = 'https://example.com/your.pdf'; // Replace with your PDF URL

  // Load PDF
  const loadingTask = pdfjsLib.getDocument(url);
  loadingTask.promise.then(pdf => {
    // Render first page as example
    pdf.getPage(1).then(page => {
      const scale = 1.5;
      const viewport = page.getViewport({ scale: scale });

      const canvas = document.createElement('canvas');
      document.getElementById('pdf-viewer').appendChild(canvas);
      const context = canvas.getContext('2d');
      canvas.height = viewport.height;
      canvas.width = viewport.width;

      page.render({ canvasContext: context, viewport: viewport });
    });
  }).catch(err => console.error(err));

</script>

@endsection

