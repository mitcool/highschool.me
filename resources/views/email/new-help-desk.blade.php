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
                                                        Dear {{ $user->fullname() }},
                                                    </h1>
                                                    <p style="{{ $style['paragraph-black'] }}">
                                                        There are new messages on ticket {{ $slug }}.
                                                        <br/>
                                                    </p>
                                                    <p style="{{ $style['paragraph-black'] }}">
                                                         Please check your dashboard
                                                        <br/>
                                                    </p>
                                                    
                                                    <!-- Salutation -->
                                                    <p style="{{ $style['paragraph-black'] }}">
                                                        Kind regards,<br>Your HIGHSCHOOL.ME support team
                                                    </p>
                                                    <p style="{{ $style['paragraph'] }}">This email message is being sent to you automatically in connection with the processing of a project because you registered at the HIGHSCHOOL.ME portal as a client, university, or a company as well as accepted the relevant terms and conditions in the course of the registration process. Please do not reply to this email. Log in to your account to carry out the appropriate actions and to use the appropriate communication options available.</p>
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