<html>
    <head>
        <style>
            @page { margin: 0; }
            body {
                font-family: "Lato", Arial, Helvetica, sans-serif; 
                font-weight: 600px; 
            }
            .bold,.normal{
                font-size: 16px;
            }
            .bold{
                font-weight: bold;
            }
            .normal{
                font-weight: normal;
            }
        </style>
    </head>
    <body>
        <div style="padding:40px;">
            <div style="text-align:center">
                <h1 style="color:#045397;text-align:center">Exam Protocol</h1>
            </div>
         <h2>General Information</h2>
         <table style="width:100%;margin-top:30px;">
            <tr>
                <td>
                    <span class="normal">School Name</span><br> 
                    <span class="bold">ONSITES High School </span><br> <br>
                    <span class="normal">Student Full Name </span><br> 
                    <span class="bold">{{ $exam->student->fullname() }}</span> <br><br>
                    <span class="normal">Student ID </span> <br>
                    <span class="bold">{{ $exam->student->student_id() }} </span> <br><br>
                    <span class="normal">Exam Type</span> <br>
                    <span class="bold">{{ $exam->type == 1 ? 'Written Exam' : ' Essay Exam' }}</span>
                </td>
                <td style="text-align:right;">
                    <span class="normal">Course Name</span><br> 
                    <span class="bold">{{ $exam->course->course->title }} </span><br> <br>
                    <span class="normal">Exam Date </span><br> 
                    <span class="bold">{{ $exam->datetime->format('d.m.Y') }}</span> <br><br>
                    <span class="normal">Result</span> <br>
                    <span class="bold">{{ $exam->grade > 1 ? 'Passed' : 'Failed' }} </span> <br><br>
                    <span class="normal"></span> <br>
                    <span class="bold"></span> <br><br>
                </td>
            </tr>
        </table>
        <hr>
        <h2>Exam Period</h2>
         <table style="width:100%;margin-top:30px;">
            <tr>
                <td>
                    <span class="normal">Exam Start</span><br> 
                    <span class="bold">{{ $exam->datetime->format('H:i') }} UTC</span><br> <br>
                    <span class="normal">Exam End</span><br> 
                    <span class="bold">{{ $exam->submitted_at->format('H:i') }} UTC</span> <br><br>
                    
                </td>
                <td style="text-align:right;">
                    <span class="normal">Total Duration</span><br> 
                    <span class="bold">{{ $exam->course->course->title }} </span><br> <br>
                    <span class="normal">Time Limit Applied</span><br> 
                    <span class="bold">
                        @if($exam->type == 2) 
                            168 Hours
                        @elseif($exam->type == 1 && $exam->student->student_details->is_disabled == 1) 
                            360 Minutes
                        @else
                            120 Minutes
                        @endif
                    </span> <br><br>
                   
                </td>
            </tr>
        </table>
         <hr>
        <h2>Accommodation</h2>
         <table style="width:100%;margin-top:30px;">
            <tr>
                <td>
                    <span class="normal">Accommodation</span><br> 
                    <span class="bold">No</span><br> <br>
                    <span class="normal">Accommodation Date</span><br> 
                    <span class="bold">{{ $exam->submitted_at->format('H:i') }} UTC</span> <br><br>
                    
                </td>
                <td style="text-align:right;">
                    <span class="normal">Approved by (Admin Name / ID)</span><br> 
                    <span class="bold">{{ $exam->admin->fullname()}} </span><br> <br>
                    <span class="normal"></span><br> 
                    <span class="bold"></span><br> <br>
                </td>
            </tr>
        </table>
        <hr>
        <h2>Exam Content</h2>
         <table style="width:100%;margin-top:30px;">
            @foreach ($exam_answers as $key => $answer )
                <tr>
                <td>
                    <span class="normal">Question {{ $key + 1 }}</span><br> 
                    <span class="bold">{{ $answer->question->question }}</span><br> <br>
                   
                    
                </td>
                <td style="text-align:right;">
                    <span class="normal">Student Answer {{ $key+1 }}</span><br> 
                    <span class="bold">{{ $answer->answer}} </span><br> <br>
                   
                </td>
            </tr>
            @endforeach
        </table>
         <h2>Exam Integrity</h2>
         <table style="width:100%;margin-top:30px;">
           
                <tr>
                <td>
                    <span class="normal">Violation Log</span><br> 
                    <span class="bold">No</span><br> <br>
                   
                    
                </td>
                <td style="text-align:right;">
                    <span class="normal">Integrity</span><br> 
                    <span class="bold">No Violations Detected</span><br> <br>
                   
                </td>
            </tr>
           
        </table>
        <h2>Evaluation</h2>
         <table style="width:100%;margin-top:30px;">
           
                <tr>
                <td>
                    <span class="normal">Educator Name / ID</span><br> 
                    <span class="bold">{{ $exam->educator->fullname() }}</span><br> <br>
                       <span class="normal">Grading Date</span><br> 
                    <span class="bold">{{ $exam->passed_at->format('d.m.Y') }}</span><br> <br>
                    
                </td>
                <td style="text-align:right;">
                    <span class="normal">Final GPA (1.0 - 4.0)</span><br> 
                    <span class="bold">{{ number_format($exam->grade,1,'.') }}</span><br> <br>
                     <span class="normal">Pass Rule Applied</span><br> 
                    <span class="bold">GPA >= 1.0</span><br> <br>
                </td>
            </tr>
           
        </table>
    </body>
</html>