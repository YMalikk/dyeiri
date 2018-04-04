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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
@stop


@section('content')

    <style>
        div.stars {

        }

        input.star { display: none; }

        label.star {
            float: right;
            padding: 2px;
            font-size: 24px;
            color: #444;
            transition: all .2s;
        }

        input.star:checked ~ label.star:before {
            content: '\f005';
            color: #FD4;
            transition: all .25s;
        }

        input.star-5:checked ~ label.star:before {
            color: #FE7;
            text-shadow: 0 0 20px #952;
        }

        input.star-1:checked ~ label.star:before { color: #F62; }

        label.star:hover { transform: rotate(-15deg) scale(1.3); }

        label.star:before {
            content: '\f006';
            font-family: FontAwesome;
        }
    </style>
<!-- SubHeader =============================================== -->
<section class="parallax-window" data-parallax="scroll" data-image-src="{{asset($chef->cover_photo)}}" data-natural-width="1400" data-natural-height="470">
    <div id="subheader">
        <div id="sub_content">
            <div id="thumb"><img src="{{asset($user->image)}}" alt=""></div>
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
    <div class=" container col-md-3 col-xs-12">
        <ul class="nav nav-pills">
            <li class="active"><a data-toggle="pill"  href="#menu">Menu</a></li>
            <li><a data-toggle="pill" href="#kicthen">Cuisine</a></li>
            <li><a data-toggle="pill" href="#about">A propos</a></li>
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

            <div class="col-md-6">
                <div class="box_style_2" id="main_menu" style="padding-left: 0;padding-right: 0;margin-top: 0;margin-bottom: 0;padding-bottom: 0">
                    <h2 class="inner" style="margin-left: auto;margin-right: auto;margin-bottom: 0;">Menu</h2>
                    <div class="panel-group" id="accordion" style="margin-bottom: 0">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseDayMenu">
                                    <h3 id="desserts">Menu du jour</h3>
                                </a>
                            </div>
                        </div>
                        @if(count($dayFoods)==0)
                            <div id="collapseDayMenu" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <h4>Aucun menu du jour</h4>
                                </div>
                            </div>
                        @else
                            <div id="collapseDayMenu" class="panel-collapse collapse">
                                <div class="panel-body" style="padding: 5px;">
                                    <table class="table table-striped cart-list ">
                                        <thead>
                                        <tr>
                                            <th>
                                                Image
                                            </th>
                                            <th >
                                                Plat
                                            </th>
                                            <th>
                                                Prix
                                            </th>
                                            <th>
                                                Temps de préparation
                                            </th>
                                            <th class="text-center">
                                                Ajouter
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dayFoods as $key => $dayFood)
                                            <tr>
                                                <td>
                                                    <figure class="thumb_menu_list"><img src="{{asset('../storage/img/foods/'.$dayFood->image)}}" alt="thumb"></figure>
                                                </td>
                                                <td>
                                                    <h5>{{++$key}}. {{$dayFood->name}}</h5>
                                                    <p>
                                                        {{$dayFood->description}}
                                                    </p>
                                                </td>
                                                <td>
                                                    <strong>{{$dayFood->price}}</strong>
                                                </td>
                                                <td><strong>{{$dayFood->preparation_time}} min</strong> </td>
                                                <td class="options text-center">
                                                    <div class="dropdown dropdown-options">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                                        <div class="dropdown-menu">
                                                            <h5 class="text-center">Quantité</h5>
                                                            <label class="text-center margin-bottom-none">
                                                                <input class="text-center" type="number" id="quantite{{$dayFood->id}}" min="1" value="1" max="10">
                                                            </label>
                                                            <a href="javascript: void(0)" onclick="add('{{$dayFood->id}}','{{$dayFood->name}}','{{$dayFood->price}}')" class="add_to_basket" style="margin-top: 10px">Ajouter au panier</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="panel-group" id="accordion" style="margin-bottom: 0">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseEntrees">
                                    <h3 id="starters">Entrées</h3>
                                </a>
                            </div>
                        </div>
                        @if(count($entrees)==0)
                            <div id="collapseEntrees" class="panel-collapse collapse">
                                <div class="panel-body" >
                                    <h4>Aucune entrée</h4>
                                </div>
                            </div>
                        @else
                            <div id="collapseEntrees" class="panel-collapse collapse">
                            <div class="panel-body" style="padding: 5px;">
                                <table class="table table-striped cart-list ">
                                    <thead>
                                    <tr>
                                        <th>
                                            Image
                                        </th>
                                        <th >
                                            Plat
                                        </th>
                                        <th>
                                            Prix
                                        </th>
                                        <th>
                                            Temps de préparation
                                        </th>
                                        <th class="text-center">
                                            Ajouter
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($desserts as $key => $dessert)
                                        <tr>
                                            <td>
                                                <figure class="thumb_menu_list"><img src="{{asset('../storage/img/foods/'.$dessert->image)}}" alt="thumb"></figure>
                                            </td>
                                            <td>
                                                <h5><a href='{{route('showFood',['id' => $dessert->id])}}' class="add_bottom_15">{{++$key}}. {{$dessert->name}}</a></h5>
                                                <p>
                                                    {{$dessert->description}}
                                                </p>
                                            </td>
                                            <td>
                                                <strong>{{$dessert->price}}</strong>
                                            </td>
                                            <td><strong>{{$dessert->preparation_time}} min</strong> </td>
                                            <td class="options text-center">
                                                <div class="dropdown dropdown-options">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                                    <div class="dropdown-menu">
                                                        <h5 class="text-center">Quantité</h5>
                                                        <label class="text-center margin-bottom-none">
                                                            <input class="text-center" type="number" id="quantite{{$dessert->id}}" min="1" value="1" max="10">
                                                        </label>
                                                        <a href="javascript: void(0)" onclick="add('{{$dessert->id}}','{{$dessert->name}}','{{$dessert->price}}')" class="add_to_basket" style="margin-top: 10px">Ajouter au panier</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="panel-group" id="accordion" style="margin-bottom: 0">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseMains">
                                    <h3 id="main_courses">Plats principal</h3>
                                </a>
                            </div>
                        </div>
                        @if(count($mains)==0)
                            <div id="collapseMains" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <h4> Aucun menu principal</h4>
                                </div>
                            </div>
                        @else
                            <div id="collapseMains" class="panel-collapse collapse">
                                <div class="panel-body" style="padding: 5px;">
                                    <table class="table table-striped cart-list ">
                                        <thead>
                                        <tr>
                                            <th>
                                                Image
                                            </th>
                                            <th >
                                                Plat
                                            </th>
                                            <th>
                                                Prix
                                            </th>
                                            <th>
                                                Temps de préparation
                                            </th>
                                            <th class="text-center">
                                                Ajouter
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($mains as $key => $main)
                                            <tr>
                                                <td>
                                                    <figure class="thumb_menu_list"><img src="{{asset('../storage/img/foods/'.$main->image)}}" alt="thumb"></figure>
                                                </td>
                                                <td>
                                                    <h5><a href='{{route('showFood',['id' => $main->id])}}' class="add_bottom_15">{{++$key}}. {{$main->name}}</a></h5>
                                                    <p>
                                                        {{$main->description}}
                                                    </p>
                                                </td>
                                                <td>
                                                    <strong>{{$main->price}}</strong>
                                                </td>
                                                <td><strong>{{$main->preparation_time}} min</strong> </td>
                                                <td class="options text-center">
                                                    <div class="dropdown dropdown-options">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                                        <div class="dropdown-menu">
                                                            <h5 class="text-center">Quantité</h5>
                                                            <label class="text-center margin-bottom-none">
                                                                <input class="text-center" type="number" id="quantite{{$main->id}}" min="1" value="1" max="10">
                                                            </label>
                                                            <a href="javascript: void(0)" onclick="add('{{$main->id}}','{{$main->name}}','{{$main->price}}')" class="add_to_basket" style="margin-top: 10px">Ajouter au panier</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="panel-group" id="accordion" style="margin-bottom: 0">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseDesserts">
                                    <h3 id="desserts">Desserts</h3>
                                </a>
                            </div>
                        </div>
                        @if(count($desserts)==0)
                            <div id="collapseDesserts" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <h4> Aucun menu principal</h4>
                                </div>
                            </div>
                        @else
                            <div id="collapseDesserts" class="panel-collapse collapse">
                                <div class="panel-body" style="padding: 5px;">
                                    <table class="table table-striped cart-list ">
                                        <thead>
                                        <tr>
                                            <th>
                                                Image
                                            </th>
                                            <th >
                                                Plat
                                            </th>
                                            <th>
                                                Prix
                                            </th>
                                            <th>
                                                Temps de préparation
                                            </th>
                                            <th class="text-center">
                                                Ajouter
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($desserts as $key => $dessert)
                                            <tr>
                                                <td>
                                                    <figure class="thumb_menu_list"><img src="{{asset('../storage/img/foods/'.$dessert->image)}}" alt="thumb"></figure>
                                                </td>
                                                <td>
                                                    <h5><a href='{{route('showFood',['id' => $dessert->id])}}' class="add_bottom_15">{{++$key}}. {{$dessert->name}}</a></h5>
                                                    <p>
                                                        {{$dessert->description}}
                                                    </p>
                                                </td>
                                                <td>
                                                    <strong>{{$dessert->price}}</strong>
                                                </td>
                                                <td><strong>{{$dessert->preparation_time}} min</strong> </td>
                                                <td class="options text-center">
                                                    <div class="dropdown dropdown-options">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                                        <div class="dropdown-menu">
                                                            <h5 class="text-center">Quantité</h5>
                                                            <label class="text-center margin-bottom-none">
                                                                <input class="text-center" type="number" id="quantite{{$dessert->id}}" min="1" value="1" max="10">
                                                            </label>
                                                            <a href="javascript: void(0)" onclick="add('{{$dessert->id}}','{{$dessert->name}}','{{$dessert->price}}')" class="add_to_basket" style="margin-top: 10px">Ajouter au panier</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="panel-group" id="accordion" style="margin-bottom: 0">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseDrinks">
                                    <h3 id="desserts">Drinks</h3>
                                </a>
                            </div>
                        </div>
                        @if(count($drinks)==0)
                            <div id="collapseDrinks" class="panel-collapse collapse">
                                <div class="panel-body" >
                                    <h4> Aucune boisson</h4>
                                </div>
                            </div>
                        @else
                            <div id="collapseDrinks" class="panel-collapse collapse">
                                <div class="panel-body" style="padding: 5px;">
                                    <table class="table table-striped cart-list ">
                                        <thead>
                                        <tr>
                                            <th>
                                                Image
                                            </th>
                                            <th >
                                                Plat
                                            </th>
                                            <th>
                                                Prix
                                            </th>
                                            <th>
                                                Temps de préparation
                                            </th>
                                            <th class="text-center">
                                                Ajouter
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($drinks as $key => $drink)
                                            <tr>
                                                <td>
                                                    <figure class="thumb_menu_list"><img src="{{asset('../storage/img/foods/'.$drink->image)}}" alt="thumb"></figure>
                                                </td>
                                                <td>
                                                    <h5><a href='{{route('showFood',['id' => $drink->id])}}' class="add_bottom_15">{{++$key}}. {{$drink->name}}</a></h5>
                                                    <p>
                                                        {{$drink->description}}
                                                    </p>
                                                </td>
                                                <td>
                                                    <strong>{{$drink->price}}</strong>
                                                </td>
                                                <td><strong>{{$drink->preparation_time}} min</strong> </td>
                                                <td class="options text-center">
                                                    <div class="dropdown dropdown-options">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon_plus_alt2"></i></a>
                                                        <div class="dropdown-menu">
                                                            <h5 class="text-center">Quantité</h5>
                                                            <label class="text-center margin-bottom-none">
                                                                <input class="text-center" type="number" id="quantite{{$drink->id}}" min="1" value="1" max="10">
                                                            </label>
                                                            <a href="javascript: void(0)" onclick="add('{{$drink->id}}','{{$drink->name}}','{{$drink->price}}')" class="add_to_basket" style="margin-top: 10px">Ajouter au panier</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div><!-- End box_style_1 -->
            </div><!-- End col-md-6 -->

            <div class="col-md-3" id="sidebar">
                <div class="theiaStickySidebar">
                    <div id="cart_box" >
                        <h3>Votre commande <i class="icon_cart_alt pull-right"></i></h3>
                        <form action="{{route('showOrderSummary',['chef' => $chef->id])}}" method="POST">
                            {!! csrf_field() !!}
                        <table class="table table_summary" id="myTable">
                            <tbody>
                            </tbody>
                        </table>
                        <hr>
                        <div class="row" id="options_2">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <label><input type="radio" id="delivery" checked  value="delivery"  name="option_2" class="icheck">Livraison</label>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <label><input type="radio" id="takeAway"  value="takeAway"  name="option_2" class="icheck">À emporter</label>
                            </div>
                        </div><!-- Edn options 2 -->

                        <hr>
                        <table class="table table_summary">
                            <tbody>
                            <tr id="deliveryFees">
                                <td>
                                    Frais de livraison <span class="pull-right">4 DT</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="total">
                                    TOTAL <span class="pull-right">&nbsp;DT</span> <span class="pull-right" id="orderTotal">0</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <hr>
                        <button type="submit" class="btn_full">Commander</button>
                        </form>
                    </div><!-- End cart_box -->
                </div><!-- End theiaStickySidebar -->
            </div><!-- End col-md-3 -->

        </div><!-- End row -->
        <div id="summary_review">
            <div id="general_rating">
                {{count($reviews)}} Avis
                <div class="rating">
                    @for($i=0;$i<5;$i++)
                        @if($i<$total)
                            <i class="icon_star voted"></i>
                        @else
                            <i class="icon_star"></i>
                        @endif
                    @endfor
                </div>
            </div>

            <div class="row" id="rating_summary">
                <div class="col-md-6">
                    <ul>
                        <li>Quantité
                            <div class="rating">
                                @for($i=0;$i<5;$i++)
                                    @if($i<$amount)
                                        <i class="icon_star voted"></i>
                                    @else
                                        <i class="icon_star"></i>
                                    @endif
                                @endfor
                            </div>
                        </li>
                        <li>Propreté
                            <div class="rating">
                                @for($i=0;$i<5;$i++)
                                    @if($i<$clean)
                                        <i class="icon_star voted"></i>
                                    @else
                                        <i class="icon_star"></i>
                                    @endif
                                @endfor
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul>
                        <li>Rapidité
                           <div class="rating">
                                @for($i=0;$i<5;$i++)
                                    @if($i<$speed)
                                        <i class="icon_star voted"></i>
                                    @else
                                        <i class="icon_star"></i>
                                    @endif
                                @endfor
                            </div>
                        </li>
                        <li>Prix
                            <div class="rating">
                                @for($i=0;$i<5;$i++)
                                    @if($i<$price)
                                        <i class="icon_star voted"></i>
                                    @else
                                        <i class="icon_star"></i>
                                    @endif
                                @endfor
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- End row -->
            <hr class="styled">
            @if(count($currentUserReview)==0)
                <a href="#" class="btn_1 add_bottom_15" data-toggle="modal" data-target="#myReview">Poster un avis</a>
            @else
                <button type="submit" class="btn add_bottom_15" style="background-color: #85c99d" disabled>Poster un avis</button>
            @endif
        </div><!-- End summary_review -->

        @foreach($reviews as $review)
            <div class="review_strip_single">
                <img src="" alt="" class="img-circle">
                <small> - {{date("j F Y",strtotime($review->created_at))}} -</small>
                <h4>{{$review->client->name}} {{$review->client->surname}}</h4>
                <p>
                    {{$review->content}}
                </p>
                <div class="row">
                    <div class="col-md-3">
                        <div class="rating">
                            @for($i=0;$i<5;$i++)
                                @if($i<($review->reviewRating->where('rating_type_id','=',1)->first())->rating)
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
                                @if($i<($review->reviewRating->where('rating_type_id','=',2)->first())->rating)
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
                                @if($i<($review->reviewRating->where('rating_type_id','=',3)->first())->rating)
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
                                @if($i<($review->reviewRating->where('rating_type_id','=',4)->first())->rating)
                                    <i class="icon_star voted"></i>
                                @else
                                    <i class="icon_star"></i>
                                @endif
                            @endfor
                        </div>
                        Prix
                    </div>
                </div><!-- End row -->
            </div><!-- End review strip -->
        @endforeach
    </div>

    <div id="kicthen" class="tab-pane fade">
        <div class="container margin_60_35">
            <div class="row">

                <div class="col-md-4">
                    <p>
                        <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">View on map</a>
                    </p>
                    <div class="box_style_2">
                        <h4 class="nomargin_top">Opening time <i class="icon_clock_alt pull-right"></i></h4>
                        <ul class="opening_list">
                            <li>Monday<span>12.00am-11.00pm</span></li>
                            <li>Tuesday<span>12.00am-11.00pm</span></li>
                            <li>Wednesday <span class="label label-danger">Closed</span></li>
                            <li>Thursday<span>12.00am-11.00pm</span></li>
                            <li>Friday<span>12.00am-11.00pm</span></li>
                            <li>Saturday<span>12.00am-11.00pm</span></li>
                            <li>Sunday <span class="label label-danger">Closed</span></li>
                        </ul>
                    </div>
                    <div class="box_style_2 hidden-xs" id="help">
                        <i class="icon_lifesaver"></i>
                        <h4>Besoin <span>d'aide?</span></h4>
                        <a href="tel://004542344599" class="phone">+216 123 456</a>
                        <small>Lundi au Vendredi 9.00 - 20.00</small>
                    </div>
                </div>

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
                        <h3>About us</h3>
                        <p>
                            Lorem ipsum dolor sit amet, ius sonet meliore partiendo cu. Nobis laudem mediocrem cum et. Debitis nonumes similique te eam, blandit eligendi principes sea no. Cu eum quidam expetendis.
                        </p>
                        <p class="add_bottom_30">
                            Lorem ipsum dolor sit amet, ex has recusabo adipiscing, aliquip alienum at vis, eos id qualisque quaerendum. Soleat habemus duo no, te quo dicam everti, sale ullum movet per ea. Cu cum laudem quaeque, agam decore nullam ei vis. Nec ad tota etiam eirmod. Harum debitis detraxit ut vel, eu vel option oporteat.
                        </p>
                    </div><!-- End box_style_1 -->
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </div>

    <div id="about" class="tab-pane fade">
        <div class="row">
            <h3>A propos </h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
    </div>
