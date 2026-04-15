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
                 background-color: #26BA99; border-radius: 30px; color: #ffffff; font-size: 15px; line-height: 25px;
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
                                                        Dear admin,
                                                    </h1>

                                                    <p style="{{ $style['paragraph-black'] }}">A payment has been successfully received and recorded in the system. The details are below for your reference.

                                                    <p style="{{ $style['paragraph-black'] }}">Student: {{ $student->fullname() }}</p>

                                                    <p style="{{ $style['paragraph-black'] }}">Amount: ${{number_format($amount,2,'.',',')}}</p>
                                                    <p style="{{ $style['paragraph-black'] }}">Date: {{$plan->created_at->format('d.m.Y')}}</p>
                                                    <p style="{{ $style['paragraph-black'] }}">Payment method: Credit Card</p>
                                                    <p style="{{ $style['paragraph-black'] }}">Enrollment package: {{$plan->plan->name}}</p>

                                                    <p style="{{ $style['paragraph-black'] }}">No further action is required on your part at this time. A full receipt is available to view and download from the parent portal whenever you need it.</p>

                                                    <p style="{{ $style['paragraph-black'] }}">With your payment confirmed, our team will proceed with the next steps in activating {{$student->name}}'s access and course setup. You will receive a notification as soon as there is progress to report.</p>

                                                    <p style="{{ $style['paragraph-black'] }}">Please review the payment details and confirm that everything aligns with the student's enrollment records. If any follow-up is needed — such as activating a package, updating an enrollment status, or flagging a discrepancy — please proceed through the admin panel at your earliest convenience.</p>

                                                    <p style="{{ $style['paragraph-black'] }}">→ View Payment Details: <a href="{{route('login')}}">{{route('login')}}</a></p>
                                                    <p style="{{ $style['paragraph-black'] }}">Accurate and timely financial record-keeping is essential to the smooth running of our programs. Thank you for staying on top of it.</p>

                                                    <p style="{{ $style['paragraph-black'] }}">Kind regards, ONSITES High School</p>

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