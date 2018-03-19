@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
@stop

    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="home" data-parallax="scroll" data-image-src="{{asset('img')}}/sub_header_home.jpg" data-natural-width="1400" data-natural-height="550">
        <div id="subheader">
            <div id="sub_content">
                <h1>Order Takeaway or Delivery Food</h1>
                <p>
                    Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.
                </p>
                <form method="post" action="http://www.ansonika.com/quickfood/list_page.html">
                    <div id="custom-search-input">
                        <div class="input-group ">
                            <input type="text" class=" search-query" placeholder="Your Address or postal code">
                            <span class="input-group-btn">
                        <input type="submit" class="btn_search" value="submit">
                        </span>
                        </div>
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



@section('content')

<!-- Content ================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="background-image: url({{ asset('img/slider_single_restaurant') }}/3_large.jpg);">
            <div class="main_title">
                <h2 class="nomargin_top" style="padding-top:0">Inscription en tant que Chef</h2>
                <p>
                    Veuillez entrer vos informations.
                </p>
            </div>
            <form action="{{route('handleChefRegister')}}" method="POST" class="popup-form" id="myRegister">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <input type="text" class="form-control form-white" name="surname" placeholder="Prenom">
                <input type="text" class="form-control form-white" name="name" placeholder="Nom">
                <input type="email" class="form-control form-white" name="email" placeholder="Email">
                <input type="password" class="form-control form-white" name="password" placeholder="Mot de passe" id="password1">
                <input type="password" class="form-control form-white" name="password2" placeholder="Confirme mot de passe" id="password2">
                <div id="pass-info" class="clearfix"></div>
                <div class="checkbox-holder text-left">
                    <div class="checkbox">
                        <input type="checkbox" value="accept_2" id="check_2" name="check_2">
                        <label for="check_2"><span>J'accepte les <strong>Termes &amp; Conditions</strong></span></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-submit">S'inscrire</button>
            </form>
        </div>
    </div><!-- End row -->

</div><!-- End container -->

<!-- End Content =============================================== -->

@stop
@section('footer')
    @include('frontOffice.inc.footer')
@endsection
