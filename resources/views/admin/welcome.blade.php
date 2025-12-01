@extends('admin_template')
<style>
	.card{
        background: red;
		border-radius:5px;
		border-color: #025297;
	}

</style>
@section('content')


<div class="container"><div class="row my-3"  style="padding:30px;">
    <div class="col-md-12">
        <h1 class="text-center pt-5">Welcome {{ auth()->user()->name }}</h1>
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

