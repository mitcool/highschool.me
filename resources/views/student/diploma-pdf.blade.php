<html>
    <head>
        <style>
            @page { margin: 0; }
            body {
                font-family: "Lato", Arial, Helvetica, sans-serif; 
                font-weight: 600px; 
            }
        </style>
    </head>
    <body>
        <div style="padding:40px;">
            <div style="text-align:center">
            <img src="{{ public_path('images/logo.svg') }}" alt="" style="width:35%;margin:0 auto;">
        </div>
        <hr style="height: 0x;border-top:3px solid #E9580C; margin-top:20px;">
        <div style="text-align: center;">
            <h1 style="text-align:center;color:#FFD631;font-size:40px;margin-bottom:0;">HIGH SCHOOL {{ $credits['average_grade'] >= 3.5 ? 'HONORS' : '' }} DIPLOMA</h1>
            <p style="color:#14213D">THIS CERTIFICATE IS PROUDLY PRESENTED TO</p>
             <h1 style="font-size:40px;margin-top:50px;color:#E9580C;">{{ $student->fullname() }}</h1>
             <p style="color:#14213D">for successfully completing the requirements prescribed for graduation</p>
             <p style="color:#14213D">Given on {{ $credits['graduation_date'] }} </p>
        </div>
        
        <div style="margin-top:50px;">
            
            <div style="text-align:center">
                <img src="{{ public_path('images/signature.jpg') }}" alt="" style="width:30%;">
                <hr style="margin:0 auto;width:33%">
                <p>High School Principal</p>
            </div>
          
        </div>
        </div>
        
          <div style="height:40px;background-color:#E9580C;position:fixed;width:100%;bottom:0;"></div>
    </body>
</html>