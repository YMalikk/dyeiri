@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
@stop

@section('content')
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
                <div class="row col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 margin_30 col-sm-12 col-sm-offset-0">
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
                                <label class="control-label col-sm-3">Adresse<span class="text-danger"></span></label>
                                <div class="col-md-8 col-sm-9">
                                    <div class="input-group address_result">
                                        <input type="text" disabled="" id="address" required class="form-control" value="{{$user->surname}}"/>
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
                        <span class="wish_list">Liste des souhaits <span class="wish_list_count"> (3)</span></span>
                         <div class="row col-xs-offset-1 col-md-offset-0">
                             <div class="col-md-4 col-sm-4">
                                    <img src="{{asset('img/user.jpg')}}" style="width: 160px"/>
                             </div>

                             <div class="col-md-4 col-sm-4">
                                 <img src="{{asset('img/user.jpg')}}" style="width: 160px"/>
                             </div>

                             <div class="col-md-4 col-sm-4">
                                 <img src="{{asset('img/user.jpg')}}" style="width: 160px"/>
                             </div>
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
                                           @if($order->status == 0)
                                               <button onclick="location.href={{route('denyOrderClient',['id' => $order->id])}}" class="btn_2 add_bottom_15 pull-right">Annulez la commande</button>
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
           <?php $i=0; $plat=\App\Modules\Food\Models\Food::find($food->food_id) ?>
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
                                   <input href="#" value="Retour" class="btn btn-submit close-link" >
                                </div>
                               @else
                                   @foreach($foodOrderReviews as $foodOrderReview)
                                       @if($foodOrderReview->user_id == $user->id && $foodOrderReview->food_id == $plat->id
                                                && $foodOrderReview->order_id == $order->id)
                                            <?php $i=1; ?>
                                                <div class="review_strip_single">
                                                    <img src="{{asset('../storage/img/users/avatar/') . '/' . $user->image}}" alt="" class="img-circle" style="width: 80px">
                                                    <small> - {{date("j F Y",strtotime($foodOrderReview->created_at))}} -</small>
                                                    <h4>{{$user->name}} {{$user->surname}}</h4>
                                                    <p>
                                                        {{$foodOrderReview->content}}
                                                    </p>
                                                </div><!-- End review strip -->
                                                <input href="#" value="Retour" class="btn btn-submit close-link" >
                                        @endif
                                   @endforeach
                                   @if($i!=1)
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
                                   </div>
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
                                   <input type="hidden" name="order_id" value="{{$order->id}}">
                               <textarea name="review_text" id="review_text" class="form-control form-white" style="height:100px" placeholder="Donnez votre avis"></textarea>
                               <button type="submit" class="btn btn-submit">Envoyer</button>
                                       <?php $i=0; ?>
                                       @endif
                               @endif
                       </form>
                   </div>
               </div>
           </div>

       @endforeach
   @endforeach
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
           $("#submit_form").css("display","none");
           $("#btn_cancel_edit").val("Modifier");
           $("#btn_cancel_edit").attr("id","btn_edit_profile");
       })
   </script>
@stop
@section('footer')
    @include('frontOffice.inc.footer')
@endsection
