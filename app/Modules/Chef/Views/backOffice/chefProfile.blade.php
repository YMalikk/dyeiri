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
@stop

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset ('plugins/intlTelInput/css')}}/intlTelInput.css"/>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="{{ asset ('plugins/intlTelInput/js')}}/intlTelInput.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <style>
        .onoffswitch {
            position: relative; width: 90px;
            -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
        }

        .onoffswitch-checkbox {
            display: none;
        }

        .onoffswitch-label {
            display: block; overflow: hidden; cursor: pointer;
            border: 2px solid #999999; border-radius: 20px;
        }

        .onoffswitch-inner {
            display: block; width: 200%; margin-left: -100%;
            -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
            -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
        }

        .onoffswitch-inner:before, .onoffswitch-inner:after {
            display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
            font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
            -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
        }

        .onoffswitch-inner:before {
            content: "Chef";
            padding-left: 10px;
            background-color: #7dc440; color: #FFFFFF;
        }

        .onoffswitch-inner:after {
            content: "Client";
            padding-right: 10px;
            background-color: #2d3d99; color: white;
            text-align: right;
        }

        .onoffswitch-switch {
            display: block; width: 18px; margin: 6px;
            background: #FFFFFF;
            border: 2px solid #999999; border-radius: 20px;
            position: absolute; top: 0; bottom: 0; right: 56px;
            -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
            -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s;
        }

        .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
            margin-left: 0;
        }

        .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
            right: 0px;
        }
        #chef_information_form input[type=text],input[type=password],input[type=tel],input[type=email]
        {
            width:250px!important;
        }
        .country-list
        {
            z-index: 9999999!important;
        }
        #tel_int:focus
        {
            position: initial;
        }
        .update_img
        {
            display:none!important;
        }
     .update_cover_image
        {
            display:none!important;
        }

        .chef_image
        {
            width: 120px!important;
            height: 100%!important;

        }

      #change_cover_photo
      {
          display:block;
      }
        .text_aling_left
        {
            text-align: left;

        }
        .camera_icon
        {
            background: white;
            color: black;
        }
        .lbl_change_cover_photo
        {
            color:#7dc440;
            display:inline;
        }

    </style>
<!-- SubHeader =============================================== -->
<section class="parallax-window" data-parallax="scroll" data-image-src="{{asset($chef->cover_photo)}}" data-natural-width="1400" data-natural-height="470">
    <div id="subheader">
        <div id="sub_content">
            <div class="row show_cover_change">
                <div class="col-md-6 col-xs-12 pull-left text_aling_left">
                        <i class="fas fa-camera fa-2x camera_icon btn"></i>
                <div id="change_cover_photo">
                    <input type="file" name="cover_photo" id="cover_photo" class="form-control update_cover_image" accept="image/jpeg"/>

                    <label title="Modifier photo" class="lbl_change_cover_photo" style="cursor: pointer;" for="cover_photo">
                     Changer votre photo de couveture

                    </label>
                </div>
                </div>
            </div>
            <div id="thumb">
                <div id="my_img">
                    <input type="file" name="chef_image" id="chef_image" class="form-control update_img" accept="image/jpeg"/>
                    <label title="Modifier photo" style="cursor: pointer;" for="chef_image">
                        <img src="{{asset($user->image)}}" id="change_chef_image" alt="">
                    </label>
                </div>

            </div>
            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i> (<small><a href="detail_page_2.html">Read 98 reviews</a></small>)</div>
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
            <li><a href="{{route('showChefProfile')}}">Profil</a></li>
        </ul>
    </div>
</div><!-- Position -->
<div class="container">
    <div class=" container col-md-12 col-xs-12">
        <ul class="nav nav-pills">
            <li class="active"><a data-toggle="pill"  href="#menu">Menu</a></li>
            <li><a data-toggle="pill" href="#kicthen" id="kitchen_tab">Cuisine</a></li>
            <li><a data-toggle="pill" href="#setting">Paramétre</a></li>
            <li><a data-toggle="pill" href="#orders">Mes Commandes</a></li>
            <li class="pull-right">
                @if($chef->user->current_user==1)
                <div class="onoffswitch">
                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                    <label class="onoffswitch-label" for="myonoffswitch">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
                    @else
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch">
                        <label class="onoffswitch-label" for="myonoffswitch">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                @endif
            </li>
        </ul>
    </div>
