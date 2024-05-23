<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="msapplication-TileColor" content="#0E0E0E">
  <meta name="template-color" content="#0E0E0E">
  <link rel="manifest" href="manifest.json" crossorigin>
  <meta name="msapplication-config" content="browserconfig.xml">
  <meta name="description" content="Index page">
  <meta name="keywords" content="index, page">
  <meta name="author" content="">

  <link rel="shortcut icon" type="image/x-icon" href="">

  @notifyCss
  <link href="{{ asset('Frontend/assets/css/all.min.css')}}" rel="stylesheet">
  <link href="{{ asset('Frontend/assets/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/css/bootstrap-datepicker3.min.css">
  <title>joblist - Job Portal HTML Template </title>

</head>

<body>

  {{-- <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="text-center"><img src="{{ asset('Frontend/assets/imgs/template/loading.gif') }}" alt="joblist"></div>
      </div>
    </div>
  </div> --}}

  @include('front-end.layouts.header')

  <main class="main">

 @yield('contents')

  </main>

  <section class="section-box subscription_box">
    <div class="container">
      <div class="box-newsletter">
        <div class="newsletter_textarea">
          <div class="row">
            <div class="col-lg-6">
              <h2 class="text-md-newsletter">Subscribe our newsletter</h2>
            </div>
            <div class="col-lg-6">
              <div class="box-form-newsletter">
                <form class="form-newsletter">
                  <input class="input-newsletter" type="text" value="" placeholder="Enter your email here">
                  <button class="btn btn-default font-heading">Subscribe</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('front-end.layouts.footer')

  <script src="{{asset('Frontend/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
  <script src="{{asset('Frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('Frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
  <script src="{{asset('Frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('Frontend/assets/js/plugins/waypoints.js')}}"></script>
  <script src="{{asset('Frontend/assets/js/plugins/wow.js')}}"></script>
  <script src="{{asset('Frontend/assets/js/plugins/magnific-popup.js')}}"></script>
  <script src="{{asset('Frontend/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('Frontend/assets/js/plugins/select2.min.js')}}"></script>
  <script src="{{asset('Frontend/assets/js/plugins/isotope.js')}}"></script>
  <script src="{{asset('Frontend/assets/js/plugins/scrollup.js')}}"></script>
  <script src="{{asset('Frontend/assets/js/plugins/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('Frontend/assets/js/plugins/Font-Awesome.js')}}"></script>
  <script src="{{asset('Frontend/assets/js/plugins/counterup.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/js/bootstrap-datepicker.min.js"></script>

  <x-notify::notify />

  @notifyJs

  <script src="{{asset('Frontend/assets/js/main.js?v=4.1')}}"></script>

  @stack('scripts')

  <script>
    $('.datepicker').datepicker(
        {
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        }
    );
  </script>
</body>

</html>
