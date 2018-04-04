@extends('backOffice.layout')

@section('head')
    @include('backOffice.inc.head')
@endsection

@section('header')

@endsection

@section('content')
    <style>
        .mrg58A
        {
            margin-top:58px;
        }

        .text_header_border
        {
            border-top-color:#8c6fb0;
        }

        .connexion_btn
        {
            margin-left:-8px;
        }
        #page-content
        {
            margin-left:auto!important;
        }
    </style>
    <div class="mrg58A"></div>
    <div class="col-md-4 center-margin">

        <h3 class="text-center pad15B  font-size-23">Connexion administrateur</h3>

        <div class="content-box border-top text_header_border clearfix">
            <div class="content-box-wrapper row">

                <form action="{{route('handleAdminLogin')}}" method="POST" id="login-validation">
                    {!! csrf_field() !!}
                    <div id="login-form">
                        <div class="pad20A">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email :</label>
                                <div class="input-group input-group-lg">
                                        <span class="input-group-addon addon-inside bg-white font-primary">
                                            <i class="glyph-icon icon-envelope-o"></i>
                                        </span>
                                    <input type="email" value="{{old('email')}}"  name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mote de passe :</label>
                                <div class="input-group input-group-lg">
                                        <span class="input-group-addon addon-inside bg-white font-primary">
                                            <i class="glyph-icon icon-unlock-alt"></i>
                                        </span>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Mot de passe">
                                </div>
                            </div>
                            <div class="row mrg15B">
                                <div class="checkbox-primary col-md-10" style="height: 20px;">
                                    <label>
                                        <input type="checkbox" name="remember_me" id="loginCheckbox1" class="custom-checkbox">
                                        Se souvenir de moi
                                    </label>
                                </div>
                            </div>

                            <div class="row mrg15B">
                                <div class="checkbox-primary col-md-10" style="height: 20px;">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn col-md-6 btn-blue-alt custom_btn connexion_btn">Connexion</button>
                           </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection