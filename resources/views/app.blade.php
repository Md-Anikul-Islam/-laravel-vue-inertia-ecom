<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/js/app.js')
      {{-- Admin Template Styles Start--}}
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="{{asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
      <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('backend/plugins/jqvmap/jqvmap.min.css')}}">
      <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
      <link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
      <link rel="stylesheet" href="{{asset('backend/plugins/daterangepicker/daterangepicker.css')}}">
      <link rel="stylesheet" href="{{asset('backend/plugins/summernote/summernote-bs4.min.css')}}">
      {{-- Admin Template Styles End--}}

      {{-- Frontend Template Styles Start--}}
      <link href="{{asset('frontend/img/favicon.ico')}}" rel="icon">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="{{asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
      {{-- Frontend Template Styles End--}}
    @inertiaHead
  </head>
  <body>
    @inertia
    {{-- Admin Template Scripts --}}
    <script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('backend/plugins/sparklines/sparkline.js')}}"></script>
    <script src="{{asset('backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{asset('backend/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('backend/dist/js/adminlte.js')}}"></script>
    <script src="{{asset('backend/dist/js/pages/dashboard.js')}}"></script>
    {{-- End Admin Template Scripts --}}

    {{-- Frontend Template Scripts --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('frontend/mail/contact.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    {{-- End Frontend Template Scripts --}}

  </body>
</html>
