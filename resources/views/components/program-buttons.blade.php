<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4 text-center mt-2">
        <a href="{{ route('student-advisory-service-'.app()->currentLocale()) }}" class="outline-button bg-white" style="margin-top:30px;font-size:1rem;">
			{{request()->segment(1) == 'de' ? 'Jetzt persönlich beraten lassen': 'Get personal advice now' }}</a>
    </div>
    <div class="col-md-4 text-center mt-2">
        <a data-toggle="modal" data-target="#staticBackdrop" class="outline-button bg-white" style="margin-top:30px;font-size:1rem;color:black;cursor:pointer">
			{{request()->segment(1) == 'de' ? 'Mehr zum Studienprogramm erfahren' : 'Learn more about the program' }}</a>
    </div>
    <div class="col-md-2"></div>
</div>