</div><!-- End container -->
<!-- End Content =============================================== -->

<!-- Register modal -->
<div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="review" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form method="post" action="{{route('handleChefReview',['id' => $chef->id])}}" name="review" style="width: 100%;max-width: 650px" class="popup-form">
                {!! csrf_field() !!}
                <div class="login_icon"><i class="icon_comment_alt"></i></div>
               <!-- <input name="chef_id" id="chef_id" type="hidden" value="{{$chef->id}}"> -->
                @foreach($types as $type)
                    <div class="stars" style="display:flex">
                            <div class="col-md-3 col-md-offset-2 col-xs-12" style="flex-wrap: wrap;align-items: center;display: flex;">
                                <?php if($type==1) echo "<label style='color: white;font-size: 16px'>Quantité</label>"; elseif($type == 2) echo "<label style='color: white;font-size: 16px'>Propreté</label>";elseif($type == 3) echo "<label style='color: white;font-size: 16px'>Rapidité</label>";elseif($type == 4) echo "<label style='color: white;font-size: 16px'>Prix</label>";?>
                            </div>
                            <div class="col-md-6 col-xs-12 col-sm-pull-4 col-xs-pull-4 col-md-pull-1 col-xss-6 col-xss-7">
                                <input class="star star-5" id="star-5-{{$chef->id}}-{{$type}}" type="radio" value="5" name="star{{$type}}" />
                                <label class="star star-5" for="star-5-{{$chef->id}}-{{$type}}"></label>
                                <input class="star star-4" id="star-4-{{$chef->id}}-{{$type}}" type="radio" value="4" name="star{{$type}}" />
                                <label class="star star-4" for="star-4-{{$chef->id}}-{{$type}}"></label>
                                <input class="star star-3" id="star-3-{{$chef->id}}-{{$type}}" type="radio" value="3" name="star{{$type}}" />
                                <label class="star star-3" for="star-3-{{$chef->id}}-{{$type}}"></label>
                                <input class="star star-2" id="star-2-{{$chef->id}}-{{$type}}" type="radio" value="2" name="star{{$type}}" />
                                <label class="star star-2" for="star-2-{{$chef->id}}-{{$type}}"></label>
                                <input class="star star-1" id="star-1-{{$chef->id}}-{{$type}}" type="radio" value="1" name="star{{$type}}" />
                                <label class="star star-1" for="star-1-{{$chef->id}}-{{$type}}"></label>
                            </div>
                    </div>
                @endforeach
                <textarea name="review_text" id="review_text" class="form-control form-white" style="height:100px" placeholder="Donnez votre avis"></textarea>
              <!--  <input type="text" id="verify_review" class="form-control form-white" placeholder="Are you human? 3 + 1 ="> -->
                <button type="submit" class="btn btn-submit" id="submit-review">Envoyer</button>
            </form>
            <div id="message-review"></div>
        </div>
    </div>
