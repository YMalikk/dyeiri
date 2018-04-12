@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
    <!-- Gallery -->
    <link href="{{asset('css/slider-pro.min.css')}}" rel="stylesheet">
    <!-- Radio and check inputs -->
    <link href="{{asset('css/skins/square/grey.css')}}" rel="stylesheet">
    <style>
        .review_strip_single
        {
            margin: 30px 200px 25px!important;
        }
    </style>
@stop


@section('content')
<!-- SubHeader =============================================== -->
<section class="parallax-window" data-parallax="scroll" data-image-src="{{asset($chef->cover_photo)}}" data-natural-width="1400" data-natural-height="470">
    <div id="subheader">
        <div id="sub_content">
            <div id="thumb"><img src="{{asset($user->image)}}" alt=""></div>
            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i> (<small><a href="detail_page_2.html">{{$chefReviews}} avis</a></small>)</div>
            <h1>{{ucfirst($user->name)}} {{ucfirst($user->surname)}}</h1>
            <div><em>{{$chef->speciality}}</em></div>
            <div><i class="icon_pin"></i> {{$chef->address}}</div>
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

<div id="position">
    <div class="container">
        <ul>
            <li><a href="{{route('showHome')}}">Acceuil</a></li>
            <li><a href="{{route('showFood',array($food->id))}}">Plat</a></li>
        </ul>
    </div>
</div><!-- Position -->
<!-- Content ================================================== -->
<div class="container margin_60_35 tab-content">

        <div class="container margin_60_35">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="box_style_2">
                        <h2 class="inner">Description</h2>

                        <div id="Img_carousel" class="slider-pro">
                            <div class="sp-slides">
                                <div class="sp-slide">
                                    <img alt="" class="sp-image" src="{{asset('src/css/images/blank.html')}}"
                                         data-src="{{asset($food->image)}}"
                                         data-small="{{asset('img/slider_single_restaurant/1_small.jpg')}}"
                                         data-medium="{{asset('img/slider_single_restaurant/1_medium.jpg')}}"
                                         data-large="{{asset('img/slider_single_restaurant/1_large.jpg')}}"
                                         data-retina="{{asset('img/slider_single_restaurant/1_large.jpg')}}">
                                </div>
                            </div>
                            <div class="sp-thumbnails text-center">
                                <img alt="" class="sp-thumbnail" src="{{asset($food->image)}}">
                            </div>
                        </div>
                        <h3>Le plat</h3>
                        <p>
                            {{$food->description}}
                        </p>
                    </div><!-- End box_style_1 -->
                </div>
                @foreach($reviews as $review)
                    <div class="review_strip_single col-md-8 col-md-offset-2">
                        <img src="{{asset($users[$review->id]->image)}}" alt="" class="img-circle" style="width: 80px">
                        <small> - {{date("j F Y",strtotime($review->created_at))}} -</small>
                        <h4>{{$users[$review->id]->name}} {{$users[$review->id]->surname}}</h4>
                        <p>
                            {{$review->content}}
                        </p>
                    </div><!-- End review strip -->
                @endforeach
            </div><!-- End row -->
        </div><!-- End container -->
    </div>
<!-- End container -->
<!-- End Content =============================================== -->



<!-- SPECIFIC SCRIPTS -->
<script  src="{{asset('js/cat_nav_mobile.js')}}"></script>
<script>$('#cat_nav').mobileMenu();</script>
<script src="{{asset('js/theia-sticky-sidebar.js')}}"></script>
<script>
    jQuery('#sidebar').theiaStickySidebar({
        additionalMarginTop: 80
    });
</script>

<script src="{{asset('js/map_single.js')}}"></script>

@stop
@section('footer')
    @include('frontOffice.inc.footer')
@endsection
