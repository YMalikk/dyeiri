@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
@stop

<link href="{{asset('css/skins/square/grey.css')}}" rel="stylesheet">
<link href="{{asset('css/ion.rangeSlider.css')}}" rel="stylesheet">
<link href="{{asset('css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">

@section('content')
   <section class="page_content">
       <div class="container-fluid full-height">
       <div class="row row-height">
           <div class="col-lg-7 col-md-6 content-left nopadding_top">
               <div id="filters_map">
                   <a data-toggle="collapse" href="#collapseFiltesmap" aria-expanded="false" aria-controls="collapseFiltesmap" class="btn_filter" id="open_filters"></a>
                   <div class="pull-right">
                       <a href="#0" class="btn_filter search-overlay-menu-btn" id="search_bt"></a>
                       <a href="grid_list.html" class="btn_filter" id="grid"></a>
                       <a href="list_page.html" class="btn_filter" id="list"></a>
                   </div>
                   <div id="collapseFiltesmap" class="collapse">
                       <div class="filter_type clearfix">
                           <h6>Distance</h6>
                           <div class="range_wp">
                               <input type="text" id="range" name="range" value="">
                           </div>
                       </div>
                       <div class="filter_type clearfix">
                           <h6>Type</h6>
                           <ul>
                               <li><label><input type="checkbox" checked class="icheck">All <small>(49)</small></label></li>
                               <li><label><input type="checkbox" class="icheck">American <small>(12)</small></label><i class="color_1"></i></li>
                               <li><label><input type="checkbox" class="icheck">Chinese <small>(5)</small></label><i class="color_2"></i></li>
                               <li><label><input type="checkbox" class="icheck">Hamburger <small>(7)</small></label><i class="color_3"></i></li>
                               <li><label><input type="checkbox" class="icheck">Fish <small>(1)</small></label><i class="color_4"></i></li>
                               <li><label><input type="checkbox" class="icheck">Mexican <small>(49)</small></label><i class="color_5"></i></li>
                               <li><label><input type="checkbox" class="icheck">Pizza <small>(22)</small></label><i class="color_6"></i></li>
                               <li><label><input type="checkbox" class="icheck">Sushi <small>(43)</small></label><i class="color_7"></i></li>
                           </ul>
                       </div>
                       <div class="filter_type clearfix">
                           <h6>Rating</h6>
                           <ul>
                               <li><label><input type="checkbox" class="icheck"><span class="rating">
							<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i>
							</span></label></li>
                               <li><label><input type="checkbox" class="icheck"><span class="rating">
							<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
							</span></label></li>
                               <li><label><input type="checkbox" class="icheck"><span class="rating">
							<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i>
							</span></label></li>
                               <li><label><input type="checkbox" class="icheck"><span class="rating">
							<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i>
							</span></label></li>
                               <li><label><input type="checkbox" class="icheck"><span class="rating">
							<i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i>
							</span></label></li>
                           </ul>
                       </div>
                   </div>
               </div>
               @foreach($chefs as $chef)
                <div class="strip_list">
                   <div class="ribbon_1">
                       Popular
                   </div>
                   <div class="row">
                       <div class="col-md-9 col-sm-9">
                           <div class="desc">
                               <div class="thumb_strip">
                                   <a href="{{route('showChefProfil',['id' => $chef->id])}}"><img src="{{asset($chef->user->image)}}" alt=""></a>
                               </div>
                               <div class="rating">
                                   <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i> (<small><a href="#0">98 reviews</a></small>)
                               </div>
                               <h3>{{$chef->user->surname}} {{$chef->user->name}}</h3>
                               <div class="type">
                                   {{$chef->speciality}}
                               </div>
                               <div class="location">
                                  {{$chef->address}}<br> <span class="opening">Opens at 17:00.</span> Minimum order: $15
                               </div>
                               <ul>
                                   <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                   <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                               </ul>
                           </div>
                       </div>
                       <div class="col-md-3 col-sm-3">
                           <div class="go_to">
                               <div>
                                   <a href="detail_page.html" class="btn_1">View Menu</a>
                                   <a onclick="onHtmlClick('Pizza', 1)" class="btn_listing">View on Map</a>
                               </div>
                           </div>
                       </div>
                   </div><!-- End row-->
               </div><!-- End strip_list-->
               @endforeach

               <a href="#0" class="load_more_bt_2">Load more...</a>
           </div>
           <!-- End content-left-->

           <div class=" col-lg-5 col-md-6 map-right">
               <div id="map_listing"></div>
               <!-- map-->
           </div>

       </div>
       </div>
   </section>
@stop
@section('footer')
    @include('frontOffice.inc.footer')
    <!-- SPECIFIC SCRIPTS -->
   <!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAs_JyKE9YfYLSQujbyFToZwZy-wc09w7s"></script> -->
    <script src="{{asset('js')}}/map_listing.js"></script>
    <script src="{{asset('js')}}/infobox.js"></script>
    <script src="{{asset('js')}}/ion.rangeSlider.js"></script>
    <script>
        $(function () {
            'use strict';
            $("#range").ionRangeSlider({
                hide_min_max: true,
                keyboard: true,
                min: 0,
                max: 15,
                from: 0,
                to:5,
                type: 'double',
                step: 1,
                prefix: "Km ",
                grid: true
            });
        });
    </script>
@endsection
