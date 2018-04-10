@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
@stop

@section('content')
    <link rel="stylesheet" href="{{ asset ('plugins/intlTelInput/css')}}/intlTelInput.css"/>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="{{ asset ('plugins/intlTelInput/js')}}/intlTelInput.js"></script>
    <!-- Radio and check inputs -->
    <link href="{{asset('css/skins/square/grey.css')}}" rel="stylesheet">
<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_cart.jpg" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
        <div id="sub_content">
            <h1>Travaillez avec nous</h1>
            <p>Qui debitis meliore ex, tollit debitis conclusionemque te eos.</p>
            <p></p>
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

<div id="position">
    <div class="container">
        <ul>
            <li><a href="{{route('showHome')}}">Home</a></li>
            <li><a href="{{route('showDeliveryRegister')}}">Devnir un livreur</a></li>
        </ul>
        <a href="#0" class="search-overlay-menu-btn"></a>
    </div>
</div><!-- Position -->

<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="main_title margin_mobile">
        <h2 class="nomargin_top">Travail flexible et frais importants.</h2>
        <p>
            Quand ils deviennent des citoyens instruits dans le financement dissuadé.
        </p>
    </div>
    <div class="row">
        <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
            <div class="feature_2">
                <i class="icon_currency"></i>
                <h3>Grands frais.</h3>
                <p>
                    Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                </p>
            </div>
        </div>
        <div class="col-md-6 wow fadeIn" data-wow-delay="0.2s">
            <div class="feature_2">
                <i class="icon_easel"></i>
                <h3>Growing possibility</h3>
                <p>
                    Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                </p>
            </div>
        </div>
    </div><!-- End row -->
    <div class="row">
        <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
            <div class="feature_2">
                <i class="icon_mobile"></i>
                <h3>Manage your own orders via App</h3>
                <p>
                    Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                </p>
            </div>
        </div>
        <div class="col-md-6 wow fadeIn" data-wow-delay="0.4s">
            <div class="feature_2">
                <i class="icon_map_alt"></i>
                <h3>Work in a small area</h3>
                <p>
                    Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                </p>
            </div>
        </div>
    </div><!-- End row -->
    <div class="row">
        <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
            <div class="feature_2">
                <i class="icon_clock_alt"></i>
                <h3>Flexible time</h3>
                <p>
                    Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                </p>
            </div>
        </div>
        <div class="col-md-6 wow fadeIn" data-wow-delay="0.6s">
            <div class="feature_2">
                <i class="icon_calendar"></i>
                <h3>Flexible days</h3>
                <p>
                    Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                </p>
            </div>
        </div>
    </div><!-- End row -->
</div><!-- End container -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 nopadding features-intro-img">
            <div class="features-bg img_2">
                <div class="features-img">
                </div>
            </div>
        </div>
        <div class="col-md-6 nopadding">
            <div class="features-content">
                <h3>"Ce dont tu auras besoin"</h3>
                <ul class="list_ok">
                    <li>Un vélo ou un scooter / une moto avec un équipement de sécurité approprié (la sécurité routière est une obligation pour nous!).</li>
                    <li>Smartphone - iPhone 4s ou supérieur ou Android 4.3 ou supérieur.</li>
                    <li>Le droit de travailler aux Tunisie.</li>
                </ul>
            </div>
        </div>
    </div>
</div><!-- End container-fluid  -->

<div class="container margin_60">
    <div class="main_title margin_mobile">
        <h2 class="nomargin_top">Merci de soumettre le formulaire ci-dessous</h2>

    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="{{route('handleDeliveryRegister')}}" method="POST" >
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text"  class="form-control" id="name_contact" required name="name">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" class="form-control" id="lastname_contact" required name="surname">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" id="email_contact" name="email" required class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Numéro de téléphone:</label>
                            <input type="tel" id="tel_int" required name="phone_contact" class="form-control">
                            <input id="code_tel_int" type="hidden" name="code_tel"/>
                            <input name="mobile" type="hidden" id="my_mobile"/>
                            <input type="hidden" name="pays" id="my_pays"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>Avez-vous une bicyclette, un scooter , ou une voiture ?</h5>
                            <label><input name="motor" type="radio" required value="1" class="icheck" checked>Bicyclette</label>
                            <label><input name="motor" type="radio" required value="2" class="icheck">Scooter</label>
                            <label><input name="motor" type="radio" required value="3" class="icheck">Voiture</label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>Êtes-vous un étudiant?</h5>
                            <label><input name="student" type="radio" required value="1" class="icheck" checked>Yes</label>
                            <label class="margin_left"><input name="student" required type="radio" value="0" class="icheck">No</label>
                        </div>
                    </div>
                </div><!-- End row  -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>Avez-vous un permis de conduire?</h5>
                            <label><input name="license" type="radio" value="1"  required class="icheck" checked>Yes</label>
                            <label class="margin_left"><input name="license" required type="radio" value="0" class="icheck">No</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>Avez-vous un iPhone ou un mobile Android?</h5>
                            <label><input name="smartphone" type="radio" value="1" required class="icheck" checked>iPhone</label>
                            <label class="margin_left"><input name="smartphone" required type="radio" value="2" class="icheck">Android</label>
                        </div>
                    </div>
                </div><!-- End row  -->
                <hr style="border-color:#ddd;">
                <div class="text-center"><button class="btn_full_outline">Valider</button></div>
            </form>
        </div><!-- End col  -->
    </div><!-- End row  -->
</div><!-- End container  -->
<!-- End Content =============================================== -->
    <script>

        $.get("http://ipinfo.io", function(response) {
            $("#tel_int").intlTelInput({
                initialCountry: response.country.toLowerCase(),
                utilsScript:'plugins/intlTelInput/js/utils.js',
                separateDialCode: false
            });
            $(".intl-tel-input").css('display','block');
        }, "jsonp");


    </script>
@stop
@section('footer')
    @include('frontOffice.inc.footer')
@endsection