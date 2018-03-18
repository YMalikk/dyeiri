<!doctype html>
<html>
@yield('head')
<body>
@include('sweet::alert')
<div id="preloader">
    <div class="sk-spinner sk-spinner-wave" id="status">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div><!-- End Preload -->
@yield('header')
@yield('subHeader')
@yield('content')
@yield('footer')
</body>
</html>