@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
@stop

@section('content')
    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="home" data-parallax="scroll" data-image-src="{{asset('img')}}/sub_header_home.jpg" data-natural-width="1400" data-natural-height="550">
        <div id="subheader">
            <div id="sub_content">
                <h1>Découvrez des recettes et plats <span class="logo_tag">#dyeiri</span></h1>
                <p>
                    Commandez les plats que vous aimez auprés de chez vous.
                </p>
                <form method="post" action="{{route('handleSearchFood')}}">
                    {!! csrf_field() !!}
                    <div class="input-group col-md-offset-2 col-md-8 col-xs-12">
                        <div class="input-group-btn">
                            <select class="btn btn-default dropdown-toggle btn_select my_btn_select" name="category">
                                <option selected disabled>Catégories</option>
                                <option  value="0">Toutes</option>
                                @foreach($categories as $category)
                                    <option  value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div><!-- /btn-group -->
                        <input type="text" class="form-control search-query" id="address" placeholder="Où voulez-vous cherchez vos plats?">
                        <input type="hidden" name="lat"  id="lat"/>
                        <input type="hidden" name="lng" id="lng"/>
                        <input type="hidden" name="city" id="city"/>
                        <input type="hidden" name="country" id="country"/>
                        <span class="input-group-addon btn_localise" title="Se localiser">
                            <span id="arround_me_value"></span>
                            <span class="fa fa-location-arrow"  aria-hidden="true"></span></span>

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-success btn_select">Rechercher <span class="fa fa-angle-right"></span></button>

                        </div><!-- /btn-group -->
                    </div>
                </form>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
        <div id="count" class="hidden-xs">
            <ul>
                <li><span class="number">2650</span> Restaurant</li>
                <li><span class="number">5350</span> People Served</li>
                <li><span class="number">12350</span> Registered Users</li>
            </ul>
        </div>
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->
<!-- Content ================================================== -->
<div class="container margin_60">

    <div class="main_title">
        <h2 class="nomargin_top" style="padding-top:0">Comment ça marche</h2>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="box_home" id="one">
                <span>1</span>
                <h3>Se localiser</h3>
                <p>
                    Trouver tous les chefs valable dans votre région.
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box_home" id="two">
                <span>2</span>
                <h3>Chosir votre chef</h3>
                <p>
                  Nos chef sont à votre disposition.
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box_home" id="three">
                <span>3</span>
                <h3>Commander</h3>
                <p>
                    Vos envies maintenant.
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box_home" id="four">
                <span>4</span>
                <h3>Livraison ou à emporter</h3>
                <p>
                  Manger sain, c'est simple.
                </p>
            </div>
        </div>
    </div><!-- End row -->

    <div id="delivery_time" class="hidden-xs">
        <strong><span>2</span><span>5</span></strong>
        <h4>The minutes that usually takes to deliver!</h4>
    </div>
</div><!-- End container -->

