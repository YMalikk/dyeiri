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
                <li><a href="#0">Article : "{{$post->title}}"</a></li>
            </ul>
        </div>
    </div><!-- Position -->
    <!-- End SubHeader ============================================ -->
<!-- Content ================================================== -->
    <!-- Content ================================================== -->
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-md-9">
                <div class="post">
                    <img src="{{asset($post->image)}}" alt="" class="img-responsive">
                    <div class="post_info clearfix">
                        <div class="post-left">
                            <ul>
                                <li><i class="icon-calendar-empty"></i>{{date("j F Y",strtotime($post->created_at))}} <em>by Admin</em></li>
                                <li><i class="icon-inbox-alt"></i><a href="#">{{$post->category->name}}</a></li>
                            </ul>
                        </div>
                        <div class="post-right"><i class="icon-comment"></i><a href="#">0 </a></div>
                    </div>
                    <h2>{{$post->title}}</h2>
                    <p style="line-height: 25px;">
                        {{$post->description}}
                    </p>
                </div><!-- end post -->

             <!--   <h4>3 comments</h4>

                <div id="comments">
                    <ol>
                        <li>
                            <div class="avatar"><a href="#"><img src="img/avatar1.jpg" alt=""></a></div>
                            <div class="comment_right clearfix">
                                <div class="comment_info">
                                    By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#">Reply</a>
                                </div>
                                <p>
                                    Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
                                </p>
                            </div>
                            <ul>
                                <li>
                                    <div class="avatar"><a href="#"><img src="img/avatar2.jpg" alt=""></a></div>

                                    <div class="comment_right clearfix">
                                        <div class="comment_info">
                                            By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#">Reply</a>
                                        </div>
                                        <p>
                                            Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
                                        </p>
                                        <p>
                                            Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="avatar"><a href="#"><img src="img/avatar3.jpg" alt=""></a></div>

                            <div class="comment_right clearfix">
                                <div class="comment_info">
                                    By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#">Reply</a>
                                </div>
                                <p>
                                    Cursus tellus quis magna porta adipiscin
                                </p>
                            </div>
                        </li>
                    </ol>
                </div><!-- End Comments -->

              <!--  <h4>Leave a comment</h4>
                <form action="#" method="post">
                    <div class="form-group">
                        <input class="form-control styled" type="text" name="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <input class="form-control styled" type="text" name="mail" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control styled" style="height:150px;" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn_1" value="Post Comment">
                    </div>
                </form>-->
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
