<!DOCTYPE html>

<head>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title') Page!</title>
    <meta name="msapplication-TileColor" content="#9f00a7">
    <meta name="msapplication-TileImage" content="{{ asset('img/favicon/mstile-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/favicon/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicon/apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicon/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicon/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicon/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicon/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicon/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicon/apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon-180x180.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/android-chrome-192x192.png') }}" sizes="192x192">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-96x96.png') }}" sizes="96x96">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-16x16.png') }}" sizes="16x16">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('css/vendors.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/styles.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/owner.css')}}" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">



</head>

<body scroll-spy="" id="top" class=" theme-template-dark theme-pink alert-open alert-with-mat-grow-top-right">
    @include('layouts.nav')
    <div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="" style="">
        <section>
            @yield('content')
        </section>
</div>
    </div>
</main>
<script src="{{asset('js/vendors.min.js?v='.rand(1,1000))}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('js/app.min.js?v='.rand(1,1000))}}"></script>
<script src="{{asset('js/custom.js?v='.rand(1,1000))}}"></script>
<script src="{{asset('js/jquery.js?v='.rand(1,1000))}}"></script>
@stack('scripts')

@if ($message = Session::get('success'))
<script>
    Swal.fire(
      'Sukses!',
      '{{$message}}',
      'success'
    )
    </script>
@endif
@if ($message = Session::get('danger'))
<script>
    Swal.fire(
      'Oops...',
      '{{$message}}',
      'error'
    )
    </script>
@endif
</body>

</html>
