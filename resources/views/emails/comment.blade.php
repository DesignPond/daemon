<?php
$fontreset   = "font-family: Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em;";
$marginreset = "margin: 0; padding: 0;";
$paraeset = "font-size: 14px; font-weight: normal; margin: 0 0 10px; padding: 0;";

\Carbon\Carbon::setLocale('fr');
setlocale(LC_ALL, 'fr_FR.UTF-8');
?>

<!DOCTYPE html>
<html style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; {{ $marginreset }}">
<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Commentaire | Documentation DesignPond</title>
</head>
<body bgcolor="#f6f6f6" style="{{ $fontreset }} -webkit-font-smoothing: antialiased; height: 100%; -webkit-text-size-adjust: none; width: 100% !important; {{ $marginreset }}">

<!-- body -->
<table class="body-wrap" bgcolor="#f6f6f6" style="{{ $fontreset }} width: 100%; margin: 0; padding: 20px;">
    <tr style="{{ $fontreset }} {{ $marginreset }}">
        <td style="{{ $fontreset }} {{ $marginreset }}"></td>
        <td class="container" bgcolor="#FFFFFF" style="{{ $fontreset }} clear: both !important; display: block !important; max-width: 600px !important; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;">

            <!-- content -->
            <div class="content" style="{{ $fontreset }} display: block; max-width: 600px; margin: 0 auto; padding: 0;">
                <table style="{{ $fontreset }}  width: 100%; {{ $marginreset }}">
                    <tr style="{{ $fontreset }} {{ $marginreset }}">
                        <td style="{{ $fontreset }} {{ $marginreset }}" width="40">
                            <img style="max-width: 150px; width: 150px;" src="{{  asset('frontend/images/logo_inverse.svg') }}" alt="">
                        </td>
                        <td style="{{ $fontreset }} {{ $marginreset }}" width="10"></td>
                        <td style="{{ $fontreset }} {{ $marginreset }}" width="50">
                            <h1 style="{{ $fontreset }} font-size: 24px; line-height: 1.2em; color: #111111; font-weight: 500; margin: 20px 0 10px; padding: 0;">Commentaire</h1>
                            <small>{{ $comment->created_at->diffForHumans() }}</small>
                        </td>
                    </tr>
                    <tr style="{{ $fontreset }} {{ $marginreset }}">
                        <td colspan="3" style="{{ $fontreset }} {{ $marginreset }} height:20px;"></td>
                    </tr>
                    <tr style="{{ $fontreset }} {{ $marginreset }}">
                        <td colspan="3" style="{{ $fontreset }} {{ $marginreset }}">
                            <div style="{{ $fontreset }} {{ $paraeset }}">
                                <h3 style="{{ $fontreset }}">
                                    <a style="{{ $fontreset }} font-size: 20px; text-decoration: none; line-height: 1em; color: #337ab7; font-weight: 500;padding: 0;" href="{{ url('admin/comment/'.$comment->id) }}">{{ $comment->ticket->subject }}</a>
                                </h3>
                                {!! $comment->content !!}
                                <h4>{{ $comment->name }}</h4>
                                <p><a href="{{ url('admin/comment/'.$comment->id) }}">Voir le commentaire</a></p>
                            </div>
                        </td>
                    </tr>
                    <tr style="{{ $fontreset }} {{ $marginreset }}">
                        <td colspan="3" style="{{ $fontreset }} {{ $marginreset }} height:10px; border-bottom: 1px solid #e2e2e2;"></td>
                    </tr>
                    <tr style="{{ $fontreset }} {{ $marginreset }}">
                        <td colspan="3" style="{{ $fontreset }} {{ $marginreset }} height:10px;"></td>
                    </tr>
                    <tr style="{{ $fontreset }} {{ $marginreset }}">
                        <td colspan="3" style="{{ $fontreset }} {{ $marginreset }}">
                            <p style="{{ $fontreset }} {{ $paraeset }}"><a href="{{ url('/admin') }}">Documentation</a></p>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- /content -->

        </td>
        <td style="{{ $fontreset }} {{ $marginreset }}"></td>
    </tr>
</table>
<!-- /body -->
<!-- footer -->
<table class="footer-wrap" style="{{ $fontreset }} clear: both !important; width: 100%; {{ $marginreset }}"><tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; {{ $marginreset }}">
        <td style="{{ $fontreset }} {{ $marginreset }}"></td>
        <td class="container" style="{{ $fontreset }} clear: both !important; display: block !important; max-width: 600px !important; margin: 0 auto; padding: 0;">
            <!-- content -->
            <div class="content" style="{{ $fontreset }} display: block; max-width: 600px; margin: 0 auto; padding: 0;">
                <table style="{{ $fontreset }} width: 100%; {{ $marginreset }}"><tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; {{ $marginreset }}">
                        <td align="center" style="{{ $fontreset }} {{ $marginreset }}">
                            <p style="{{ $fontreset }} font-size: 12px; color: #666666; font-weight: normal; margin: 0 0 10px; padding: 0;">
                                &copy; DesignPond {{ date('Y') }}
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- /content -->
        </td>
        <td style="{{ $fontreset }} {{ $marginreset }}"></td>
    </tr>
</table>
<!-- /footer -->
</body>
</html>
