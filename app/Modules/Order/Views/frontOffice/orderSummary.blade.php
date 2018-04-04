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
    <link href="{{asset('css/lteStyles.css')}}" rel="stylesheet">
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
            <li><a href="{{route('showChefProfile')}}">Votre commande</a></li>
        </ul>
    </div>
</div><!-- Position -->

<!-- Content ================================================== -->
<div class="container margin_60_35 tab-content">
    <form method="POST" action="{{ route('handleOrder',['chef' => $chef->id])}}"  id="orderForm" enctype="multipart/form-data" class="invoice invoiceBorder">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {!! csrf_field() !!}
        @if ($errors)
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-cutlery"></i>&nbsp;&nbsp;Votre Panier
                    <small class="pull-right">Date: {{date("j F Y",strtotime($todayDate))}}  </small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <?php $i=0;$totalPrice=0;$delai=0;?>
        @if(count($foods)>0)
            @foreach($foods as $key => $food)
                @if($food->category_id == 2 || $food->category_id == 5 )
                    <?php $delai=1; ?>
                @endif
                <input type="hidden" name="foods[]" value="{{$food->id}}">
                <input type="hidden" name="quantities[]" value="{{$quantities[$key]}}">
                <input type="hidden" name="type" value="{{$type}}">
                <div class="row invoice-info invoiceInfo">
                    <div class="col-sm-3 invoice-col">
                        Chef
                        <address>
                            <strong>{{$chef->user->name}} {{$chef->user->surname}}</strong><br>
                        </address>
                        <div class="image restaurantLogoInvoice">
                            <img src="{{ asset("/img/thumb_restaurant.jpg")}}" class="dishImg img-circle" alt="User Image" />
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 invoice-col">
                        Plat
                        <address>
                            <strong>{{$food->name}}</strong><br>
                        </address>
                        <div class="image restaurantLogoInvoice">
                            <img src="{{ asset("/img/slider_single_restaurant/4_small.jpg")}}" style="width: 80%" class="dishImg" alt="User Image" />
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-2 invoice-col">
                        Prix<br>
                        <address>
                            <strong> (unitaire)</strong><br>
                        </address>
                        <address class="marginTop15Font30">
                            <strong>{{$food->price}} DT</strong><br>
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-2 invoice-col">
                        Quantité<br>
                        <address>
                            <strong></strong><br>
                        </address>
                        <address class="marginTop15Font30">
                            <strong>&nbsp;{{$quantities[$key]}}x</strong><br>
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-2 invoice-col">
                        Temps de préparation<br>
                        <address>
                            <strong>(minutes)</strong><br>
                        </address>
                        <address class="marginTop15Font30">
                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$food->preparation_time}} min</strong><br>
                        </address>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <hr>
            @endforeach

            <div class="row fontLargerMargin">
                <div class="col-xs-6">
                    @if($type=="delivery")
                        <div class="col-md-12">
                            <h3 class="text-center">Selectionner le créneau de livraison</h3>
                            <div class="styled-select" style="text-align: -webkit-center;">
                                <select class="form-control" name="deliveryTime" id="lang" style="width: 50%;text-align-last: center;">
                                    @foreach($deliveryTimes as $deliveryTime)
                                        <option value="{{$deliveryTime->id}}">{{$deliveryTime->time}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3 class="text-center">Selectionner l'adresse de livraison</h3>
                            @if($currentUser->address!=null)
                                <div class="styled-select" style="text-align: -webkit-center;">
                                    <input type="text" class="form-control search-query" name="address" style="width: 50%" id="address" value="{{$currentUser->address}}">
                                    <input type="hidden" name="lat" id="lat" value="{{$currentUser->lat}}"/>
                                    <input type="hidden" name="lng" id="lng" value="{{$currentUser->lng}}"/>
                                    <h4>Ou</h4>
                                    <span class="input-group-addon btn_localise" title="Se localiser" style="width: 50%;border-bottom-left-radius: 5px;border-top-left-radius: 5px;">
                                    <span id="arround_me_value"></span>
                                    <span class="fa fa-location-arrow"  aria-hidden="true"> </span></span>
                                </div>
                            @else
                                <div class="styled-select">
                                    <input type="text" class="form-control search-query" name="address" style="width: 50%" id="address" placeholder="Où voulez-vous etre livré ?">
                                    <input type="hidden" name="lat"  id="lat"/>
                                    <input type="hidden" name="lng" id="lng"/>
                                    <h4>Ou</h4>
                                    <span class="input-group-addon btn_localise" title="Se localiser" style="width: 50%;border-bottom-left-radius: 5px;border-top-left-radius: 5px;">
                                    <span id="arround_me_value"></span>
                                    <span class="fa fa-location-arrow"  aria-hidden="true"></span></span>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="col-xs-6">
                    <p class="lead colorInfo"><b>A payer</b></p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th class="width50">Prix plats:</th>
                                <td>{{$price}} DT</td>
                                <input type="hidden" name="price" value="{{$price}}">
                            </tr>
                            <tr>
                                <th>Frais de livraison:</th>
                                @if($type=="delivery")
                                    <td>4 DT</td>
                                @else
                                    <td>0 DT (à emporter)</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <?php if($type=="delivery") $p=$price+4; else $p=$price; ?>
                                <td><?php echo $p;?> DT</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row no-print">
                <div class="col-xs-12">
                    @if($delai==0)
                        <button  type="submit" class="btn btn-success pull-right"><i class="fa fa-check-circle-o"></i>&nbsp;&nbsp;Confirmez commande</button>
                        <button onclick="location.href='{{route('showChefSearchedProfile',['id' => $chef->id])}}'" type="button" class="btn btn-primary pull-right" style="margin-right: 5px">
                            <i class="fa fa-times-circle"></i>&nbsp;&nbsp;Annulez
                        </button>
                    @else
                        @if($todayDate->toTimeString() > $plateform->time_limit)
                            <button  type="submit" disabled="disabled" class="btn btn-success pull-right"><i class="fa fa-check-circle-o"></i>&nbsp;&nbsp;Confirmez commande</button>
                            <button onclick="location.href='{{route('showChefSearchedProfile',['id' => $chef->id])}}'" type="button" class="btn btn-primary pull-right" style="margin-right: 5px">
                                <i class="fa fa-times-circle"></i>&nbsp;&nbsp;Annulez
                            </button>
                            <div class="col-md-12" style="text-align: right;margin-top: 10px;padding: 0;">
                                <h4 style="color: red"><i class="fa fa-exclamation-circle deadLineOver" aria-hidden="true"></i>
                                Vous avez depassé le delai de prise de commande !</h4>
                            </div>
                        @else
                            <button  type="submit" class="btn btn-success pull-right"><i class="fa fa-check-circle-o"></i>&nbsp;&nbsp;Confirmez commande</button>
                            <button onclick="location.href='{{route('showChefSearchedProfile',['id' => $chef->id])}}'" type="button" class="btn btn-primary pull-right" style="margin-right: 5px">
                                <i class="fa fa-times-circle"></i>&nbsp;&nbsp;Annulez
                            </button>
                        @endif
                    @endif
                </div>
            </div>
        @else
            <h2 class="page-header"> Vous n'avez pas encore choisi de plat</h2>
        @endif
    </form>

</div><!-- End container -->
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
</script>

<!-- SPECIFIC SCRIPTS -->
<script  src="{{asset('js/cat_nav_mobile.js')}}"></script>
<script>$('#cat_nav').mobileMenu();</script>
<script src="{{asset('js/theia-sticky-sidebar.js')}}"></script>
<script src="{{asset('js/map_single.js')}}"></script>

<script src="{{asset('js/jquery.sliderPro.min.js')}}"></script>
@stop
@section('footer')
    @include('frontOffice.inc.footer')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCj1cCyUDGUciWPWK7kzjrxjLx4wDDS9c&libraries=places&callback=initAutocomplete"
            async defer></script>
    <script>
        $(document).ready(function(){
         $("#orderForm").on("submit",function()
         {
             $("#address").removeAttr('disabled');
         });

        });
    </script>
@endsection