<div class="white_bg">
    <div class="container margin_60">

        <div class="main_title">
            <h2 class="nomargin_top">Choose from Most Popular</h2>
            <p>
                Cum doctus civibus efficiantur in imperdiet deterruisset.
            </p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <a href="detail_page.html" class="strip_list">
                    <div class="ribbon_1">Popular</div>
                    <div class="desc">
                        <div class="thumb_strip">
                            <img src="{{asset('img')}}/thumb_restaurant.jpg" alt="">
                        </div>
                        <div class="rating">
                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                        </div>
                        <h3>Taco Mexican</h3>
                        <div class="type">
                            Mexican / American
                        </div>
                        <div class="location">
                            135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00</span>
                        </div>
                        <ul>
                            <li>Take away<i class="icon_check_alt2 ok"></i></li>
                            <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                        </ul>
                    </div><!-- End desc-->
                </a><!-- End strip_list-->
                <a href="detail_page.html" class="strip_list">
                    <div class="ribbon_1">Popular</div>
                    <div class="desc">
                        <div class="thumb_strip">
                            <img src="{{asset('img')}}/thumb_restaurant_2.jpg" alt="">
                        </div>
                        <div class="rating">
                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                        </div>
                        <h3>Naples Pizza</h3>
                        <div class="type">
                            Italian / Pizza
                        </div>
                        <div class="location">
                            135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00</span>
                        </div>
                        <ul>
                            <li>Take away<i class="icon_check_alt2 ok"></i></li>
                            <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                        </ul>
                    </div><!-- End desc-->
                </a><!-- End strip_list-->
                <a href="detail_page.html" class="strip_list">
                    <div class="ribbon_1">Popular</div>
                    <div class="desc">
                        <div class="thumb_strip">
                            <img src="{{asset('img')}}/thumb_restaurant_3.jpg" alt="">
                        </div>
                        <div class="rating">
                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                        </div>
                        <h3>Japan Food</h3>
                        <div class="type">
                            Sushi / Japanese
                        </div>
                        <div class="location">
                            135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00</span>
                        </div>
                        <ul>
                            <li>Take away<i class="icon_check_alt2 ok"></i></li>
                            <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                        </ul>
                    </div><!-- End desc-->
                </a><!-- End strip_list-->
            </div><!-- End col-md-6-->
            <div class="col-md-6">
                <a href="detail_page.html" class="strip_list">
                    <div class="ribbon_1">Popular</div>
                    <div class="desc">
                        <div class="thumb_strip">
                            <img src="{{asset('img')}}/thumb_restaurant_4.jpg" alt="">
                        </div>
                        <div class="rating">
                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                        </div>
                        <h3>Sushi Gold</h3>
                        <div class="type">
                            Sushi / Japanese
                        </div>
                        <div class="location">
                            135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00</span>
                        </div>
                        <ul>
                            <li>Take away<i class="icon_check_alt2 ok"></i></li>
                            <li>Delivery<i class="icon_close_alt2 no"></i></li>
                        </ul>
                    </div><!-- End desc-->
                </a><!-- End strip_list-->
                <a href="detail_page.html" class="strip_list">
                    <div class="ribbon_1">Popular</div>
                    <div class="desc">
                        <div class="thumb_strip">
                            <img src="{{asset('img')}}/thumb_restaurant_5.jpg" alt="">
                        </div>
                        <div class="rating">
                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                        </div>
                        <h3>Dragon Tower</h3>
                        <div class="type">
                            Chinese / Thai
                        </div>
                        <div class="location">
                            135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00</span>
                        </div>
                        <ul>
                            <li>Take away<i class="icon_check_alt2 ok"></i></li>
                            <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                        </ul>
                    </div><!-- End desc-->
                </a><!-- End strip_list-->
                <a href="detail_page.html" class="strip_list">
                    <div class="ribbon_1">Popular</div>
                    <div class="desc">
                        <div class="thumb_strip">
                            <img src="{{asset('img')}}/thumb_restaurant_6.jpg" alt="">
                        </div>
                        <div class="rating">
                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                        </div>
                        <h3>China Food</h3>
                        <div class="type">
                            Chinese / Vietnam
                        </div>
                        <div class="location">
                            135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00</span>
                        </div>
                        <ul>
                            <li>Take away<i class="icon_check_alt2 ok"></i></li>
                            <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                        </ul>
                    </div><!-- End desc-->
                </a><!-- End strip_list-->
            </div>
        </div><!-- End row -->

    </div><!-- End container -->
</div><!-- End white_bg -->

<div class="high_light">
    <div class="container">
        <h3>Choose from over 2,000 Restaurants</h3>
        <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p>
        <a href="list_page.html">View all Restaurants</a>
    </div><!-- End container -->
</div><!-- End hight_light -->

<section class="parallax-window" data-parallax="scroll" data-image-src="{{asset('img')}}/bg_office.jpg" data-natural-width="1200" data-natural-height="600">
    <div class="parallax-content">
        <div class="sub_content">
            <i class="icon_mug"></i>
            <h3>We also deliver to your office</h3>
            <p>
                Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.
            </p>
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<!-- End Content =============================================== -->

<div class="container margin_60">
    <div class="main_title margin_mobile">
        <h2 class="nomargin_top">Work with Us</h2>
        <p>
            Cum doctus civibus efficiantur in imperdiet deterruisset.
        </p>
    </div>
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <a class="box_work" href="submit_restaurant.html">
                <img src="{{asset('img')}}/steak-bowl.png" alt="" class="img-circle with_work_us">
                <h3>Health Food, For Real<span>Start being healthy</span></h3>
                <p>Manger sain n'est pas si compliqué.<br/>
                   Une alimentation saine contribu à rester en bonne santé.
                </p>
                <div class="btn_1">Get started</div>
            </a>
        </div>
        <div class="col-md-4 col-xs-12">
            <a class="box_work" href="submit_driver.html">
                <img src="{{asset('img')}}/community.png" class="img-circle with_work_us">
                <h3>Join Our Community<span>Start to be actif</span></h3>
                <p>Rejoingez notre communité, où vos recettes prennent vie.
                   Nous rejoindre c'est rejoindre une communité chaleureuse et solide.<br/>
                </p>
                <div class="btn_1">Join</div>
            </a>
        </div>

        <div class="col-md-4 col-xs-12">
            <a class="box_work" href="submit_driver.html">
                <img src="{{asset('img')}}/scooter.png" style="width: 204px;" class="img-circle with_work_us">
                <h3>We are looking for a Driver<span>Start to earn money</span></h3>
                <p>Dyeiri recherche une personne motivée, rigoureuse et active.<br/>
                   Ayant un moyen de transport pour la livraison.
                </p>
                <div class="btn_1">Read more</div>
            </a>
        </div>
    </div><!-- End row -->
</div><!-- End container -->
@stop
@section('footer')
    @include('frontOffice.inc.footer')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCj1cCyUDGUciWPWK7kzjrxjLx4wDDS9c&libraries=places&callback=initAutocomplete"
            async defer></script>
@endsection
