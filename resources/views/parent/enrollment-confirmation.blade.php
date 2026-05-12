<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enrollment Confirmation</title>
    <style>
        html,body,*{
             font-family: "Montserrat", sans-serif; 
        }
    </style>
</head>
<body>
    <div style="text-align:center;width:40%;margin:0 auto;"><img style="width: 50%" src="{{ asset('images/logo.svg') }}" alt=""></div>

    <hr style="border-top:3px solid blue;">

        <table style="width:100%;">
            <tr>
                <td style="color:#E9580C;">Onsites High School LLC 100 </td>
                <td style="color:#E9580C;text-align:right">{{ $student->fullname() }}</td>
            </tr>
            <tr>
                <td>Southeast 2nd Street, Suite 2000-1005</td>
                <td  style="text-align:right">Date of Birth: {{ $student->date_of_birth() }}</td>
            </tr>
            <tr>
                <td>Miami, FL 33131, United States of America </td>
                <td  style="text-align:right">Place of Birth:</td>
            </tr>
            <tr>
                <td>Phone: +1 (727) 739-0280</td>
                <td  style="text-align:right">Student ID: {{ $student->student_id() }}</td>
            </tr>
            <tr>
                <td>Website: https://highschool.me/</td>
                <td  style="text-align:right">Enrolling Date: {{ $student->created_at->format('d.m.Y') }}</td>
            </tr>
        </table>
     
        <div style="margin-top:30px;text-align:center;">
            <h1 style="margin-top:20px;font-size:2.2rem;">LETTER OF ENROLLMENT</h1>
            <h4>THIS LETTER IS TO CONFIRM THAT</h4>
            <h1 style="font-size:2rem;color:#E9580C;">{{ $student->fullname() }}</h1>
            <h4>has enrolled as a full-time student in ONSITES HIGH SCHOOL.</h4>
            <div style="text-align:center;margin-top:50px;">
                <p>Sincerely,</p>
                <img src="{{ public_path('images/signature.jpg') }}" alt="" style="width:30%;">
                <hr style="margin:0 auto;width:33%">
                <p>High School Principal</p>
            </div>
          
        </div>
</body>
</html>