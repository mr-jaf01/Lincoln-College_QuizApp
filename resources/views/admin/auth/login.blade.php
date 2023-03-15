<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Admin Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('linlogo.png')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  </head>

  <body style="font-family: Verdana, sans-serif">
    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">

              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="/admin/auth/login" class="app-brand-link gap-2">
                  <!--<span><img src="{{ asset('linlogo.png')}}"/></span>-->
                  <span class="app-brand-text demo text-body fw-bolder"></span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Administration Login🔒</h4>
              <p class="mb-4">Please Login to your account.</p>
              <div class="mb-3">
                <center>
                @if(Session::get('success'))
                    <span class="w-full rounded alert alert-danger">{{Session::get('success')}}</span>
                @endif

                @if(Session::get('fail'))
                    <span class="w-full rounded alert alert-danger">{{Session::get('fail')}}</span>
                @endif
                </center>
              </div>
              <form id="formAuthentication" class="mb-3" action="{{route('admin.auth.login')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label"></label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email or username"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password"></label>
                    <a href="auth-forgot-password-basic.html">
                      <small class="text-red-400">Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control focus:outline-none focus:border-red-500"
                      name="password"
                      placeholder="Enter your Password"
                      aria-describedby="password"
                    />
                  </div>

                  <div class="mt-3">
                    <div class="input-group">
                        <label class="input-group-text bg-red-500 text-white" for="inputGroupSelect01">Role</label>
                        <select name="role" class="form-select" id="inputGroupSelect01">
                          <option value="admin">Admin</option>
                          <option value="teacher">Teacher</option>
                          <option value="developer">Developer</option>
                        </select>
                      </div>
                  </div>
                </div>
                <div class="mb-3">

                </div>
                <div class="mb-3">
                    <button style="border-radius: 19px;" type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Sign in
                    </button>
                </div>
              </form>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
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
