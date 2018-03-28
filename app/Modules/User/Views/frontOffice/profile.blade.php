@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
@stop

@section('content')
   <section class="page_content">
       <div class="container">
           <div class=" container col-md-5 col-xs-12">
               <ul class="nav nav-pills">
                   <li class="active"><a data-toggle="pill"  href="#account">Mon compte</a></li>
                   <li><a data-toggle="pill" href="#orders">Mes commande</a></li>
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
                    <div class="col-md-8 col-xs-12 user_information col-sm-8">
                        <span class="username">Bonjour je m'appelle Yousfi Malik</span><br/><br/>
                        <span class="address">Ariana 23 zéro nahj la3mé, membre depuis 20/10/2018</span><br/><br/>
                        <span class="report_user"><a href="#"><i class="icon icon-flag h4"></i> Signaler ce client</a></span><br/><br/>
                        <span class="user_verified"><i class="fa fa-check"></i> Vérifier</span>
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
                       <h3 class="nomargin_top" id="starters">Commandes</h3>
                       <p>
                           Te ferri iisque aliquando pro, posse nonumes efficiantur in cum. Sensibus reprimique eu pro. Fuisset mentitum deleniti sit ea.
                       </p>
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
           <?php $plat=\App\Modules\Food\Models\Food::find($food->food_id) ?>
           <div class="modal fade" id="foodReview{{$order->id}}{{$plat->id}}" tabindex="-1" role="dialog" aria-labelledby="review" aria-hidden="true">
               <div class="modal-dialog">
                   <div class="modal-content modal-popup">
                       <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                       <form method="post" action="" name="review" style="width: 100%;max-width: 650px" class="popup-form">
                           <div class="login_icon"><i class="icon_comment_alt"></i></div>
                           <div class="row">
                               @if($order->status!=4)
                                   <h4>Vous ne pouvez pas commenter ce plat</h4>
                               @else
                                   <div class="review_strip_single">
                                    Votre commentaire
                                   </div>
                               @endif
                           </div><!--End Row -->
                           <input type="submit" value="Envoyer" class="btn btn-submit" id="submit-review">
                       </form>
                   </div>
               </div>
           </div>
       @endforeach
   @endforeach
@stop
@section('footer')
    @include('frontOffice.inc.footer')
@endsection
