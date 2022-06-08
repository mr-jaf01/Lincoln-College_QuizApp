<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('linlogo.png')}}" />
    <title>Quiz App - @yield('tittle')</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/htmx.org@1.7.0"></script>
    <script src="https://unpkg.com/hyperscript.org@0.9.5"></script>

</head>
<body style="font-family: Verdana, sans-serif;">
    @yield('content')



<script src='https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>
<script>
   function googleTranslateElementInit() {
    new google.translate.TranslateElement({
    pageLanguage: 'en',
    autoDisplay: 'true',
    includedLanguages:'hi,en,bn,id,fr,ms,ml,ar,ta,es,sw,tr,zh-CN,zh-TW',
    layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
    }, 'google_translate_element');
 }
</script>
<style type="text/css">
    /*google translate Dropdown */
    #google_translate_element select{
    background:#f6edfd;
    color:#ff0606;
    border: none;
    border-radius:3px;
    padding:6px 8px
    }

    /*google translate link | logo */
      .goog-logo-link{
      display:none!important;
      }
    .goog-te-gadget{
    color:transparent!important;
    }

    /* google translate banner-frame */

    .goog-te-banner-frame{
    display:none !important;
    }

    #goog-gt-tt, .goog-te-balloon-frame{display: none !important;}
   .goog-text-highlight { background: none !important; box-shadow: none !important;}

    body{top:0!important;}
    </style>
</body>
</html>
