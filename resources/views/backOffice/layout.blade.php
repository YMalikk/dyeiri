<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
@yield('head')
<body>
@include('sweet::alert')
<div id="sb-site">
    @yield('slideBar')
    <div id="page-wrapper">

    @yield('header')
    </div>
    @yield('sidebar')
    <div id="page-content-wrapper">
        <div id="page-content">
    @yield('content')
        </div>
    </div>
    
</div>
    @yield('footer')
</body>
</html>