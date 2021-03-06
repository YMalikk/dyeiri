@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
@stop

@section('content')
    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="{{asset('plugins/fancyBox')}}/lib/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="{{asset('plugins/fancyBox')}}//source/jquery.fancybox.css?v=2.1.7" type="text/css" media="screen" />
    <script type="text/javascript" src="{{asset('plugins/fancyBox')}}//source/jquery.fancybox.pack.js?v=2.1.7"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="{{asset('plugins/fancyBox')}}/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <script type="text/javascript" src="{{asset('plugins/fancyBox')}}//source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="{{asset('plugins/fancyBox')}}//source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <link rel="stylesheet" href="{{asset('plugins/fancyBox')}}/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <script type="text/javascript" src="{{asset('plugins/fancyBox')}}//source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/images.css') }}"/>

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
        .page_content
        {
            border-top:1px solid black!important;
        }
        .container
        {
            margin-top:10px;
        }
        #user_information_form input[type=text],input[type=password]
        {
            width:250px!important;
        }
        #user_information_form
        {
            margin-left: -14px;
        }

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
        .photo_gallery
        {
           height: 250px;
           width: 250px;

        }
        nopad {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        /*image gallery*/
        .image-checkbox {
            cursor: pointer;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            border: 4px solid transparent;
            margin-bottom: 0;
            outline: 0;
        }
        .image-checkbox input[type="checkbox"] {
            display: none;
        }

        .image-checkbox-checked {
            border-color: #4cae4c;
        }
        .image-checkbox .fa {
            position: absolute;
            color: #4cae4c;
            border: 1px solid #4cae4c;
            background-color: #fff;
            padding: 10px;
            top: 3px;
            right: 18px;
        }
        .image-checkbox-checked .fa {
            display: block !important;
        }
    </style>
   <section class="page_content">
       <div class="container">
           <div class=" container col-md-12 col-xs-12">
               <ul class="nav nav-pills">
                   <li class="active"><a data-toggle="pill"  href="#account">Mon compte</a></li>
                   <li><a data-toggle="pill" href="#orders">Mes commandes</a></li>
                   <li class="pull-right">
                       @if($user->current_user==1)
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
       <div class="container margin_60_35 tab-content">
           <div id="account" class="tab-pane fade in active">
                <div class="row col-md-12 col-md-offset-1 col-xs-10 col-xs-offset-1 margin_30 col-sm-12 col-sm-offset-0">
                <div class="row">
                    <div class="col-md-4 col-xs-4 col-sm-4">
                        <img src="{{asset('img/user.jpg')}}" class="profile_img"/>
                    </div>
                    <div class="col-md-8 col-xs-12  col-sm-8">
                        <form method="POST" action="{{route('editProfile')}}" id="user_information_form">
                            {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="control-label col-sm-3">Nom<span class="text-danger"></span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group address_result">
                                    <input type="text" disabled="" class="form-control"  name="name"  id="name" required value="{{$user->name}}"/>
                                </div>
                                <small>Votre nom sera visible par tout les utilisateurs. </small> </div>
                         </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3">Prénom<span class="text-danger"></span></label>
                                <div class="col-md-8 col-sm-9">
                                    <div class="input-group address_result">
                                        <input type="text" disabled="" id="surname" name="surname" required class="form-control" value="{{$user->surname}}"/>
                                    </div>
                                    <small>Votre prénom sera visible par tout les utilisateurs. </small> </div>
                             </div>


                            <div class="form-group">
                                <label class="control-label col-sm-3">Email<span class="text-danger"></span></label>
                                <div class="col-md-8 col-sm-9">
                                    <div class="input-group address_result">
                                        <input type="text" disabled="" id="email"  name="email" required class="form-control" value="{{$user->email}}"/>
                                    </div>
                                    <small>Votre email n'est visible que par vous.</small> </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3">Address<span class="text-danger"></span></label>
                                <div class="col-md-8 col-sm-9">
                                    <div class="input-group address_result">
                                        <input type="text" disabled="" name="address" id="address" value="{{$user->address}}" class="form-control"/>
                                        <input type="hidden" name="lat" id="lat" value="{{$user->lat}}"/>
                                        <input type="hidden" name="lng" id="lng" value="{{$user->lng}}"/>
                                        <input type="hidden" name="city" id="city"/>
                                        <input type="hidden" name="country" id="country"/>
                                        </div>
                                    <small>Votre adresse va nous aidez à livrer votre commande chez vous.</small> </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-3">Password<span class="text-danger"></span></label>
                                <div class="col-md-8 col-sm-9">
                                    <div class="input-group address_result">
                                        <input type="password" disabled="" name="password" id="password" class="form-control"/>
                                    </div>
                                    <small>Votre prénom sera visible par tout les utilisateurs. </small> </div>
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
                <div class="row margin_10">
                    <div class="col-md-4 col-xs-4">
                        <div class="panel panel-default panel-profile">
                            <div class="panel-heading">
                                Informations vérifiées
                            </div>
                            <div class="panel-body">
                                <div class="panel-item">
                                    Email vérifier
                                </div>

                                <div class="panel-item">
                                   Cin Vérifier
                                </div>

                                <div class="panel-item">
                                   Numéro de téléphone
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 col-xs-12 col-sm-8">

                            <form action="{{route('handleUpdateWhichList')}}" method="POST">
                                    {!! csrf_field() !!}
                                <span class="wish_list">Liste des souhaits <span class="wish_list_count"> ({{count($activeWhichList)}})</span>
                                    <button type="button" class="btn btn-md btn-success fileinput-button editWhichList" style="margin-bottom: 10px;">
                        Modifier <i class="glyph-icon icon-edit"></i>
                      </button>

                                    <button type="submit" class="btn btn-md btn-success fileinput-button saveEdit" style="margin-bottom: 10px;display:none;">
                        Enregister <i class="glyph-icon icon-edit"></i>
                      </button>
                                        <div class="row col-xs-offset-1 col-md-offset-0">
                                    <div class="whichListUser">
                                    @foreach($activeWhichList as $which)
                                            <div class="col-lg-4 col-md-4 col-sm-6 nopad text-center">
                                     <label class="image-checkbox image-checkbox-checked">
                                         <img class="img-responsive photo_gallery" src="{{$which->which->image}}" />
                                         <input type="checkbox" name="selected" checked value="{{$which->which->id}}" />
                                         <i class="fa fa-check hidden"></i>
                                     </label>
                                            </div>


                                    @endforeach
                                     </div>
                                 <div style="display:none;" class="whichListSelected">

                             @foreach($whichList as $which)
                                 @if($which->status==1)

                                 <div class="col-lg-4 col-md-4 col-sm-6 nopad text-center">
                                     <label class="image-checkbox image-checkbox-checked">
                                         <img class="img-responsive photo_gallery" src="{{$which->which->image}}" />
                                         <input type="checkbox" checked name="image[]" value="{{$which->which->id}}" />
                                         <i class="fa fa-check hidden"></i>
                                     </label>
                                 </div>
                                 @else
                                     <div class="col-lg-4 col-md-4 col-sm-6 nopad text-center">
                                     <label class="image-checkbox">
                                         <img class="img-responsive photo_gallery" src="{{$which->which->image}}" />
                                         <input type="checkbox" name="image[]" value="{{$which->which->id}}" />
                                         <i class="fa fa-check hidden"></i>
                                     </label>
                                 </div>
                                 @endif
                             @endforeach

                         </div>
                                   </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
           </div>

        <div id="orders" class="tab-pane fade">
           <div class="row">
               <div class="col-md-12">
                   <div class="box_style_2" id="main_menu">
                       <h2 class="inner text-center">Mes Commandes</h2>
                       <div class="panel-group" id="accordion">
                           <div class="panel panel-default">
                               <div class="panel-heading" style="padding: 3px 25px!important;">
                                   <a class="accordion-toggle">
                                       <div class="row" style="display: flex;">
                                           <div class="col-md-3">
                                               <h4>Date</h4>
                                           </div>
                                           <div class="col-md-3">
                                               <h4>Chef</h4>
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
                                                   <h4>{{$order->chef->user->name}}</h4>
                                               </div>
                                               <div class="col-md-3">
                                                   @if($order->status == 0)
                                                       <h4><span class="label label-warning">En attente</span></h4>
                                                   @elseif($order->status == 1)
                                                       @if($order->message)
                                                           <h4 class="tooltip_styled tooltip-effect-4"><span class="label" style="background-color: lightseagreen">Confirmé par le chef</span>
                                                               <div class="fs1" style="display: inherit;" aria-hidden="true" data-icon="r"></div> <div class="tooltip-content">Le chef a laissé un message</div></h4>
                                                       @else
                                                           <h4 class="fs1 tooltip_styled tooltip-effect-4"><span class="label" style="background-color: lightseagreen">Confirmé par le chef</span>
                                                       @endif
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
                                                   <th class="text-center">Laisser un avis</th>
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
                                           @if($order->message)
                                               <div class="pull-left">
                                                   <h4>Message du Chef : </h4>
                                                   <h5>{{$order->message}}</h5>
                                               </div>
                                           @endif
                                           @if($order->status == 0)
                                               <button onclick="location.href={{route('denyOrderClient',['id' => $order->id])}}" class="btn_2 add_bottom_15 pull-right">Annulez la commande</button>
                                           @elseif($order->status == 1 && isset($order->message) && (\Carbon\Carbon::parse($order->updated_at)->diffInMinutes($now) < 15))
                                               <button onclick="location.href={{route('denyOrderClient',['id' => $order->id])}}" class="btn_2 add_bottom_15 pull-right">Annulez la commande</button>
                                           @else
                                               <button disabled="disabled" onclick="location.href={{route('denyOrderClient',['id' => $order->id])}}" class="btn_2 add_bottom_15 pull-right">Annulez la commande</button>
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
   </section>

   @foreach($orders as $order)
       @foreach($order->foods as $food)
           <?php $j=0; $plat=\App\Modules\Food\Models\Food::find($food->food_id) ?>
           <div class="modal fade" id="foodReview{{$order->id}}{{$plat->id}}" tabindex="-1" role="dialog" aria-labelledby="review" aria-hidden="true">
               <div class="modal-dialog">
                   <div class="modal-content modal-popup">
                       <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                       <form method="post" action="{{route('handleFoodReview',['food_id' => $plat->id])}}" name="review" style="width: 100%;max-width: 650px" class="popup-form">
                           {!! csrf_field() !!}
                           <div class="login_icon"><i class="icon_comment_alt"></i></div>
                               @if($order->status!=4)
                               <div class="row">
                                   <h4>Vous ne pouvez pas commenter ce plat</h4>
                                   <button href="#" class="btn btn-submit close-link" >Retour</button>
                                </div>
                               @else
                                   @foreach($foodOrderReviews as $foodOrderReview)
                                       @if($foodOrderReview->user_id == $user->id && $foodOrderReview->food_id == $plat->id
                                                && $foodOrderReview->order_id == $order->id)
                                            <?php $j=1; ?>
                                                <div class="review_strip_single">
                                                    <img src="{{asset('../storage/img/users/avatar/') . '/' . $user->image}}" alt="" class="img-circle" style="width: 80px">
                                                    <small> - {{date("j F Y",strtotime($foodOrderReview->created_at))}} -</small>
                                                    <h4>{{$user->name}} {{$user->surname}}</h4>
                                                    <p>
                                                        {{$foodOrderReview->content}}
                                                    </p>
                                                </div><!-- End review strip -->
                                                div class="row">
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
                                                <button href="#"  class="btn btn-submit close-link" >Retour</button>
                                        @endif
                                   @endforeach
                                   @if($j!=1)
                                       @foreach($types as $type)
                                                   <div class="stars" style="display:flex">
                                                       <div class="col-md-3 col-md-offset-2 col-xs-12" style="flex-wrap: wrap;align-items: center;display: flex;">
                                                           <?php if($type==1) echo "<label style='color: white;font-size: 16px'>Quantité</label>"; elseif($type == 2) echo "<label style='color: white;font-size: 16px'>Propreté</label>";elseif($type == 3) echo "<label style='color: white;font-size: 16px'>Rapidité</label>";elseif($type == 4) echo "<label style='color: white;font-size: 16px'>Prix</label>";?>
                                                       </div>
                                                       <div class="col-md-6 col-xs-12 col-sm-pull-4 col-xs-pull-4 col-md-pull-1 col-xss-6 col-xss-7">
                                                           <input class="star star-5" id="star-5-{{$order}}-{{$plat->id}}-{{$type}}" type="radio" value="5" name="star{{$type}}" />
                                                           <label class="star star-5" for="star-5-{{$order}}-{{$plat->id}}-{{$type}}"></label>
                                                           <input class="star star-4" id="star-4-{{$order}}-{{$plat->id}}-{{$type}}" type="radio" value="4" name="star{{$type}}" />
                                                           <label class="star star-4" for="star-4-{{$order}}-{{$plat->id}}-{{$type}}"></label>
                                                           <input class="star star-3" id="star-3-{{$order}}-{{$plat->id}}-{{$type}}" type="radio" value="3" name="star{{$type}}" />
                                                           <label class="star star-3" for="star-3-{{$order}}-{{$plat->id}}-{{$type}}"></label>
                                                           <input class="star star-2" id="star-2-{{$order}}-{{$plat->id}}-{{$type}}" type="radio" value="2" name="star{{$type}}" />
                                                           <label class="star star-2" for="star-2-{{$order}}-{{$plat->id}}-{{$type}}"></label>
                                                           <input class="star star-1" id="star-1-{{$order}}-{{$plat->id}}-{{$type}}" type="radio" value="1" name="star{{$type}}" />
                                                           <label class="star star-1" for="star-1-{{$order}}-{{$plat->id}}-{{$type}}"></label>
                                                       </div>
                                                   </div>
                                               @endforeach
                                           <!--End Row -->
                                       <input type="hidden" name="order_id" value="{{$order->id}}">
                                       <textarea name="review_text" id="review_text" class="form-control form-white" style="height:100px" placeholder="Donnez votre avis"></textarea>
                                       <button type="submit" class="btn btn-submit">Envoyer</button>
                                           <?php $j=0; ?>
                                       @endif
                               @endif
                       </form>
                   </div>
               </div>
           </div>

       @endforeach
   @endforeach
    <script>
        /*   $(document).ready(function() {
           $(".fancybox-button").fancybox({
                 prevEffect		: 'none',
                 nextEffect		: 'none',
                 closeBtn		: false,
                 'width'         : 940,
                 'height'        : 400,
                 helpers		: {
                     title	: { type : 'inside' },
                     buttons	: {}
                 }
             });

             $(".fancybox-logo").fancybox({
                 prevEffect		: false,
                 nextEffect		: false,
                 closeBtn		: false,
             });
         });*/
    </script>
   <script>
       $("#myonoffswitch").click(function()
       {
           window.location.replace("{{route('changeCurrentUser',array($user->current_user))}}");
       });

       $(document).on("click","#btn_edit_profile",function()
       {
            $("#email").removeAttr("disabled");
            $("#name").removeAttr("disabled");
            $("#surname").removeAttr("disabled");
            $("#name").removeAttr("disabled");
            $("#password").removeAttr("disabled");
            $("#address").removeAttr("disabled");
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
           $("#email").attr("disabled",true);
           $("#submit_form").css("display","none");
           $("#btn_cancel_edit").val("Modifier");
           $("#btn_cancel_edit").attr("id","btn_edit_profile");
       })
   </script>
    <script>
        // image gallery
        // init the state from the input
        $(".image-checkbox").each(function () {
            if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
                $(this).addClass('image-checkbox-checked');
            }
            else {
                $(this).removeClass('image-checkbox-checked');
            }
        });

        // sync the state to the input
        $(".image-checkbox").on("click", function (e) {
            $(this).toggleClass('image-checkbox-checked');
            var $checkbox = $(this).find('input[type="checkbox"]');
            $checkbox.prop("checked",!$checkbox.prop("checked"))

            e.preventDefault();
        });

        $(".editWhichList").click(function()
        {
                $(this).css('display','none');
                $(".saveEdit").css('display','block');
                $(".whichListSelected").css('display','block');
                $(".whichListUser").css('display','none');

        });
    </script>
@stop
@section('footer')
    @include('frontOffice.inc.footer')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCj1cCyUDGUciWPWK7kzjrxjLx4wDDS9c&libraries=places&callback=initAutocomplete"
            async defer></script>
@endsection
