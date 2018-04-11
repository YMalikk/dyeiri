@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
@stop

@section('content')
<!-- Content ================================================== -->
<section >
    <div class="row chef_register page_content">
        <div class="col-md-4 pull-right col-xs-12 page_content">
            <div class="main_title">
                <h2 class="nomargin_top chef_register_title">Inscrivez-vous</h2>

                <span class="second_title_register">Veuillez entrer vos informations.</span>

            </div>

            <form action="{{route('handleChefRegister')}}" method="POST" class="popup-form" id="myRegister">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <a class="btn btn-block btn-social btn-facebook">
                            <span class="glyph-icon icon-facebook"></span> Inscription
                        </a>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <a class="btn btn-block btn-social btn-google">
                            <span class="glyph-icon icon-googleplus"></span> Inscription
                        </a>
                    </div>
                </div>
                <input type="text" class="form-control form-white" name="surname" required placeholder="Prenom">
                <input type="text" class="form-control form-white" name="name" required placeholder="Nom">
                <select class="form-control" required name="gender">
                    <option value="1">Homme</option>
                    <option value="2">Femme</option>
                </select>
                <input type="email" class="form-control form-white" name="email" required placeholder="Email">
                <input type="password" class="form-control form-white" name="password" required placeholder="Mot de passe" id="password1">
                <input type="password" class="form-control form-white" name="password2" required placeholder="Confirme mot de passe" id="password2">
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

</section><!-- End container -->

<!-- End Content =============================================== -->

@stop
@section('footer')
    @include('frontOffice.inc.footer')
@endsection