</div>
<!-- Content ================================================== -->
<div class="container margin_60_35 tab-content">
    <div id="menu" class="tab-pane fade in active">
        <div class="row">

            <div class="col-md-3">
                <p><a href="#" style="cursor: inherit" class="btn_side">Categories</a></p>
                <div class="box_style_1">
                    <ul id="cat_nav">
                        <li><a href="#starters" class="active">Entrées <span>({{count($entrees)}})</span></a></li>
                        <li><a href="#main_courses">Menu principale <span>({{count($mains)}})</span></a></li>
                        <li><a href="#desserts">Desserts <span>({{count($desserts)}})</span></a></li>
                        <li><a href="#drinks">Drinks <span>({{count($drinks)}})</span></a></li>
                    </ul>
                </div><!-- End box_style_1 -->

                <div class="box_style_2 hidden-xs" id="help">
                    <i class="icon_lifesaver"></i>
                    <h4>Besoin <span>d'aide?</span></h4>
                    <a href="tel://004542344599" class="phone">+216 123 456</a>
                    <small>Lundi au Vendredi 9.00 - 20.00</small>
                </div>
            </div><!-- End col-md-3 -->

            <div class="col-md-9">
                <div class="box_style_2" id="main_menu">
                    <h2 class="inner">Menu</h2>
                    <h3 id="desserts">Menu du jour</h3>
                    @if(count($entrees)==0)
                        Aucun menu du jour
                    @else
                        <table class="table table-striped cart-list ">
                            <thead>
                            <tr>
                                <th >
                                    Item
                                </th>
                                <th>
                                    Prix
                                </th>
                                <th class="text-center">
                                    Commander
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($desserts as $key => $dessert)
                                <tr>
                                    <td>
                                        <figure class="thumb_menu_list"><img src="{{asset('../storage/img/foods/'.$dessert->image)}}" alt="thumb"></figure>
                                        <h5>{{++$key}}. {{$dessert->name}}</h5>
                                        <p>
                                            {{$dessert->description}}
                                        </p>
                                    </td>
                                    <td>
                                        <strong>{{$dessert->price}} DT</strong>
                                    </td>
                                    <td class="options text-center">
                                        <div class="dropdown dropdown-options">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                            <div class="dropdown-menu">
                                                <h5 class="text-center">Quantité</h5>
                                                <label class="text-center margin-bottom-none">
                                                    <input class="text-center" type="number" id="quantite{{$dessert->id}}" min="1" value="1" max="10">
                                                </label>
                                                <a href="javascript: void(0)" onclick="add('{{$dessert->id}}','{{$dessert->name}}','{{$dessert->price}}')" class="add_to_basket" style="margin-top: 10px">Add to cart</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    <hr>
                    <h3 class="nomargin_top" id="starters">Entrées</h3>
                    @if(count($entrees)==0)
                        Aucune entrée
                    @else
                        <table class="table table-striped cart-list">
                            <thead>
                            <tr>
                                <th>
                                    Photo
                                </th>
                                <th>
                                    Nom
                                </th>
                                <th>
                                    Heure estimé
                                </th>
                                <th>
                                    Prix

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <figure class="thumb_menu_list"><img src="img/menu-thumb-1.jpg" alt="thumb"></figure>
                                    <h5>1. Mexican Enchiladas</h5>
                                    <p>
                                        Fuisset mentitum deleniti sit ea.
                                    </p>
                                </td>
                                <td>
                                    <strong>€ 9,40</strong>
                                </td>
                                <td class="options">
                                    <div class="dropdown dropdown-options">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                        <div class="dropdown-menu">
                                            <h5>Select an option</h5>
                                            <label>
                                                <input type="radio" value="option1" name="options_1" checked>Medium <span>+ $3.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option2" name="options_1" >Large <span>+ $5.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option3" name="options_1" >Extra Large <span>+ $8.30</span>
                                            </label>
                                            <h5>Add ingredients</h5>
                                            <label>
                                                <input type="checkbox" value="">Extra Tomato <span>+ $4.30</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" value="">Extra Peppers <span>+ $2.50</span>
                                            </label>
                                            <a href="#0" class="add_to_basket">Add to cart</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <figure class="thumb_menu_list"><img src="img/menu-thumb-2.jpg" alt="thumb"></figure>
                                    <h5>2. Fajitas</h5>
                                    <p>
                                        Fuisset mentitum deleniti sit ea.
                                    </p>
                                </td>
                                <td>
                                    <strong>€ 6,80</strong>
                                </td>
                                <td class="options">
                                    <div class="dropdown dropdown-options">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                        <div class="dropdown-menu">
                                            <h5>Select an option</h5>
                                            <label>
                                                <input type="radio" value="option1" name="options_2" checked>Medium <span>+ $3.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option2" name="options_2" >Large <span>+ $5.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option3" name="options_2" >Extra Large <span>+ $8.30</span>
                                            </label>
                                            <h5>Add ingredients</h5>
                                            <label>
                                                <input type="checkbox" value="">Extra Tomato <span>+ $4.30</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" value="">Extra Peppers <span>+ $2.50</span>
                                            </label>
                                            <a href="#0" class="add_to_basket">Add to cart</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <figure class="thumb_menu_list"><img src="img/menu-thumb-3.jpg" alt="thumb"></figure>
                                    <h5>3. Royal Fajitas</h5>
                                    <p>
                                        Fuisset mentitum deleniti sit ea.
                                    </p>
                                </td>
                                <td>
                                    <strong>€ 5,70</strong>
                                </td>
                                <td class="options">
                                    <div class="dropdown dropdown-options">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                        <div class="dropdown-menu">
                                            <h5>Select an option</h5>
                                            <label>
                                                <input type="radio" value="option1" name="options_3" checked>Medium <span>+ $3.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option2" name="options_3" >Large <span>+ $5.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option3" name="options_3" >Extra Large <span>+ $8.30</span>
                                            </label>
                                            <h5>Add ingredients</h5>
                                            <label>
                                                <input type="checkbox" value="">Extra Tomato <span>+ $4.30</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" value="">Extra Peppers <span>+ $2.50</span>
                                            </label>
                                            <a href="#0" class="add_to_basket">Add to cart</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <figure class="thumb_menu_list"><img src="img/menu-thumb-4.jpg" alt="thumb"></figure>
                                    <h5>4. Chicken Enchilada Wrap</h5>
                                    <p>
                                        Fuisset mentitum deleniti sit ea.
                                    </p>
                                </td>
                                <td>
                                    <strong>€ 5,20</strong>
                                </td>
                                <td class="options">
                                    <div class="dropdown dropdown-options">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                        <div class="dropdown-menu">
                                            <h5>Select an option</h5>
                                            <label>
                                                <input type="radio" value="option1" name="options_4" checked>Medium <span>+ $3.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option2" name="options_4" >Large <span>+ $5.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option3" name="options_4" >Extra Large <span>+ $8.30</span>
                                            </label>
                                            <h5>Add ingredients</h5>
                                            <label>
                                                <input type="checkbox" value="">Extra Tomato <span>+ $4.30</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" value="">Extra Peppers <span>+ $2.50</span>
                                            </label>
                                            <a href="#0" class="add_to_basket">Add to cart</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    @endif
                    <hr>
                    <h3 id="main_courses">Plats principal</h3>
                    @if(count($mains)==0)
                        Aucun menu principal
                    @else
                        <table class="table table-striped cart-list ">
                            <thead>
                            <tr>
                                <th>
                                    Item
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Order
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <figure class="thumb_menu_list"><img src="img/menu-thumb-5.jpg" alt="thumb"></figure>
                                    <h5>5. Cheese Quesadilla</h5>
                                    <p>
                                        Fuisset mentitum deleniti sit ea.
                                    </p>
                                </td>
                                <td>
                                    <strong>€ 12,00</strong>
                                </td>
                                <td class="options">
                                    <div class="dropdown dropdown-options">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                        <div class="dropdown-menu">
                                            <h5>Select an option</h5>
                                            <label>
                                                <input type="radio" value="option1" name="options_5" checked>Medium <span>+ $3.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option2" name="options_5" >Large <span>+ $5.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option3" name="options_5" >Extra Large <span>+ $8.30</span>
                                            </label>
                                            <h5>Add ingredients</h5>
                                            <label>
                                                <input type="checkbox" value="">Extra Tomato <span>+ $4.30</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" value="">Extra Peppers <span>+ $2.50</span>
                                            </label>
                                            <a href="#0" class="add_to_basket">Add to cart</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <figure class="thumb_menu_list"><img src="img/menu-thumb-6.jpg" alt="thumb"></figure>
                                    <h5>6. Chorizo & Cheese</h5>
                                    <p>
                                        Fuisset mentitum deleniti sit ea.
                                    </p>
                                </td>
                                <td>
                                    <strong>€ 24,71</strong>
                                </td>
                                <td class="options">
                                    <div class="dropdown dropdown-options">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                        <div class="dropdown-menu">
                                            <h5>Select an option</h5>
                                            <label>
                                                <input type="radio" value="option1" name="options_6" checked>Medium <span>+ $3.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option2" name="options_6" >Large <span>+ $5.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option3" name="options_6" >Extra Large <span>+ $8.30</span>
                                            </label>
                                            <h5>Add ingredients</h5>
                                            <label>
                                                <input type="checkbox" value="">Extra Tomato <span>+ $4.30</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" value="">Extra Peppers <span>+ $2.50</span>
                                            </label>
                                            <a href="#0" class="add_to_basket">Add to cart</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <figure class="thumb_menu_list"><img src="img/menu-thumb-7.jpg" alt="thumb"></figure>
                                    <h5>7. Beef Taco</h5>
                                    <p>
                                        Fuisset mentitum deleniti sit ea.
                                    </p>
                                </td>
                                <td>
                                    <strong>€ 8,70</strong>
                                </td>
                                <td class="options">
                                    <a href="#0"><i class="icon_plus_alt2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <figure class="thumb_menu_list"><img src="img/menu-thumb-8.jpg" alt="thumb"></figure>
                                    <h5>8. Minced Beef Double Layer</h5>
                                    <p>
                                        Fuisset mentitum deleniti sit ea.
                                    </p>
                                </td>
                                <td>
                                    <strong>€ 6,30</strong>
                                </td>
                                <td class="options">
                                    <div class="dropdown dropdown-options">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                        <div class="dropdown-menu">
                                            <h5>Select an option</h5>
                                            <label>
                                                <input type="radio" value="option1" name="options_7" checked>Medium <span>+ $3.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option2" name="options_7" >Large <span>+ $5.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option3" name="options_7" >Extra Large <span>+ $8.30</span>
                                            </label>
                                            <h5>Add ingredients</h5>
                                            <label>
                                                <input type="checkbox" value="">Extra Tomato <span>+ $4.30</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" value="">Extra Peppers <span>+ $2.50</span>
                                            </label>
                                            <a href="#0" class="add_to_basket">Add to cart</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <figure class="thumb_menu_list"><img src="img/menu-thumb-9.jpg" alt="thumb"></figure>
                                    <h5>9. Piri Piri Chicken</h5>
                                    <p>
                                        Fuisset mentitum deleniti sit ea.
                                    </p>
                                </td>
                                <td>
                                    <strong>€ 7,40</strong>
                                </td>
                                <td class="options">
                                    <div class="dropdown dropdown-options">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                        <div class="dropdown-menu">
                                            <h5>Select an option</h5>
                                            <label>
                                                <input type="radio" value="option1" name="options_8" checked>Medium <span>+ $3.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option2" name="options_8" >Large <span>+ $5.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option3" name="options_8" >Extra Large <span>+ $8.30</span>
                                            </label>
                                            <h5>Add ingredients</h5>
                                            <label>
                                                <input type="checkbox" value="">Extra Tomato <span>+ $4.30</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" value="">Extra Peppers <span>+ $2.50</span>
                                            </label>
                                            <a href="#0" class="add_to_basket">Add to cart</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <figure class="thumb_menu_list"><img src="img/menu-thumb-10.jpg" alt="thumb"></figure>
                                    <h5>10. Burrito Al Pastor</h5>
                                    <p>
                                        Fuisset mentitum deleniti sit ea.
                                    </p>
                                </td>
                                <td>
                                    <strong>€ 7,70</strong>
                                </td>
                                <td class="options">
                                    <div class="dropdown dropdown-options">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                        <div class="dropdown-menu">
                                            <h5>Select an option</h5>
                                            <label>
                                                <input type="radio" value="option1" name="options_9" checked>Medium <span>+ $3.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option2" name="options_9" >Large <span>+ $5.30</span>
                                            </label>
                                            <label>
                                                <input type="radio" value="option3" name="options_9" >Extra Large <span>+ $8.30</span>
                                            </label>
                                            <h5>Add ingredients</h5>
                                            <label>
                                                <input type="checkbox" value="">Extra Tomato <span>+ $4.30</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" value="">Extra Peppers <span>+ $2.50</span>
                                            </label>
                                            <a href="#0" class="add_to_basket">Add to cart</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    @endif
                    <hr>
                    <h3 id="desserts">Desserts</h3>
                    @if(count($desserts)==0)
                        Aucun dessert
                    @else
                        <table class="table table-striped cart-list ">
                            <thead>
                            <tr>
                                <th >
                                    Item
                                </th>
                                <th>
                                    Prix
                                </th>
                                <th class="text-center">
                                    Commander
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($desserts as $key => $dessert)
                                <tr>
                                    <td>
                                        <figure class="thumb_menu_list"><img src="{{asset('../storage/img/foods/'.$dessert->image)}}" alt="thumb"></figure>
                                        <h5>{{++$key}}. {{$dessert->name}}</h5>
                                        <p>
                                            {{$dessert->description}}
                                        </p>
                                    </td>
                                    <td>
                                        <strong>{{$dessert->price}} DT</strong>
                                    </td>
                                    <td class="options text-center">
                                        <div class="dropdown dropdown-options">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                            <div class="dropdown-menu">
                                                <h5 class="text-center">Quantité</h5>
                                                <label class="text-center margin-bottom-none">
                                                    <input class="text-center" type="number" id="quantite{{$dessert->id}}" min="1" value="1" max="10">
                                                </label>
                                                <a href="javascript: void(0)" onclick="add('{{$dessert->id}}','{{$dessert->name}}','{{$dessert->price}}')" class="add_to_basket" style="margin-top: 10px">Add to cart</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    <hr>
                    <h3 id="drinks">Drinks</h3>
                    @if(count($drinks)==0)
                        Aucune Boisson
                    @else
                        <table class="table table-striped cart-list ">
                            <thead>
                            <tr>
                                <th>
                                    Item
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Order
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <figure class="thumb_menu_list"><img src="img/menu-thumb-17.jpg" alt="thumb"></figure>
                                    <h5>17. Chocolate Fudge Cake</h5>
                                    <p>
                                        Fuisset mentitum deleniti sit ea.
                                    </p>
                                </td>
                                <td>
                                    <strong>€ 24,71</strong>
                                </td>
                                <td class="options">
                                    <a href="#0"><i class="icon_plus_alt2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <figure class="thumb_menu_list"><img src="img/menu-thumb-18.jpg" alt="thumb"></figure>
                                    <h5>18. Cheesecake</h5>
                                    <p>
                                        Fuisset mentitum deleniti sit ea.
                                    </p>
                                </td>
                                <td>
                                    <strong>€ 7,50</strong>
                                </td>
                                <td class="options">
                                    <a href="#0"><i class="icon_plus_alt2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <figure class="thumb_menu_list"><img src="img/menu-thumb-19.jpg" alt="thumb"></figure>
                                    <h5>19. Apple Pie & Custard</h5>
                                    <p>
                                        Fuisset mentitum deleniti sit ea.
                                    </p>
                                </td>
                                <td>
                                    <strong>€ 9,70</strong>
                                </td>
                                <td class="options">
                                    <a href="#0"><i class="icon_plus_alt2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <figure class="thumb_menu_list"><img src="img/menu-thumb-20.jpg" alt="thumb"></figure>
                                    <h5>20. Profiteroles</h5>
                                    <p>
                                        Fuisset mentitum deleniti sit ea.
                                    </p>
                                </td>
                                <td>
                                    <strong>€ 12,00</strong>
                                </td>
                                <td class="options">
                                    <a href="#0"><i class="icon_plus_alt2"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    @endif
                </div><!-- End box_style_1 -->
            </div><!-- End col-md-9 -->



        </div><!-- End row -->
    </div>

    <div id="kicthen" class="tab-pane fade">
        <div class="row">
            <h3>Cuisine</h3>

            <div class="col-md-8">
                <div class="box_style_2">
                    <h2 class="inner">Description</h2>

                    <div id="Img_carousel" class="slider-pro">
                        <div class="sp-slides">
                            @foreach($kitchenImages as $image)
                                <div class="sp-slide">
                                    <img alt="" class="sp-image" src="{{asset($image->image)}}">
                                </div>
                            @endforeach
                        </div>
                        <div class="sp-thumbnails">
                            @foreach($kitchenImages as $image)
                                <img alt="" class="sp-thumbnail" src="{{asset($image->image)}}">
                            @endforeach
                        </div>
                    </div>

                </div><!-- End box_style_1 -->
            </div>
    </div>
    </div>

    <div id="setting" class="tab-pane fade">
        <div class="row">
            <h3>Paramétre </h3>
            <form id="chef_information_form"  action="{{route('handleEditChefProfile')}}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="control-label col-sm-3">Nom<span class="text-danger"></span></label>
                    <div class="col-md-8 col-sm-9">
                        <div class="input-group">
                            <input id="name" type="text" name="name" class="form-control" disabled value="{{$chef->user->name}}"/>

                      </div>
                        <small>Seule la premiére lettre de votre nom sera visible par les utilisateurs</small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3">Prénom<span class="text-danger"></span></label>
                    <div class="col-md-8 col-sm-9">
                        <div class="input-group">
                            <input id="surname" type="text" class="form-control" name="surname" disabled value="{{$chef->user->surname}}"/>

                        </div>
                        <small>Votre prénom sera visible par les utilisateurs</small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3">Numéro de téléphone<span class="text-danger"></span></label>
                    <div class="col-md-8 col-sm-9">
                        <div class="input-group">
                            <input id="code_tel_int"  type="hidden" name="countryCode"/>
                            <input name="mobile" type="hidden" id="my_mobile"/>
                            <input type="hidden" name="pays" id="my_pays"/>

                            <input type="tel" id="tel_int" class="form-control" disabled required> </div>
                        <small>Votre numéro de téléphone sera visible que par l'administrateur du site web.</small> </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-sm-3">Email<span class="text-danger"></span></label>
                    <div class="col-md-8 col-sm-9">
                        <div class="input-group">
                            <input id="email" type="email" class="form-control" name="email" disabled value="{{$chef->user->email}}"/>

                        </div>
                        <small>Votre email vous aide à vous connectez</small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3">Adresse<span class="text-danger"></span></label>
                    <div class="col-md-8 col-sm-9">
                        <div class="input-group">
                            <input id="address" type="text" class="form-control" name="address" disabled value="{{$chef->address}}"/>
                            <input type="hidden" name="lat" id="lat" value="{{$chef->lat}}"/>
                            <input type="hidden" name="lng" id="lng" value="{{$chef->lng}}"/>
                            <input type="hidden" name="city" id="city"/>
                            <input type="hidden" name="country" id="country"/>
                        </div>
                        <small>Votre email vous aide à vous connectez</small>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-3">  <input type="button" class="btn btn-success" id="btn_edit_profile" value="Modifier"/></label>
                    <div class="col-md-8 col-sm-9">
                        <div class="input-group address_result">
                            <input type="submit" style="display:none;" id="submit_form" class="btn btn-success" value="Enregistrer"> </div>



                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div id="orders" class="tab-pane fade">
        <div class="row">
            <div class="col-md-12">
                <div class="box_style_2" id="main_menu">
                    <h2 class="inner text-center">Mes Commandes</h2>
                    <h3 class="nomargin_top" id="starters">Commandes</h3>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="padding: 3px 25px!important;">
                                <a class="accordion-toggle">
                                    <div class="row" style="display: flex;">
                                        <div class="col-md-3">
                                            <h4>Date</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <h4>Client</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <h4>Statut</h4>
                                        </div>
                                        <div class="col-md-2">
                                            <h4>Prix</h4>
                                        </div>
                                        <div class="col-md-1" style="flex-wrap: wrap;align-items: center;display: flex;">
                                            <h4>Détails</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @foreach($orders as $order)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$order->id}}">
                                            <div class="row" style="display: flex;">
                                                <div class="col-md-3">
                                                    <h4>{{date("j F Y",strtotime($order->created_at))}}</h4>
                                                </div>
                                                <div class="col-md-3">
                                                    <h4>{{$order->client->name}}</h4>
                                                </div>
                                                <div class="col-md-3">
                                                    @if($order->status == 0)
                                                        <h4><span class="label label-warning">En attente</span></h4>
                                                    @elseif($order->status == 1)
                                                        <h4><span class="label" style="background-color: lightseagreen">Confirmé par le chef</span></h4>
                                                    @elseif($order->status == 2)
                                                        <h4><span class="label" style="background-color: #415F95">Prêt</span></h4>
                                                    @elseif($order->status == 3)
                                                        <h4><span class="label label-info">Confirmé par le livreur</span></h4>
                                                    @elseif($order->status == 4)
                                                        <h4><span class="label label-success">Livré</span></h4>
                                                    @else
                                                        <h4><span class="label label-danger">Annulé</span></h4>
                                                    @endif
                                                </div>
                                                <div class="col-md-2">
                                                    <h4>{{$order->price}} DT</h4>
                                                </div>
                                                <div class="col-md-1" style="flex-wrap: wrap;align-items: center;display: grid;">
                                                    <i class="indicator icon_plus_alt2 pull-right"></i>
                                                </div>
                                            </div>
                                        </a>
                                </div>
                                <div id="collapse{{$order->id}}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table table-responsive cart-list">
                                            <thead style="text-align: center">
                                                <tr>
                                                    <th class="text-center">Image</th>
                                                    <th class="text-center">Catégorie</th>
                                                    <th class="text-center">Plat</th>
                                                    <th class="text-center">Quantité</th>
                                                    <th class="text-center">Temps de préparation</th>
                                                    <th class="text-center">Prix Unitaire</th>
                                                    <th class="text-center">Commentaire du client</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order->foods as $food)
                                                <tr class="text-center">
                                                    <?php $plat=\App\Modules\Food\Models\Food::find($food->food_id) ?>
                                                    <td>
                                                        <img class="thumb_menu_list" style="float: none;" src="{{asset('../storage/img/foods/'.$plat->image)}}" alt="thumb">
                                                    </td>
                                                    <td>
                                                        <h4>{{$plat->category->name}}</h4>
                                                    </td>
                                                    <td>
                                                        <h4>{{$plat->name}}</h4>
                                                    </td>
                                                    <td>
                                                        <h4>{{$food->quantity}}</h4>
                                                    </td>
                                                    <td>
                                                        <h4>{{$plat->preparation_time}} min</h4>
                                                    </td>
                                                    <td>
                                                        <h4>{{$plat->price}} DT</h4>
                                                    </td>
                                                    <td>
                                                       <h4><a href="#" aria-expanded="true" data-toggle="modal" data-target="#foodReview{{$order->id}}{{$plat->id}}"><i class="icon_plus_alt2"></i></a></h4>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @if($order->status == 0)
                                            <button onclick="location.href='{{route('denyOrderChef',['id' => $order->id])}}'" class="btn_2 add_bottom_15 pull-right">Rejeter la commande</button>
                                            <button onclick="location.href='{{route('confirmOrderChef',['id' => $order->id])}}'" class="btn_1 add_bottom_15 pull-right" style="margin-right: 5px">Confirmer la commande</button>
                                        @elseif($order->status == 1)
                                            <button onclick="location.href='{{route('confirmDishReadyChef',['id' => $order->id])}}'" class="btn_1 add_bottom_15 pull-right">Plat prêt</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!-- End box_style_1 -->
            </div>
        </div>
    </div>
