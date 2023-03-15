@if (!Session::get('adminID'))
   <script>window.location.href="{{route('admin.auth.login')}}"</script>
@endif
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('linlogo.png')}}">
    <title>Lincoln Quiz App - Admin @yield('tittle')</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('client/css/simplebar.css')}}">
    <!-- Fonts CSS
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    -->


    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('client/css/feather.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/uppy.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/quill.snow.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('client/css/daterangepicker.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('client/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{asset('client/css/app-dark.css')}}" id="darkTheme" disabled>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/htmx.org@1.7.0"></script>
    <script src="https://unpkg.com/hyperscript.org@0.9.5"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.tiny.cloud/1/3g0hv2wo1p6g1mtqmu9it6o4ya7rbbiv4z8nqqf6x8w1rmm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
    <body class="vertical  light" style="font-family: Verdana, sans-serif;">
        <div class="wrapper">
            <nav class="topnav navbar navbar-light" style="margin-bottom: -33px;">
                <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
                <i class="fe fe-menu navbar-toggler-icon"></i>
                </button>
                <!--<form class="form-inline mr-auto searchform text-muted">
                <input class="form-control mr-sm-2 bg-transparent border-3  pl-4 text-muted" type="search" placeholder="Search..." aria-label="Search">
                </form> -->
                <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                    <i class="fe fe-sun fe-16"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link  text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="avatar avatar-sm mt-2">
                        <img src="{{ asset('client/assets/avatars/default.jpg')}}" alt="..." class="avatar-img rounded-circle">
                    </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" style="border-radius: 19px;">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item text-red-400" href="{{route('admin.dashboard.logout')}}">Logout</a>
                    </div>
                </li>
                </ul>
            </nav>
          <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
            <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
              <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <nav class="vertnav navbar navbar-light">
              <!-- nav bar -->
              <div class="w-100 mb-4 d-flex">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{route('admin.dashboard')}}">
                  <img src="{{ asset('linlogo.png')}}"  />
                </a>
              </div>
              <p class="text-muted nav-heading mt-4 mb-1">
                <span>Dashboard</span>
              </p>
              <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item dropdown">
                  <a href="#question" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="bi bi-question-square"></i>
                    <span class="ml-3 item-text font-weight-bold">Questions Bank</span>
                  </a>
                  <ul class="collapse list-unstyled pl-4 w-100" id="question">
                      <a class="nav-link pl-3" href="{{route('admin.dashboard.question.questionmode')}}"><span class="ml-1">Create Question</span></a>
                      <a class="nav-link pl-3" href="{{route('admin.dashboard.question.viewQuestion')}}"><span class="ml-1">View Questions</span></a>
                      <a class="nav-link pl-3" href="{{route('admin.dashboard.answer.essay')}}"><span class="ml-1">Review Essay Answers</span></a>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a href="#subject" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="bi bi-book"></i>
                    <span class="ml-3 item-text font-weight-bold">Subject</span>
                  </a>
                  <ul class="collapse list-unstyled pl-4 w-100" id="subject">
                    <a class="nav-link pl-3" href="{{route('admin.dashboard.subject.createSubject')}}?hide"><span class="ml-1">Create Subject</span></a>
                    <a class="nav-link pl-3" href="{{route('admin.dashboard.subject.viewSubject')}}"><span class="ml-1">View Subject</span></a>
                  </ul>
                </li>

                <li class="nav-item dropdown">
                    <a href="#spm" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                      <i class="bi bi-person"></i>
                      <span class="ml-3 item-text font-weight-bold">SPM Programs</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="spm">
                      <a class="nav-link pl-3" href="{{route('admin.dashboard.spm.create')}}?new"><span class="ml-1">Create SPM Program</span></a>
                      <a class="nav-link pl-3" href="{{route('admin.dashboard.spm.view')}}"><span class="ml-1">View SPM Programs</span></a>
                    </ul>
                  </li>

                <li class="nav-item dropdown">
                    <a href="#user" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                      <i class="bi bi-person"></i>
                      <span class="ml-3 item-text font-weight-bold">Teacher</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="user">
                      <a class="nav-link pl-3" href="{{route('admin.dashboard.users.create')}}?new"><span class="ml-1">Create Teacher</span></a>
                      <a class="nav-link pl-3" href="{{route('admin.dashboard.users')}}"><span class="ml-1">View Teachers</span></a>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="#student" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="bi bi-people"></i>
                      <span class="ml-3 item-text font-weight-bold">Student</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="student">
                      <a class="nav-link pl-3" href="#"><span class="ml-1">Create Student</span></a>
                      <a class="nav-link pl-3" href="{{route('admin.dashboard.students')}}"><span class="ml-1">View Student</span></a>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="bi bi-person"></i>
                      <span class="ml-3 item-text font-weight-bold">Profile</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="profile">
                      <a class="nav-link pl-3" href="#"><span class="ml-1">Overview</span></a>
                      <a class="nav-link pl-3" href="#"><span class="ml-1">Settings</span></a>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="#ads" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="bi bi-person"></i>
                      <span class="ml-3 item-text font-weight-bold">Ads</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="ads">
                      <a class="nav-link pl-3" href="#"><span class="ml-1">Post Ads</span></a>
                      <a class="nav-link pl-3" href="#"><span class="ml-1">Manage Ads</span></a>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                        <a href="#support" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="bi bi-info-square"></i>
                        <span class="ml-3 item-text font-weight-bold">Support Center</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="support">
                        <a href="/admin/dashboard/chat-support-center" class="nav-link pl-3" href="#"><span class="ml-1">Chat</span></a>
                        <a class="nav-link pl-3" target="_blank" href="https://webmail.1690.tk/roundcube/?_task=mail&_mbox=INBOX"><span class="ml-1">Mail Inbox</span></a>
                        </ul>
                  </li>


              </ul>
            </nav>
          </aside>
          <main role="main" class="main-content">
           @yield('content')
          </main> <!-- main -->
        </div> <!-- .wrapper -->
        <script src="{{asset('client/js/popper.min.js')}}"></script>
        <script src="{{asset('client/js/moment.min.js')}}"></script>
        <script src="{{asset('client/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('client/js/simplebar.min.js')}}"></script>
        <script src="{{asset('client/js/daterangepicker.js')}}"></script>
        <script src='{{asset('client/js/jquery.stickOnScroll.js')}}'></script>
        <script src="{{asset('client/js/tinycolor-min.js')}}"></script>
        <script src="{{asset('client/js/config.js')}}"></script>
        <script src="{{asset('client/js/d3.min.js')}}"></script>
        <script src="{{asset('client/js/topojson.min.js')}}"></script>
        <script src="{{asset('client/js/datamaps.all.min.js')}}"></script>
        <script src="{{asset('client/js/datamaps-zoomto.js')}}"></script>
        <script src="{{asset('client/js/datamaps.custom.js')}}"></script>
        <script src="{{asset('client/js/Chart.min.js')}}"></script>
        <script>
          /* defind global options */
          Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
          Chart.defaults.global.defaultFontColor = colors.mutedColor;
        </script>
        <script src="{{asset('client/js/gauge.min.js')}}"></script>
        <script src="{{asset('client/js/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('client/js/apexcharts.min.js')}}"></script>
        <script src="{{asset('client/js/apexcharts.custom.js')}}"></script>
        <script src="{{asset('client/js/jquery.mask.min.js')}}"></script>
        <script src="{{asset('client/js/select2.min.js')}}"></script>
        <script src='{{asset("client/js/jquery.steps.min.js")}}'></script>
        <script src='{{asset("client/js/jquery.validate.min.js")}}'></script>
        <script src='{{asset("client/js/jquery.timepicker.js")}}'></script>
        <script src='{{asset("client/js/dropzone.min.js")}}'></script>
        <script src='{{asset("client/js/uppy.min.js")}}'></script>
        <script src='{{asset("client/js/quill.min.js")}}'></script>
        <script>
          $('.select2').select2(
          {
            theme: 'bootstrap4',
          });
          $('.select2-multi').select2(
          {
            multiple: true,
            theme: 'bootstrap4',
          });
          $('.drgpicker').daterangepicker(
          {
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale:
            {
              format: 'MM/DD/YYYY'
            }
          });
          $('.time-input').timepicker(
          {
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
          });
          /** date range picker */
          if ($('.datetimes').length)
          {
            $('.datetimes').daterangepicker(
            {
              timePicker: true,
              startDate: moment().startOf('hour'),
              endDate: moment().startOf('hour').add(32, 'hour'),
              locale:
              {
                format: 'M/DD hh:mm A'
              }
            });
          }
          var start = moment().subtract(29, 'days');
          var end = moment();

          function cb(start, end)
          {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          }
          $('#reportrange').daterangepicker(
          {
            startDate: start,
            endDate: end,
            ranges:
            {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
          }, cb);
          cb(start, end);
          $('.input-placeholder').mask("00/00/0000",
          {
            placeholder: "__/__/____"
          });
          $('.input-zip').mask('00000-000',
          {
            placeholder: "____-___"
          });
          $('.input-money').mask("#.##0,00",
          {
            reverse: true
          });
          $('.input-phoneus').mask('(000) 000-0000');
          $('.input-mixed').mask('AAA 000-S0S');
          $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
          {
            translation:
            {
              'Z':
              {
                pattern: /[0-9]/,
                optional: true
              }
            },
            placeholder: "___.___.___.___"
          });
          // editor
          var editor = document.getElementById('editor');
          if (editor)
          {
            var toolbarOptions = [
              [
              {
                'font': []
              }],
              [
              {
                'header': [1, 2, 3, 4, 5, 6, false]
              }],
              ['bold', 'italic', 'underline', 'strike'],
              ['blockquote', 'code-block'],
              [
              {
                'header': 1
              },
              {
                'header': 2
              }],
              [
              {
                'list': 'ordered'
              },
              {
                'list': 'bullet'
              }],
              [
              {
                'script': 'sub'
              },
              {
                'script': 'super'
              }],
              [
              {
                'indent': '-1'
              },
              {
                'indent': '+1'
              }], // outdent/indent
              [
              {
                'direction': 'rtl'
              }], // text direction
              [
              {
                'color': []
              },
              {
                'background': []
              }], // dropdown with defaults from theme
              [
              {
                'align': []
              }],
              ['clean'] // remove formatting button
            ];
            var quill = new Quill(editor,
            {
              modules:
              {
                toolbar: toolbarOptions
              },
              theme: 'snow'
            });
          }
          // Example starter JavaScript for disabling form submissions if there are invalid fields
          (function()
          {
            'use strict';
            window.addEventListener('load', function()
            {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName('needs-validation');
              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(forms, function(form)
              {
                form.addEventListener('submit', function(event)
                {
                  if (form.checkValidity() === false)
                  {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                  form.classList.add('was-validated');
                }, false);
              });
            }, false);
          })();
        </script>
        <script>
          var uptarg = document.getElementById('drag-drop-area');
          if (uptarg)
          {
            var uppy = Uppy.Core().use(Uppy.Dashboard,
            {
              inline: true,
              target: uptarg,
              proudlyDisplayPoweredByUppy: false,
              theme: 'dark',
              width: 770,
              height: 210,
              plugins: ['Webcam']
            }).use(Uppy.Tus,
            {
              endpoint: 'https://master.tus.io/files/'
            });
            uppy.on('complete', (result) =>
            {
              console.log('Upload complete! We’ve uploaded these files:', result.successful)
            });
          }
        </script>
        <script src="js/apps.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];

          function gtag()
          {
            dataLayer.push(arguments);
          }
          gtag('js', new Date());
          gtag('config', 'UA-56159088-1');
        </script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>



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
