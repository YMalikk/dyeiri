@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
@stop

@section('content')
   <section class="profile_page">


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
   </section>
@stop
@section('footer')
    @include('frontOffice.inc.footer')
@endsection