</div>

@foreach($orders as $order)
    @foreach($order->foods as $food)
        <?php $plat=\App\Modules\Food\Models\Food::find($food->food_id) ?>
        <div class="modal fade" id="foodReview{{$order->id}}{{$plat->id}}" tabindex="-1" role="dialog" aria-labelledby="review" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-popup">
                    <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                    <form method="post" action="" name="review" style="width: 100%;max-width: 650px" class="popup-form">
                        <div class="login_icon"><i class="icon_comment_alt"></i></div>
                        <div class="row">
                            @if(!$order->food_order_reviews($plat->id))
                                <h4>Pas de commentaire pour ce plat</h4>
                            @else
                                @foreach($foodOrderReviews as $foodOrderReview)
                                    @if($foodOrderReview->food_id == $plat->id
                                                && $foodOrderReview->order_id == $order->id)
                                         <div class="review_strip_single">
                                    <?php $client=\App\Modules\User\Models\User::find($order->food_order_reviews($plat->id)->user_id) ?>
                                    <img src="{{asset('../storage/img/users/avatar/') . '/' . $client->image}}" alt="" class="img-circle" style="width: 80px">
                                    <small> - {{date("j F Y",strtotime($order->food_order_reviews($plat->id)->created_at))}} -</small>
                                    <h4 style="text-align: left">{{$client->name}} {{$client->surname}}</h4>
                                    <p>
                                        {{$order->food_order_reviews($plat->id)->content}}
                                    </p>
                                    <div class="row">
                                            <div class="col-md-3">
                                                <div class="rating">
                                                    @for($i=0;$i<5;$i++)
                                                        @if($i<($foodOrderReview->foodOrderReviewRating->where('rating_type_id','=',1)->first())->rating)
                                                            <i class="icon_star voted"></i>
                                                        @else
                                                            <i class="icon_star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                Quantité servie
                                            </div>
                                            <div class="col-md-3">
                                                <div class="rating">
                                                    @for($i=0;$i<5;$i++)
                                                        @if($i<($foodOrderReview->foodOrderReviewRating->where('rating_type_id','=',2)->first())->rating)
                                                            <i class="icon_star voted"></i>
                                                        @else
                                                            <i class="icon_star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                Propreté
                                            </div>
                                            <div class="col-md-3">
                                                <div class="rating">
                                                    @for($i=0;$i<5;$i++)
                                                        @if($i<($foodOrderReview->foodOrderReviewRating->where('rating_type_id','=',3)->first())->rating)
                                                            <i class="icon_star voted"></i>
                                                        @else
                                                            <i class="icon_star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                Rapidité
                                            </div>
                                            <div class="col-md-3">
                                                <div class="rating">
                                                    @for($i=0;$i<5;$i++)
                                                        @if($i<($foodOrderReview->foodOrderReviewRating->where('rating_type_id','=',4)->first())->rating)
                                                            <i class="icon_star voted"></i>
                                                        @else
                                                            <i class="icon_star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                Prix
                                            </div>
                                        </div><!-- End row -->
                                    <!-- End row -->
                                </div>
                                    @endif
                                @endforeach
                            @endif
                        </div><!--End Row -->
                        <button href="#" class="btn btn-submit close-link">Fermer</button>
                    </form>
                </div>
            </div>
