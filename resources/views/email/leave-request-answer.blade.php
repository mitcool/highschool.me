<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<?php
$style = [
    /* Layout ------------------------------ */

    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #F2F9FF;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F9FF;',
    'image-hundred' => 'width: 100%;',
    /* Masthead ----------------------- */

    'email-masthead' => 'padding: 25px 0; text-align: center;',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #fff; text-decoration: none; text-shadow: 0 1px 0 white;',

    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: white;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 0px;background-color: #FFF;border:0px solid lightgray;',

    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',

    /* Body ------------------------------ */

    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => '',

    /* Type ------------------------------ */

    'anchor' => 'color: #3869D4;padding:0px 35px 0px 35px;',
    'header-1' => 'margin-top: 0; color: black; font-size: 21px; font-weight: bold; text-align: left;padding:35px 35px 0px 35px; margin-bottom: 0px!important;',
    'paragraph' => 'margin-top: 0; color: grey; font-size: 16px; line-height: 1.5em; text-align:justify;padding:0px 35px 0px 35px;',
    'paragraph-sub' => 'margin-top: 0; color: white; font-size: 18px; line-height: 1.5em; text-align:center;',
    'paragraph-center' => 'text-align: center;',
    'paragraph-black' => 'margin-top: 20px; font-size: 16px; line-height: 1.5em; text-align:justify;padding:0px 35px 0px 35px;',
    'paragraph-gray' => 'margin-top: 20px; font-size: 14px; line-height: 1.5em; text-align:justify;padding:0px 35px 0px 35px;color:gray;margin-bottom:20px;',
    'paragraph-email-data' => 'padding-left: 35px;font-size: 13px;',
    'w-90' => 'width: 90%;',

    /* Buttons ------------------------------ */

    'button' => 'display: block; display: inline-block; width: 320px; min-height: 20px; padding: 10px;
                 background-color: #0863AC; border-radius: 30px; color: #ffffff; font-size: 15px; line-height: 25px;
                 text-align: center; text-decoration: none; -webkit-text-size-adjust: none; font-weight: 550;',

    'button--green' => 'background-color: #22BC66;',
    'button--red' => 'background-color: #dc4d2f;',
    'button--blue' => 'background-color: #3869D4;',
    'pin-span' => 'font-weight:bold;font-size:22px;',
    'bold' => 'font-weight:bold'
];
$fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;';
$fontFamily1 = "font-family:'Montserrat', sans-serif;";
?>

<body style="{{ $style['body'] }}">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="{{ $style['email-wrapper'] }}" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                   <!-- Logo -->
                    <tr>
                        <td style="{{ $style['email-masthead'] }}">
                            <a style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}" href="{{ url('/') }}" target="_blank">
                                <img style="height: 50px" src="{{ $message->embed(public_path() . '/images/onsites-graduate-school-logo.png') }}"  alt="Logo" />
                            </a>
                        </td>
                    </tr>
                    <!-- Email Body -->
                    <tr>
                        <td style="{{ $style['email-body'] }}" width="100%">
                            <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">       
                                <tr>
                                    <td align="center" style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
                                        <!-- Greeting -->
                                        <img src="{{ $message->embed(public_path() . '/images/message_email.jpg') }}" width="600" style="{{ $style['image-hundred'] }}" alt="Image" />
                                        <table align="center" width="550" cellpadding="10" cellspacing="10">
                                            <tr>
                                                <td>
                                                    <h1 style="{{ $style['header-1'] }}">
                                                        Dear {{ $parent->name }},
                                                    </h1>
                                                    @if($leave->status == 1)
                                                        <p style="{{ $style['paragraph-black'] }}">We are pleased to let you know that the absence request for {{$leave->student->name}} covering the period from {{$leave->start_date->format('d.m.Y')}} to {{$leave->end_date->format('d.m.Y')}} has been reviewed and approved. We hope this period brings the rest, recovery, or time away that {{$leave->student->name}} needs.</p>

                                                        <p style="{{ $style['paragraph-black'] }}">Any affected coursework, assessments, or deadlines will be adjusted to account for the approved absence. Full details of how this affects {{$leave->student->name}}'s academic calendar are available in the parent portal — please take a moment to review them so you are prepared for the return.</p>

                                                        <p style="{{ $style['paragraph-black'] }}">When {{$leave->student->name}} is ready to come back to studies, the student portal will reflect any updated schedules or catch-up requirements. Our team is available to support a smooth return if any questions arise at that point.</p>

                                                        <p style="{{ $style['paragraph-black'] }}">→ Go to Parent Portal: <a href="{{ route('login') }}">{{ route('login') }}</a></p>

                                                        <p style="{{ $style['paragraph-black'] }}">Thank you for keeping us informed and for following the correct process. It helps us take better care of {{$leave->student->name}}.</p>
                                                   
                                                    @else
                                                         <p style="{{ $style['paragraph-black'] }}">Thank you for submitting the absence request for  {{$leave->student->name}} covering the period from {{$leave->start_date->format('d.m.Y')}} to {{$leave->end_date->format('d.m.Y')}}. After careful review, we are unfortunately unable to approve the request at this time.</p>

                                                        <p style="{{ $style['paragraph-black'] }}">Reason: {{$leave->reason}}</p>

                                                        <p style="{{ $style['paragraph-black'] }}">We want to make sure you have a clear understanding of the reasoning behind this decision. Our absence policies are in place to protect {{$leave->student->name}}'s academic continuity and ensure they are able to meet the requirements of their program. Decisions in this area are always made with the student's progress and best interests in mind.</p>

                                                        <p style="{{ $style['paragraph-black'] }}">If you believe there are additional circumstances that were not fully considered, or if you would like to discuss this decision with our administration team, please reach out through the parent portal. We are open to the conversation and committed to finding the best path forward for {{$leave->student->name}} together.</p>

                                                        <p style="{{ $style['paragraph-black'] }}">→ Go to Parent Portal: <a href="{{ route('login') }}">{{ route('login') }}</a></p>

                                                        <p style="{{ $style['paragraph-black'] }}">Thank you for keeping us informed and for following the correct process. It helps us take better care of {{$leave->student->name}}.</p>

                                                    @endif
                                                    
                                                    <!-- Salutation -->
                                                    <p style="{{ $style['paragraph-black'] }}">
                                                        Kind regards,<br>Your HIGHSCHOOL.ME support team
                                                    </p>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td>
                            <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                                        <p style="{{ $style['paragraph-sub'] }}">
                                            &copy; 
                                            HIGHSCHOOL.ME
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>