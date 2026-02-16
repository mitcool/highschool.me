<html>
    <head>
        <style>
            @page { margin: 0; }
            body {
                font-family: "Lato", Arial, Helvetica, sans-serif; 
                font-weight: 600px; 
            }
            #course-table tr{
                margin:0;
            }
            #course-table tr td{
                font-size: 0.9rem;
                padding:8px;
            }
        </style>
    </head>
    <body>
        <div style="padding:40px;">
            <div style="text-align:center">
            <img src="{{ asset('images/logo.svg') }}" alt="" style="width:25%;margin:0 auto;">
        </div>
        <hr style="height: 0x;border-top:3px solid #E9580C; margin-top:20px;">
        <table style="width:100%;margin-top:30px;">
            <tr>
                <td>
                    <span style="color:#E9580C;font-weight:bold;">Onsites High School LLC</span><br> 
                    100 Southeast 2nd Street, Suite 2000-1005 <br> 
                    Miami, FL 33131, United States of America <br> 
                    Phone: +1 (727) 739-0280 <br/>
                    Website: https://highschool.me/
                </td>
                <td style="text-align:right;">
                    <div style="text-align: left;margin-left:180px;">
                       <span style="color:#E9580C;font-weight:bold;">{{ $student->fullname() }}</span> <br> 
                        Date of Birth:{{ $student->date_of_birth() }} <br> 
                        Place of Birth: Vienna, Austria <br> Student ID: {{ $student->student_id() }} <br>
                        Enrolling date: {{ $student->created_at->format('d.m.Y') }}
                    </div>    
                </td>
            </tr>
        </table>
        
        <div style="text-align: center;">
            <p style="text-align:center;font-weight:bold;margin-top:30px;">OFFICIAL TRANSCRIPT</p>
        </div>
        
        <table style="width:100%;" id="course-table">
            <tr style="background: black;color:white;">
                <td style="width: 80%">Learning Experience</td>
                <td style="width: 10%;text-align:center;">Credits</td>
                <td style="width: 10%;text-align:center;">Final Grade</td>
            </tr>
            @foreach ($exams as $year => $year_exams )
                <tr style="background: #045397;color:white;">
                    <td colspan="3">{{ $year }}</td>
                </tr>
                @foreach ($year_exams as $exam )
                    <tr>
                        <td style="width: 80%;border:1px solid lightgrey;">{{ $exam->course->course->title }}</td>
                        <td style="width: 10%;border:1px solid lightgrey;text-align:center;">{{ $exam->course->course->default_credits }}</td>
                        <td style="width: 10%;border:1px solid lightgrey;text-align:center;">{{ $exam->grade }}</td>
                    </tr>
                @endforeach
            @endforeach
        </table>
        <table style="width:100%;margin-top:30px;position:fixed;top:90%;z-index:2;">
            <tr>
                <td style="text-align: left;width:50%;">
                    <div>
                        <div style="text-align:center">
                            <hr style="margin:0 auto;width:50%">
                            <p>Date</p>
                        </div>
                    </div>
                </td>
                <td style="text-align:right;width:50%;">
                    <div>
                        <div style="text-align:center">
                            <hr style="margin:0 auto;width:50%">
                            <p>Signature</p>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>