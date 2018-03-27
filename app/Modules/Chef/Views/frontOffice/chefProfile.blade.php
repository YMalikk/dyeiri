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
                                <label><input type="radio" id="delivery" onchange="changeType(this.id)"  value="" checked name="option_2" class="icheck">Livraison</label>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <label><input type="radio" id="takeAway" onchange="changeType(this.id)" value=""  name="option_2" class="icheck">À emporter</label>
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
                        <div id="summary_review">
                            <div id="general_rating">
                                {{count($reviews)}} Reviews
                                <div class="rating">
                                    <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                </div>
                            </div>

                            <div class="row" id="rating_summary">
                                <div class="col-md-6">
                                    <ul>
                                        <li>Food Quality
                                            <div class="rating">
                                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i>
                                            </div>
                                        </li>
                                        <li>Price
                                            <div class="rating">
                                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li>Punctuality
                                            <div class="rating">
                                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i>
                                            </div>
                                        </li>
                                        <li>Courtesy
                                            <div class="rating">
                                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- End row -->
                            <hr class="styled">
                            <a href="#" class="btn_1 add_bottom_15" data-toggle="modal" data-target="#myReview">Poster un avis</a>
                        </div><!-- End summary_review -->

                        @foreach($reviews as $review)
                            <div class="review_strip_single">
                            <img src="" alt="" class="img-circle">
                            <small> - {{$review->created_at}} -</small>
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

                        <div class="review_strip_single last">
                            <img src="" alt="" class="img-circle">
                            <small> - 10 April 2015 -</small>
                            <h4>Frank Cooper</h4>
                            <p>
                                "Ne mea congue facilis eligendi, possit utamur sensibus id qui, mel tollit euismod alienum eu. Ad tollit lucilius praesent per, ex probo utroque placerat eos. Tale verear efficiendi et cum, meis timeam vix et, et duis debet nostro mel. Aeterno labitur per no, id nec tantas nemore. An minim molestie per, mei sumo vulputate cu."
                            </p>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i>
                                    </div>
                                    Food Quality
                                </div>
                                <div class="col-md-3">
                                    <div class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i>
                                    </div>
                                    Price
                                </div>
                                <div class="col-md-3">
                                    <div class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i>
                                    </div>
                                    Punctuality
                                </div>
                                <div class="col-md-3">
                                    <div class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i>
                                    </div>
                                    Courtesy
                                </div>
                            </div><!-- End row -->
                        </div><!-- End review strip -->

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
                <div class="row">
                    <div class="col-md-6">
                        <select class="form-control form-white" name="amount_review" id="amount_review">
                            <option value="0">Quantité</option>
                            <option value="1">Peu</option>
                            <option value="2">Suffisante</option>
                            <option value="3">Bonne</option>
                            <option value="4">Excellente</option>
                            <option value="5">Super</option>
                            <option value="0">Je ne sais pas</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control form-white"  name="clean_review" id="clean_review">
                            <option value="0">Propreté</option>
                            <option value="1">Sale</option>
                            <option value="2">Peu sale</option>
                            <option value="3">Propre</option>
                            <option value="4">Excellente</option>
                            <option value="5">Super</option>
                            <option value="0">Je ne sais pas</option>
                        </select>
                    </div>
                </div><!--End Row -->

                <div class="row">
                    <div class="col-md-6">
                        <select class="form-control form-white"  name="speed_review" id="speed_review">
                            <option value="0">Rapidité</option>
                            <option value="1">Lente</option>
                            <option value="2">Moyenne</option>
                            <option value="3">Bonne</option>
                            <option value="4">Excellente</option>
                            <option value="5">Super</option>
                            <option value="0">Je ne sais pas</option>
                        </select>                       </div>
                    <div class="col-md-6">
                        <select class="form-control form-white"  name="price_review" id="price_review">
                            <option value="0">Prix</option>
                            <option value="1">Trop Cher</option>
                            <option value="2">Cher</option>
                            <option value="3">Moyennement Cher</option>
                            <option value="4">Peu Cher</option>
                            <option value="5">Bon marché</option>
                            <option value="0">Je ne sais pas</option>
                        </select>
                    </div>
                </div><!--End Row -->
                <textarea name="review_text" id="review_text" class="form-control form-white" style="height:100px" placeholder="Donnez votre avis"></textarea>
              <!--  <input type="text" id="verify_review" class="form-control form-white" placeholder="Are you human? 3 + 1 ="> -->
                <input type="submit" value="Envoyer" class="btn btn-submit" id="submit-review">
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
        setInterval(function(){
            if(document.getElementById("delivery").parentElement.classList.contains("checked"))
            {
                $("#deliveryFees").css('display','grid');
                /*total = parseInt($("#orderTotal").text());
                total+=4;*/
                //$("#orderTotal").text("4");
            }
            else
            {
                $("#deliveryFees").css('display','none');
                //$("#orderTotal").text("0");
            }
        }, 100);
    });

    var compteur=0;
    var compteurLigne=0;

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
        if(compteur===1)
            totalPrice+=4;
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
        jQuery("#Img_carousel").sliderPro("resize");
    });
</script>

<script src="{{asset('js/map_single.js')}}"></script>

<script src="{{asset('js/jquery.sliderPro.min.js')}}"></script>
<script type="text/javascript">
    $( document ).ready(function( $ ) {
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
    });

</script>
@stop
@section('footer')
    @include('frontOffice.inc.footer')
@endsection
