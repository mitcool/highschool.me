<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body style="margin:0;padding:0;background-color:#F2F9FF;font-family:Arial, Helvetica, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#F2F9FF;">
        <tr>
            <td align="center" style="padding:30px 15px;">
                <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;background:#ffffff;border-radius:10px;overflow:hidden;">
                    <tr>
                        <td align="center" style="padding:25px 20px 10px;">
                            <img style="height:50px" src="{{ $message->embed(public_path() . '/images/onsites-graduate-school-logo.png') }}" alt="Logo" />
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:10px 35px 35px;color:#222;">
                            <h2 style="margin:0 0 15px;font-size:24px;">Login verification</h2>
                            <p style="margin:0 0 15px;line-height:1.6;">Hello {{ $user->name }},</p>
                            <p style="margin:0 0 15px;line-height:1.6;">We noticed a login attempt.</p>
                            <p style="margin:0 0 15px;line-height:1.6;">Please use this PIN code to continue logging in:</p>
                            <div style="margin:25px 0;text-align:center;">
                                <span style="display:inline-block;padding:14px 28px;background:#045397;color:#ffffff;font-size:30px;letter-spacing:8px;border-radius:8px;font-weight:bold;">{{ $pinCode }}</span>
                            </div>
                            <p style="margin:0 0 15px;line-height:1.6;">This PIN expires in 10 minutes.</p>
                            <p style="margin:0;line-height:1.6;">If this was not you, please change your password immediately.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
