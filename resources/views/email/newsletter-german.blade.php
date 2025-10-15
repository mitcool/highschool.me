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
    'email-wrapper' => 'width: 100%; margin: 0; padding: 20px 0; background-color: #F2F9FF;',
    'image-hundred' => 'width: 100%;',
    /* Masthead ----------------------- */

    'email-masthead' => 'padding: 25px 0; text-align: center;',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #fff; text-decoration: none; text-shadow: 0 1px 0 white;',

    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #F2F9FF; border-bottom: 1px solid #EDEFF2; background-color: white;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 0px;background-color: #FFF;border:0px solid lightgray;',

    'email-footer' => 'width: auto; max-width:700px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',

    /* Body ------------------------------ */

    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => '',

    /* Type ------------------------------ */

    'anchor' => 'color: #3869D4;padding:0px 35px 0px 35px;',
    'header-1' => 'margin-top: 0; color: black; font-size: 21px; font-weight: bold; text-align: left; margin-bottom: 0px!important;',
    'paragraph' => 'margin-top: 0; color: black; font-size: 16px; line-height: 1.5em; text-align:justify;',
    'paragraph-sub' => 'margin-top: 0; color: black; font-size: 18px; line-height: 1.5em; text-align:center;',
    'paragraph-small' => 'margin-top: 0; color: black; font-size: 11px; line-height: 1.5em; text-align:center;',
    'paragraph-center' => 'text-align: center;',
    'paragraph-black' => 'margin-top: 20px; font-size: 16px; line-height: 1.5em; text-align:justify;',
    'paragraph-gray' => 'margin-top: 20px; font-size: 14px; line-height: 1.5em; text-align:justify;padding:0;color:gray;margin-bottom:20px;',
    'paragraph-footer' => 'margin-top: 20px; font-size: 15px; line-height: 1.5em; text-align:center;padding:0;color:black;margin-bottom:20px;',
    'paragraph-email-data' => 'padding-left: 35px;font-size: 13px;',
    'w-90' => 'width: 90%;',
    'black' => 'color:black;',

    /* Buttons ------------------------------ */

    'button' => 'display: block; display: inline-block; width: 320px; min-height: 20px; padding: 10px;
                 background-color: #26BA99; border-radius: 30px; color: #ffffff; font-size: 15px; line-height: 25px;
                 text-align: center; text-decoration: none; -webkit-text-size-adjust: none; font-weight: 550;',

    'button--green' => 'background-color: #22BC66;',
    'button--red' => 'background-color: #dc4d2f;',
    'button--blue' => 'background-color: #3869D4;',
    'pin-span' => 'font-weight:bold;font-size:22px;',
    'bold' => 'font-weight:bold;',
    'advertisement-span' => 'display:block;float:right;font-size:12px;margin-bottom:4px;color:grey;',
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
                                <img style="height: 70px" src="{{ $message->embed(public_path() . '/images/onsites-graduate-school-logo.png') }}"  alt="Logo" />
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
                                        <img src="{{ $message->embed(public_path() .'/images/newsletter/'.$newsletter->cover_image) }}" width="570" style="{{ $style['image-hundred'] }}" alt="Image" />

                                        <table align="center" width="570" cellpadding="0" cellspacing="0">
                                            <tr>
                                                
                                                <td>
                                                    <br>
                                                    <h1 style="{{ $style['header-1'] }}">
                                                        Hallo {{ $newsletter->receiver->name }},
                                                    </h1>
                                                    @foreach($newsletter->sections as $section)
                                                    <p style="{{ $style['paragraph-black'] }}">
                                                        {!! $section->content_de !!}
                                                        <br/>
                                                    </p>
                                                    <div align="right" style="{{$style['advertisement-span']}}"><span>Advertisement</span></div>
                                                    <a target="_blank" href="{{ $section->link }}">
                                                        <img src="{{ asset('images/newsletter') }}/{{ $section->image }}" width="570">
                                                    </a>
                                                    @endforeach
                                                    <p style="{{ $style['paragraph-black'] }}">
                                                        {!! $newsletter->greeting_de !!}
                                                        <br/>
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
                            <table style="{{ $style['email-footer'] }}" align="center" width="700" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                                        <h3 style="{{ $style['bold']}} {{ $style['black'] }}">ONSITES Graduate School</h3>

                                        <p style="{{ $style['paragraph-footer'] }}">
                                            ST. PETERSBURG (Florida) – VARNA (Bulgarien) – WOLLERAU (Schweiz)
                                        </p>
                                        <p style="{{ $style['paragraph-footer'] }} {{ $style['bold'] }}">Join our academic family</p>
                                        <p style="{{ $style['paragraph-footer'] }}">
                                            <a href="https://www.facebook.com/graduateme23?locale=bg_BG" target="_blank"><img src="{{ asset('mails') }}/facebook.png" height="20">
                                            </a>
                                            <a href="https://www.instagram.com/graduate.me/#" target="_blank"><img src="{{ asset('mails') }}/instagram.png" height="20">
                                            </a>
                                            <a href="https://www.linkedin.com/company/101229203/admin/feed/posts/?feedType=following" target="_blank"><img src="{{ asset('mails') }}/linkedin.png" height="20">
                                            </a>
                                            <a href="https://www.youtube.com/@ONSITESGraduateSchool" target="_blank"><img src="{{ asset('mails') }}/youtube.png" height="20">
                                            </a>
                                        </p> 
                                         
                                        <p style="{{ $style['paragraph-footer'] }}">
                                            <a href="{{ route('all-programs-de') }}">Programme</a> &nbsp; <a href="https://graduate.me/en/blog">Blog</a> &nbsp; <a href="https://graduate.me/en/faq">FAQ</a>&nbsp; <a href="https://graduate.me/en/student-assistance-team">Studienberatung</a> &nbsp; <a href="https://graduate.me/en/imprint">Impressum</a>                                
                                        </p> 
                                        <p style="{{ $style['paragraph-small'] }}"> 
                                            ONSITES Graduate School LLC | 7901 4th St. N#20418 | St. Petersburg (Florida) 33702, USA
                                            <br> <br>
                                            Diese E-Mail wurde versendet an {{ $newsletter->receiver->email }} <br> 
                                            Bitte antworte nicht auf diese E-Mail <br>
                                            Du erhältst diese E-Mail, weil Du Dich für unseren Newsletter registriert hast. <br> <br>

                                            Wenn Du keine Informationen mehr per E-Mail über die neuesten Programme, exklusiven Angebote und Events der ONSITES Graduate School erhalten möchtest, kannst Du Dich jederzeit <a href="{{ config('app.url') }}/de/unsubscribe/{{ $newsletter->receiver->code }}">hier</a> abmelden
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