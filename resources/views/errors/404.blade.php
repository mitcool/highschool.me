<!DOCTYPE html>
<html>
<head>
	<title>Sorry, the page you are looking for could not be found</title>
	<meta name="description" content="Sorry, the page you are looking for could not be found.">
</head>
<body>
	<div style="text-align: center">
		<video id="front_video" autoplay muted loop playsinline style="width: 100%;height: 500px;">
	    	<source src="{{asset('videos/404.mp4')}}" type="video/mp4">
	    	Your browser does not support HTML5 video.
		</video>
		<div class="title">   
		    <h1 style="text-align: center;margin-bottom: 20px;font-family:'Roboto','Helvetica';">Sorry, the page you are looking for could not be found.</h1>
		    <a href="{{route('welcome')}}" style="cursor: pointer;">
		        <button style="font-size: 20px;padding:10px 20px;border:none;outline: none;cursor: pointer; ">
		            Back to {{ Request::getHost() }}
		        </button>
		    </a>
		</div>
	</div>
</body>
</html>
