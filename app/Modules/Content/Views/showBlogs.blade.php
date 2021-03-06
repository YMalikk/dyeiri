@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
    <link href="{{asset('css/blog.css')}}" rel="stylesheet">
    <style>
        .myText {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            line-height: 20px;     /* fallback */
            max-height: 65px;      /* fallback */
            -webkit-line-clamp: 3; /* number of lines to show */
            -webkit-box-orient: vertical;
        }
    </style>
@stop

@section('content')
    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="home" data-parallax="scroll" data-image-src="{{asset('img')}}/sub_header_home.jpg" data-natural-width="1400" data-natural-height="550">
        <div id="subheader">
            <div id="sub_content">
                <h1>Dyeiri Blog</h1>
                <p>
                    Le blog de dyeiri.
                </p>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#0">Blog</a></li>
                <li><a href="#0">Listes des articles</a></li>
            </ul>
        </div>
    </div><!-- Position -->
    <!-- End SubHeader ============================================ -->
<!-- Content ================================================== -->
    <!-- Content ================================================== -->
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-md-9">
                @foreach($posts as $post)
                    <div class="post">
                        <a href="" ><img src="{{asset($post->image)}}" alt="" class="img-responsive"></a>
                        <div class="post_info clearfix">
                            <div class="post-left">
                                <ul>
                                    <li><i class="icon-calendar-empty"></i>{{date("j F Y",strtotime($post->created_at))}} <em>{{$post->admin_id}}</em></li>
                                    <li><i class="icon-inbox-alt"></i><a href="#">{{$post->category->name}}</a></li>
                                </ul>
                            </div>
                            <div class="post-right"><i class="icon-comment"></i><a href="#">25 </a></div>
                        </div>
                        <h2>{{$post->title}}</h2>
                        <p class="myText">
                            {{$post->description}}
                        </p>
                        <a href="{{route('showBlog',array($post->id))}}" class="btn_1" >Continuer à lire</a>
                    </div><!-- end post -->
                @endforeach

                <div class="text-center">
                    <ul class="pager">
                        <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
                        <li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
                    </ul>
                </div>
            </div><!-- End col-md-9-->

            <aside class="col-md-3" id="sidebar">
                <div class="widget">
                    <h4>Categories</h4>
                    <ul id="cat_nav_blog">
                        <li><a href="#">Plats du jour</a></li>
                        <li><a href="#">Entrées</a></li>
                        <li><a href="#">Menus Principaux</a></li>
                        <li><a href="#">Desserts</a></li>
                        <li><a href="#">Drinks</a></li>
                    </ul>
                </div><!-- End widget -->
                <hr>
            </aside><!-- End aside -->
        </div>
    </div><!-- End container -->

<script>
    $(document).ready(function() {
        document.body.style.backgroundColor = "#f5f5f5";
    });

</script>
@stop
@section('footer')
    @include('frontOffice.inc.footer')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCj1cCyUDGUciWPWK7kzjrxjLx4wDDS9c&libraries=places&callback=initAutocomplete"
            async defer></script>
@endsection