</div><!-- End Register modal -->
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


    $(document).ready(function () {
        var i=1;
        setInterval(function(){
            if(document.getElementById("delivery").parentElement.classList.contains("checked"))
            {
                $("#deliveryFees").css('display','grid');
                $("#delivery").attr('checked',true);
                $("#takeAway").attr('checked',false);
                if(i===1)
                {
                    total = parseInt($("#orderTotal").text());
                    total+=4;
                    $("#orderTotal").text(total);
                    i=0;
                }
                /*total = parseInt($("#orderTotal").text());
                total+=4;*/
                //$("#orderTotal").text("4");
            }
            else
            {
                $("#deliveryFees").css('display','none');
                $("#delivery").attr('checked',false);
                $("#takeAway").attr('checked',true);
                if(i===0)
                {
                    total = parseInt($("#orderTotal").text());
                    total-=4;
                    $("#orderTotal").text(total);
                    i=1;
                }
                //$("#orderTotal").text("0");
            }
        }, 100);





    });

    var compteur=0;
    var compteurLigne=0;

    function handleChange()
    {
        console.log('samous');
    }

    function add(id,foodName,foodPrice) {
        compteur++;
        var totalPrice = parseInt($("#orderTotal").text());
        var quantite=  $('input#quantite'+id).val();
        var total = quantite * foodPrice;
        var tableRef = document.getElementById('myTable').getElementsByTagName('tbody')[0];
        // Insert a row in the table at the last row
        var newRow   = tableRef.insertRow(tableRef.rows.length);
        // Insert a cell in the row at index 0
        var newCell  = newRow.insertCell(0);        // TD 1
        var name = document.createElement('a');     // ajout <a> </a>
        att = document.createAttribute("class");       // ajout class="remove_item"
        att.value = "remove_item rowId"+compteurLigne;
        name.setAttribute("onclick","remove("+compteurLigne+","+total+")");
        name.setAttributeNode(att);
        name.setAttribute("id",total);
        name.setAttributeNode(att);
        var name2 = document.createElement('i');     // ajout <i> </i>
        att = document.createAttribute("class");       // ajout class="remove_item"
        att.value = "icon_minus_alt";

        name2.setAttributeNode(att);
        name.appendChild(name2);
        newCell.appendChild(name);
        var name3 = document.createElement('strong');     // ajout <strong> </strong>
        name3.innerHTML = " " + quantite + "x " + foodName;
        newCell.appendChild(name3);

        var newCell2  = newRow.insertCell(1);        // TD 2
        var name4 = document.createElement('strong');
        att = document.createAttribute("class");       // ajout class="remove_item"
        att.value = "pull-right";
        name4.innerHTML = total + " DT";
        name4.setAttributeNode(att);
        newCell2.appendChild(name4);

        totalPrice+=total;
        $("#orderTotal").text(totalPrice);

        var inputHiddenId = document.createElement('input');
        inputHiddenId.type = "hidden";
        inputHiddenId.name = "foods[]";
        inputHiddenId.value = id;
        newCell2.appendChild(inputHiddenId);

        var inputHiddenQuantity = document.createElement('input');
        inputHiddenQuantity.type = "hidden";
        inputHiddenQuantity.name = "quantity[]";
        inputHiddenQuantity.value = quantite;
        newCell2.appendChild(inputHiddenQuantity);
        compteurLigne++;
    }

    function remove(idRow,priceFood)
    {
        document.getElementById("myTable").deleteRow(idRow);
        for(var i=idRow+1;i<compteurLigne;i++)
        {
            row = document.getElementsByClassName("rowId"+i);
            price = row[0].id;
            console.log(price);
            temp = i-1;
            $(".rowId"+i).attr("onclick","remove("+temp+","+price+")");
            $(".rowId"+i).addClass("rowId"+temp);
        }
        compteurLigne--;
        var totalPrice = parseInt($("#orderTotal").text());
        totalPrice-=priceFood;
        $("#orderTotal").text(totalPrice);
    }
</script>

<!-- SPECIFIC SCRIPTS -->
<script  src="{{asset('js/cat_nav_mobile.js')}}"></script>
<script>$('#cat_nav').mobileMenu();</script>
<script src="{{asset('js/theia-sticky-sidebar.js')}}"></script>
<script>
    jQuery('#sidebar').theiaStickySidebar({
        additionalMarginTop: 80
    });
    $('a[data-toggle="pill"]').on('shown.bs.tab', function(e) {

        $(".sp-thumbnail").each(function()
        {
            $(this).css('margin-left','');
            $(this).css("width","100%");
        });
       <!-- jQuery("#Img_carousel").sliderPro("resize"); -->
    });
</script>

<script src="{{asset('js/map_single.js')}}"></script>

<!-- <script src="{{asset('js/jquery.sliderPro.min.js')}}"></script> -->
<script type="text/javascript">
   /* $( document ).ready(function( $ ) {
        $( '#Img_carousel').sliderPro({
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
            autoplay: false,
        });
        var slider = $('#Img_carousel').data( 'sliderPro' );
        slider.resize();
    });*/

</script>
@stop
@section('footer')
    @include('frontOffice.inc.footer')
@endsection