</div>
    @endforeach
@endforeach

<!-- End container -->
<!-- End Content =============================================== -->
<script>
    $('#cat_nav a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        var target = this.hash;
        var $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 70
        }, 900, 'swing', function () {
            window.location.hash = target;
        });

    });
    $('a[data-toggle="pill"]').on('shown.bs.tab', function(e) {

        $(".sp-thumbnail").each(function()
        {
            $(this).css('margin-left','');
            $(this).css("width","100%");
        });
        jQuery("#Img_carousel").sliderPro("resize");
    });
</script>
@stop
@section('footer')
    @include('frontOffice.inc.footer')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCj1cCyUDGUciWPWK7kzjrxjLx4wDDS9c&libraries=places&callback=initAutocomplete"
            async defer></script>
        <script src="{{asset("js/jquery.sliderPro.min.js")}}"></script>
        <script type="text/javascript">
            function initCarousel()
            {
                $('#Img_carousel').sliderPro({
                    width: 960,
                    height: 500,
                    fade: true,
                    arrows: true,
                    buttons: false,
                    fullScreen: false,
                    smallSize: 500,
                    startSlide: 0,
                    mediumSize: 1000,
                    largeSize: 3000,
                    thumbnailArrows: true,
                    autoplay: false
                });
                return false;
            }
            $(document).ready(function() {
                initCarousel();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            });
        </script>
    <script>
        $("#myonoffswitch").click(function()
        {
            window.location.replace("{{route('changeCurrentUser',array($chef->user->current_user))}}");
        });
    </script>
    <script>
        $("#tel_int").intlTelInput(
            {
                utilsScript:'{{asset('plugins/intlTelInput/js/utils.js')}}',
                separateDialCode: false
            }
        );
        $("#tel_int").intlTelInput("setNumber", "{{$chef->mobile}}");
        function valideTel() {

            var result = true;
            if (!$("#tel_int").intlTelInput("isValidNumber")) {
                $("#tel_int").focus();
                console.log("nop");
                result = false;
            }
            else {
                var countryData = $("#tel_int").intlTelInput("getSelectedCountryData");
                $("#code_tel_int").val(countryData.dialCode);
                $("#my_mobile").val($("#tel_int").intlTelInput("getNumber"));
                $("#my_pays").val(countryData.name);
            }
            return result;
        }
        var form=document.getElementById("chef_information_form");
        $(document).ready(function()
        {
            form.onsubmit=valideTel;

        });

        $(document).on("click","#btn_edit_profile",function()
        {
            $("#email").removeAttr("disabled");
            $("#name").removeAttr("disabled");
            $("#surname").removeAttr("disabled");
            $("#name").removeAttr("disabled");
            $("#address").removeAttr("disabled");
            $("#tel_int").removeAttr("disabled");
            $("#password").removeAttr("disabled");
            $("#email").removeAttr("disabled");
            $("#btn_edit_profile").val("Annuler");
            $("#btn_edit_profile").attr("id","btn_cancel_edit");
            $("#submit_form").css("display","block");
        });

        $(document).on("click","#btn_cancel_edit",function () {
            $("#btn_cancel_edit").text("Modifier");
            $("#email").attr("disabled",true);
            $("#name").attr("disabled",true);
            $("#surname").attr("disabled",true);
            $("#password").attr("disabled",true);
            $("#name").attr("disabled",true);
            $("#address").attr("disabled",true);
            $("#tel_int").attr("disabled",true);
            $("#email").attr("disabled",true);
            $("#submit_form").css("display","none");
            $("#btn_cancel_edit").val("Modifier");
            $("#btn_cancel_edit").attr("id","btn_edit_profile");
        })
    </script>
    <script>
        function updateProfileImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var myPhoto=new FormData();
                    myPhoto.append('photo',e.target.result);
                    $.ajax({
                        url:"{{route('handleChefChangeImage')}}",
                        type:"POST",
                        data:myPhoto,
                        contentType: false,
                        processData: false,
                        success:function(result)
                        {
                            $("#change_chef_image").attr("src",e.target.result);

                            },
                        error:function(result)
                        {
                            console.log(("erreur : "+JSON.stringify(result)));
                        }
                    });
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function updateCoverImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var myPhoto=new FormData();
                    myPhoto.append('photo',e.target.result);
                    $.ajax({
                        url:"{{route('handleChefChangeCover')}}",
                        type:"POST",
                        data:myPhoto,
                        contentType: false,
                        processData: false,
                        success:function(result)
                        {
                            $(".parallax-window").css("background-image","url('"+e.target.result+"')");
                            $(".parallax-window").css("background-size","100% 100%");
                            $(".parallax-window").css("background-repeat","no-repeat");
                        },
                        error:function(result)
                        {
                            console.log("erreur : "+JSON.stringify(result));
                        }
                    });
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".update_img").change(function(){
            updateProfileImage(this);
        });

        $(".update_cover_image").change(function(){
            updateCoverImage(this);
        });
    </script>
@endsection
