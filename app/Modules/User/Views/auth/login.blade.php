@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
@stop

@section('content')
    <div>
                <form action="{{route('handleConnection')}}" method="POST" class="popup-form" id="myLogin">
                    {!! csrf_field() !!}
                    <div class="login_icon"><i class="icon_lock_alt"></i></div>
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <a href="{{ route('authenticate',array('facebook')) }}" class="btn btn-block btn-social btn-facebook">
                                <span class="glyph-icon icon-facebook"></span> Facebook
                            </a>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <a href="{{ route('authenticate',array('google')) }}" class="btn btn-block btn-social btn-google">
                                <span class="glyph-icon icon-googleplus"></span> Google Plus
                            </a>
                        </div>
                    </div>
                    <input type="email" name="email"  class="form-control form-white" placeholder="Email">
                    <input type="password" name="password" class="form-control form-white" placeholder="Mot de passe">
                    <div class="text-left">
                        <a href="#">Mot de passe oublié?</a>
                    </div>
                    <button type="submit" class="btn btn-submit">Connexion</button>
                </form>
    </div><!-- End modal -->

@stop
@section('footer')
    @include('frontOffice.inc.footer')
@endsection
