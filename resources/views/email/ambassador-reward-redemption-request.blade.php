<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<?php
$style = [
    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #F2F9FF;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F9FF;',
    'image-hundred' => 'width: 100%;',
    'email-masthead' => 'padding: 25px 0; text-align: center;',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #fff; text-decoration: none; text-shadow: 0 1px 0 white;',
    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: white;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 0px;background-color: #FFF;border:0px solid lightgray;',
    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',
    'anchor' => 'color: #3869D4;padding:0px 35px 0px 35px;',
    'header-1' => 'margin-top: 0; color: black; font-size: 21px; font-weight: bold; text-align: left;padding:35px 35px 0px 35px; margin-bottom: 0px!important;',
    'paragraph-black' => 'margin-top: 20px; font-size: 16px; line-height: 1.5em; text-align:justify;padding:0px 35px 0px 35px;',
    'paragraph-sub' => 'margin-top: 0; color: white; font-size: 18px; line-height: 1.5em; text-align:center;',
    'paragraph' => 'margin-top: 0; color: grey; font-size: 16px; line-height: 1.5em; text-align:justify;padding:0px 35px 0px 35px;',
];
$fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;';
$studentFirstName = $order->user->name;
$studentLastName = $order->user->surname;
$rewardItemsText = $rewardItems->pluck('name')->implode(', ');
?>

<body style="{{ $style['body'] }}">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="{{ $style['email-wrapper'] }}" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="{{ $style['email-masthead'] }}">
                            <a style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}" href="{{ url('/') }}" target="_blank">
                                <img style="height: 50px" src="{{ $message->embed(public_path() . '/images/onsites-graduate-school-logo.png') }}" alt="Logo" />
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="{{ $style['email-body'] }}" width="100%">
                            <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
                                        <img src="{{ $message->embed(public_path() . '/images/message_email.jpg') }}" width="600" style="{{ $style['image-hundred'] }}" alt="Image" />
                                        <table align="center" width="550" cellpadding="10" cellspacing="10">
                                            <tr>
                                                <td>
                                                    <h1 style="{{ $style['header-1'] }}">
                                                        {{ $adminName }},
                                                    </h1>

                                                    <p style="{{ $style['paragraph-black'] }}">
                                                        A reward redemption request has been submitted through the Ambassador Program and is waiting for your review. The details are below.
                                                    </p>

                                                    <p style="{{ $style['paragraph-black'] }}">
                                                        <b>Student:</b> {{ $studentFirstName }} {{ $studentLastName }}<br>
                                                        <b>Requested reward:</b> {{ $rewardItemsText }}<br>
                                                        <b>Points required:</b> {{ $pointsRequired }}<br>
                                                        <b>Student's current points balance:</b> {{ $pointsBalance }}
                                                    </p>

                                                    <p style="{{ $style['paragraph-black'] }}">
                                                        {{ $studentFirstName }} {{ $studentLastName }} has earned these points through their participation in school-related social media activities as part of the ONSITES High School Ambassador Program. Submitting a redemption request means they are ready to put those points to use - which is exactly what the program is designed to encourage.
                                                    </p>

                                                    <p style="{{ $style['paragraph-black'] }}">
                                                        Please log in to the admin panel to review the request, verify the points balance against the cost of the requested reward, and approve or process the redemption accordingly. If there is anything about the request that requires clarification or follow-up with the student before it can be fulfilled, please handle that through the admin panel.
                                                    </p>

                                                    <p style="{{ $style['paragraph-black'] }}">
                                                        Prompt and well-handled redemption requests reinforce the value of the Ambassador Program in the eyes of our students. When students see that their efforts translate into tangible recognition without unnecessary delay, it motivates continued engagement - which is good for the student and good for the school community.
                                                    </p>

                                                    <p style="{{ $style['paragraph-black'] }}">
                                                        &rarr; Review Redemption Request: <a href="{{ $adminPortalUrl }}">{{ $adminPortalUrl }}</a>
                                                    </p>

                                                    <p style="{{ $style['paragraph-black'] }}">
                                                        Thank you for keeping the Ambassador Program running smoothly.
                                                    </p>

                                                    <p style="{{ $style['paragraph-black'] }}">
                                                        Kind regards,<br>ONSITES High School
                                                    </p>
                                                    <p style="{{ $style['paragraph'] }}">This email message is being sent to you automatically in connection with the processing of a project because you registered at the GRADUATE.ME portal as a client, university, or a company as well as accepted the relevant terms and conditions in the course of the registration process. Please do not reply to this email. Log in to your account to carry out the appropriate actions and to use the appropriate communication options available.</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                                        <p style="{{ $style['paragraph-sub'] }}">
                                            &copy; HIGHSCHOOL.ME
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
