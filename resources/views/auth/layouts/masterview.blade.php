<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('linlogo.png')}}" />
    <title>SPM SPS - @yield('tittle')</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body style="font-family: Verdana, sans-serif;">
    @yield('content')




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
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
