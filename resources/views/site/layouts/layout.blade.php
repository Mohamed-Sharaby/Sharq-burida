<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="PanoramaAlqassiem">
    <meta name="theme-color" content="#BE894B">
    <title>@yield('title')</title>
    <!--Favicon-->
    <link rel="shortcut icon" type="image/svg" href="{{asset('website/img/custom-logo.svg')}}">
    <link rel="shortcut icon" sizes="192x192" href="{{asset('website/img/custom-logo.svg')}}">
    <link rel="apple-touch-icon" href="{{asset('website/img/custom-logo.svg')}}">
    <!--***************Start-Style***************-->
@include('site.layouts.styles')

<!--***************End-Style***************-->
</head>

<body>
<!-----------------------------------Start-Loader----------------------------------->
<div class="loader">
    <div class="loads">
        <div class="layers"></div>
    </div>
</div>
<!-----------------------------------End-Loader----------------------------------->

<!-----------------------------------start-Navbar-Section----------------------------------->
@include('site.layouts.header')
<!-----------------------------------End-Navbar-Section----------------------------------->


@yield('content')

<!-----------------------------------Start-Footer-Section----------------------------------->
@include('site.layouts.footer')
<!-----------------------------------End-Footer-Section----------------------------------->



<!--***************Start-Js***************-->
@include('site.layouts.scripts')
@stack('my-js')
<!--***************End-Js***************-->
</body>

</html>
