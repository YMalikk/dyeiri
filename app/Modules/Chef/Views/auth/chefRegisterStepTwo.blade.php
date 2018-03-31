@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
@stop

@section('content')
    <link rel="stylesheet" href="{{asset('css/wizardForm.css')}}"/>
    <link rel="stylesheet" href="{{ asset ('plugins/intlTelInput/css')}}/intlTelInput.css"/>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="{{ asset ('plugins/intlTelInput/js')}}/intlTelInput.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link href="https://valor-software.com/ngx-bootstrap/assets/css/glyphicons.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/timepicker/timepicker.css">
<style>
    .update_img
    {
        display:none!important;
    }

    .toggle
    {
        width: 116px!important;
    }

    .mrg-18
    {
        margin-top: -18px;
    }
    .timepicker
    {
        width: 102px!important;
    }
    section
    {
        height: -webkit-fill-available;
    }
    .glyph-icon {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }


    .icon-chevron-up:before {
        content: "\f077";
    }

    .icon-chevron-down:before {
        content: "\f078";
    }

    #cover_photo_change
    {
        width: 314px;
        height: 166px;
    }

    #user_image_change
    {
        width: 146px;
        height: 146px;
    }

    #cover_photo_change_result
    {
        width: 314px;
        height: 166px;
    }

    #user_image_change_result
    {
        width: 146px;
        height: 146px;
    }
</style>

    <!-- Content ================================================== -->
    <section >
        <div class="page_content">
            <div class="col-md-10 col-md-offset-1 col-xs-offset-0 col-xs-12">
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active">
                                <a href="#step1" class="stepOne" data-toggle="tab" aria-controls="step1" role="tab" title="Etape 1">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-folder-open"></i>
                                </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" class="stepTwo" aria-controls="step2" role="tab" title="Etape 2">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" class="stepThree" aria-controls="step3" role="tab" title="Etape 3">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-picture"></i>
                                </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#complete" data-toggle="tab" class="stepFour" aria-controls="complete" role="tab" title="Récapitulatif">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form role="form" id="completeRegisterForm" class="form-horizontal" action="{{route('handleCompleteRegisterChef')}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <span class="title">Information personnelles</span>
                                <div class="wizard_content">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Numéro de téléphone <span class="text-danger"></span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <div class="input-group">
                                            <input type="tel" id="tel_int" class="form-control" required />
                                            <input id="code_tel_int" type="hidden" name="code_tel"/>
                                            <input name="mobile" type="hidden" id="my_mobile"/>
                                            <input type="hidden" name="pays" id="my_pays"/>
                                        </div>
                                        <small>Votre numéro est obligatoire pour la confirmation de votre compte.</small> </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3">Adresse<span class="text-danger"></span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="address" name="address" required placeholder="votre adresse">
                                            <input type="hidden" name="lat"  id="lat"/>
                                            <input type="hidden" name="lng" id="lng"/>
                                            <input type="hidden" name="city" id="city"/>
                                            <input type="hidden" name="country" id="country"/>
                                        </div>
                                        <small>Votre address nous aide à vous localisez facilement pour la recherche.</small> </div>
                                </div>
                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" id="valid_setp_1" class="btn btn-primary next-step">Continuer</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <span class="title">Horaires</span>
                                    <div class="wizard_content">

                                    <div class="form-group">
                                    <label for="" class="col-sm-2 my-control-labe col-xs-2 mrg20T">Lundi</label>
                                    <div class="col-sm-8">
                                        <div class="clearfix row">
                                            <div class="col-md-12" style="display: flex;">
                                                @if($chef->schedule[0]->status==1)

                                                    <input type="checkbox" name="mondayCheckbox" data-onstyle="success"  data-offstyle="danger" class="toggle_disponibility toggle col-md-4" checked data-toggle="toggle"  data-on="Ouvert" data-off="Fermé"/>

                                                        <div class="col-md-4 mrg-18">

                                                            <label>      Ouverture :</label>
                                                            <input type="text" name="mondayStart" id="startMonday" placeholder="" class="timepicker float-left  form-control ">
                                                        </div>
                                                        <div class="col-md-4 mrg-18">
                                                            <label>    Fermeture :</label>
                                                            <input type="text" name="mondayEnd" id="endMonday" placeholder="" class="timepicker float-left form-control  pull-left">
                                                        </div>

                                                @else

                                                    <input type="checkbox" name="mondayCheckbox" data-onstyle="success" data-offstyle="danger" class="toggle_disponibility toggle col-md-4"  data-toggle="toggle"  data-on="Ouvert" data-off="Fermé"/>
                                                    <div style="display:none;">

                                                        <div class="col-md-4 mrg-18">
                                                           <label> Ouverture :</label>
                                                            <input type="text" name="mondayStart" id="startMonday" placeholder="" class="timepicker float-left  form-control ">
                                                        </div>
                                                        <div class="col-md-4 mrg-18" >
                                                            <label>  Fermeture :</label>
                                                            <input type="text" name="mondayEnd" id="endMonday" placeholder="" class="timepicker float-left  form-control pull-left">
                                                        </div>
                                                        </div>

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <label for="" class="col-sm-2"> Mardi </label>
                                    <div class="col-sm-8">
                                    <div class="clearfix row">
                                        <div class="col-md-12" style="display: flex;">
                                            @if($chef->schedule[1]->status==1)

                                                <input type="checkbox" name="tuesdayCheckbox" data-onstyle="success"  data-offstyle="danger" class="toggle_disponibility toggle col-md-4" checked data-toggle="toggle"  data-on="Ouvert" data-off="Fermé"/>

                                                <div class="col-md-4 mrg-18">

                                                    <label>      Ouverture :</label>
                                                    <input type="text" name="tuesdayStart" id="startTuesday" placeholder="" class="timepicker float-left  form-control ">
                                                </div>
                                                <div class="col-md-4 mrg-18">
                                                    <label>    Fermeture :</label>
                                                    <input type="text" name="tuesdayEnd" id="endTuesday" placeholder="" class="timepicker float-left form-control  pull-left">
                                                </div>

                                            @else

                                                <input type="checkbox" name="mondayCheckbox" data-onstyle="success" data-offstyle="danger" class="toggle_disponibility toggle col-md-4"  data-toggle="toggle"  data-on="Ouvert" data-off="Fermé"/>
                                                <div style="display:none;">

                                                    <div class="col-md-4 mrg-18">
                                                        <label> Ouverture :</label>
                                                        <input type="text" name="tuesdayStart" id="startTuesday" placeholder="" class="timepicker float-left  form-control ">
                                                    </div>
                                                    <div class="col-md-4 mrg-18" >
                                                        <label>  Fermeture :</label>
                                                        <input type="text" name="tuesdayStart" id="endTuesday" placeholder="" class="timepicker float-left  form-control pull-left">
                                                    </div>
                                                </div>

                                            @endif
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2"> Mecredi </label>
                                        <div class="col-sm-8">
                                            <div class="clearfix row">
                                            <div class="col-md-12" style="display: flex;">
                                                @if($chef->schedule[2]->status==1)

                                                    <input type="checkbox" name="wednesdayCheckbox" data-onstyle="success"  data-offstyle="danger" class="toggle_disponibility toggle col-md-4" checked data-toggle="toggle"  data-on="Ouvert" data-off="Fermé"/>

                                                    <div class="col-md-4 mrg-18">

                                                        <label>      Ouverture :</label>
                                                        <input type="text" name="wednesdayStart" id="startWednesday" placeholder="" class="timepicker float-left  form-control ">
                                                    </div>
                                                    <div class="col-md-4 mrg-18">
                                                        <label>    Fermeture :</label>
                                                        <input type="text" name="wednesdayEnd" id="endWednesday" placeholder="" class="timepicker float-left form-control  pull-left">
                                                    </div>

                                                @else

                                                    <input type="checkbox" name="wednesdayCheckbox" data-onstyle="success" data-offstyle="danger" class="toggle_disponibility toggle col-md-4"  data-toggle="toggle"  data-on="Ouvert" data-off="Fermé"/>
                                                    <div style="display:none;">

                                                        <div class="col-md-4 mrg-18">
                                                            <label> Ouverture :</label>
                                                            <input type="text" name="wednesdayStart" id="startWednesday" placeholder="" class="timepicker float-left  form-control ">
                                                        </div>
                                                        <div class="col-md-4 mrg-18" >
                                                            <label>  Fermeture :</label>
                                                            <input type="text" name="wednesdayEnd" id="endWednesday" placeholder="" class="timepicker float-left  form-control pull-left">
                                                        </div>
                                                    </div>

                                                @endif
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2"> Jeudi </label>
                                        <div class="col-sm-8">
                                            <div class="clearfix row">
                                            <div class="col-md-12" style="display: flex;">
                                                @if($chef->schedule[3]->status==1)

                                                    <input type="checkbox" name="thursdayCheckbox" data-onstyle="success"  data-offstyle="danger" class="toggle_disponibility toggle col-md-4" checked data-toggle="toggle"  data-on="Ouvert" data-off="Fermé"/>

                                                    <div class="col-md-4 mrg-18">

                                                        <label>      Ouverture :</label>
                                                        <input type="text" name="thursdayStart" id="startThursday" placeholder="" class="timepicker float-left  form-control ">
                                                    </div>
                                                    <div class="col-md-4 mrg-18">
                                                        <label>    Fermeture :</label>
                                                        <input type="text" name="thursdayEnd" id="endThursday" placeholder="" class="timepicker float-left form-control  pull-left">
                                                    </div>

                                                @else

                                                    <input type="checkbox" name="thursdayCheckbox" data-onstyle="success" data-offstyle="danger" class="toggle_disponibility toggle col-md-4"  data-toggle="toggle"  data-on="Ouvert" data-off="Fermé"/>
                                                    <div style="display:none;">

                                                        <div class="col-md-4 mrg-18">
                                                            <label> Ouverture :</label>
                                                            <input type="text" name="thursdayEnd" id="startThursday" placeholder="" class="timepicker float-left  form-control ">
                                                        </div>
                                                        <div class="col-md-4 mrg-18" >
                                                            <label>  Fermeture :</label>
                                                            <input type="text" name="thursdayEnd" id="endThursday" placeholder="" class="timepicker float-left  form-control pull-left">
                                                        </div>
                                                    </div>

                                                @endif
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2"> Vendredi </label>
                                        <div class="col-sm-8">
                                            <div class="clearfix row">
                                            <div class="col-md-12" style="display: flex;">
                                                @if($chef->schedule[4]->status==1)

                                                    <input type="checkbox" name="fridayCheckbox" data-onstyle="success"  data-offstyle="danger" class="toggle_disponibility toggle col-md-4" checked data-toggle="toggle"  data-on="Ouvert" data-off="Fermé"/>

                                                    <div class="col-md-4 mrg-18">

                                                        <label>      Ouverture :</label>
                                                        <input type="text" name="fridayStart" id="startFriday" placeholder="" class="timepicker float-left  form-control ">
                                                    </div>
                                                    <div class="col-md-4 mrg-18">
                                                        <label>    Fermeture :</label>
                                                        <input type="text" name="fridayEnd" id="endFriday" placeholder="" class="timepicker float-left form-control  pull-left">
                                                    </div>

                                                @else

                                                    <input type="checkbox" name="mondayCheckbox" data-onstyle="success" data-offstyle="danger" class="toggle_disponibility toggle col-md-4"  data-toggle="toggle"  data-on="Ouvert" data-off="Fermé"/>
                                                    <div style="display:none;">

                                                        <div class="col-md-4 mrg-18">
                                                            <label> Ouverture :</label>
                                                            <input type="text" name="fridayStart" id="startFriday" placeholder="" class="timepicker float-left  form-control ">
                                                        </div>
                                                        <div class="col-md-4 mrg-18" >
                                                            <label>  Fermeture :</label>
                                                            <input type="text" name="fridayEnd" id="endFriday" placeholder="" class="timepicker float-left  form-control pull-left">
                                                        </div>
                                                    </div>

                                                @endif
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2"> Samedi </label>
                                        <div class="col-sm-8">
                                            <div class="clearfix row">
                                            <div class="col-md-12" style="display: flex;">
                                                @if($chef->schedule[5]->status==1)

                                                    <input type="checkbox" name="saturdayCheckbox" data-onstyle="success"  data-offstyle="danger" class="toggle_disponibility toggle col-md-4" checked data-toggle="toggle"  data-on="Ouvert" data-off="Fermé"/>

                                                    <div class="col-md-4 mrg-18">

                                                        <label>      Ouverture :</label>
                                                        <input type="text" name="saturdayStart" id="startSaturday" placeholder="" class="timepicker float-left  form-control ">
                                                    </div>
                                                    <div class="col-md-4 mrg-18">
                                                        <label>    Fermeture :</label>
                                                        <input type="text" name="saturdayEnd" id="endSaturday" placeholder="" class="timepicker float-left form-control  pull-left">
                                                    </div>

                                                @else

                                                    <input type="checkbox" name="saturdayCheckbox" data-onstyle="success" data-offstyle="danger" class="toggle_disponibility toggle col-md-4"  data-toggle="toggle"  data-on="Ouvert" data-off="Fermé"/>
                                                    <div style="display:none;">

                                                        <div class="col-md-4 mrg-18">
                                                            <label> Ouverture :</label>
                                                            <input type="text" name="saturdayStart" id="startSaturday" placeholder="" class="timepicker float-left  form-control ">
                                                        </div>
                                                        <div class="col-md-4 mrg-18" >
                                                            <label>  Fermeture :</label>
                                                            <input type="text" name="saturdayEnd" id="endSaturday" placeholder="" class="timepicker float-left  form-control pull-left">
                                                        </div>
                                                    </div>

                                                @endif
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="" class="col-sm-2"> Dimanche </label>
                                            <div class="col-sm-8">
                                                <div class="clearfix row">
                                                    <div class="col-md-12" style="display: flex;">
                                                        @if($chef->schedule[6]->status==1)

                                                            <input type="checkbox" name="sundayCheckbox" data-onstyle="success"  data-offstyle="danger" class="toggle_disponibility toggle col-md-4" checked data-toggle="toggle"  data-on="Ouvert" data-off="Fermé"/>

                                                            <div class="col-md-4 mrg-18">

                                                                <label>      Ouverture :</label>
                                                                <input type="text" name="sundayStart" id="startSunday" placeholder="" class="timepicker float-left  form-control ">
                                                            </div>
                                                            <div class="col-md-4 mrg-18">
                                                                <label>    Fermeture :</label>
                                                                <input type="text" name="sundayEnd" id="endSunday" placeholder="" class="timepicker float-left form-control  pull-left">
                                                            </div>

                                                        @else

                                                            <input type="checkbox" name="sundayCheckbox" data-onstyle="success" data-offstyle="danger" class="toggle_disponibility toggle col-md-4"  data-toggle="toggle"  data-on="Ouvert" data-off="Fermé"/>
                                                            <div style="display:none;">

                                                                <div class="col-md-4 mrg-18">
                                                                    <label> Ouverture :</label>
                                                                    <input type="text" name="sundayStart" id="startSunday" placeholder="" class="timepicker float-left  form-control ">
                                                                </div>
                                                                <div class="col-md-4 mrg-18" >
                                                                    <label>  Fermeture :</label>
                                                                    <input type="text" name="sundayEnd" id="endSunday" placeholder="" class="timepicker float-left  form-control pull-left">
                                                                </div>
                                                            </div>

                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                             </div>

                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-default prev-step">Retour</button></li>
                                    <li><button type="button" class="btn btn-primary btn-info-full next-step">Continuer</button></li>
                                </ul>
                            </div>

                            <div class="tab-pane" role="tabpanel" id="step3">
                                <span class="title">Photo Gallerie</span>
                                <div class="wizard_content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Photo de profile par défaut<span class="text-danger"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div id="my_img">
                                                            <input type="file" name="user_image" id="user_image" class="form-control update_img" accept="image/jpeg"/>
                                                            <label style="cursor: pointer;" for="user_image">
                                                                <img  id="user_image_change" src="{{asset($chef->user->image)}}"></label>
                                                        </div>
                                                    </div>
                                                    <small>Votre photo de profile sera visible par tout les utilisateurs.</small> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Photo de couverture par défaut <span class="text-danger"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="file" name="cover_photo" id="cover_photo"  class="form-control update_img" />
                                                        <label style="cursor: pointer;" for="cover_photo">
                                                            <img  id="cover_photo_change" src="{{asset($chef->cover_photo)}}"></label>
                                                    </div>
                                                    <small>Votre photo de couverture sera visible par tout les utilisateurs.</small> </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Ajouter au moins deux photos de votre cuisine <span class="text-danger"></span></label>
                                        <div class="col-md-8 col-sm-9">
                                            <div class="input-group">
                                                <input type="file" id="kitchen_image" multiple class="form-control" required />
                                            </div>
                                            <small>Vos photos de cuisine seront visible par tous les clients.</small> </div>
                                    </div>

                                    <div class="form-group kitchen_images_result">
                                        <label class="control-label col-sm-3">Vos images (<span id="images_count">0</span>) <span class="text-danger"></span></label>
                                        <div class="col-md-8 col-sm-9">
                                            <div class="input-group kitchen_images">
                                            </div>
                                            <small>Vos photos de cuisine seront visible par tous les clients.</small>
                                        </div>
                                    </div>


                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-default prev-step">Retour</button></li>
                                    <li><button type="button" class="btn btn-primary next-step">Continuer</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="complete">
                                <h3>Récapitulatif</h3>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Photo de profile <span class="text-danger"></span></label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div id="my_img">
                                                           <img  id="user_image_change_result" src="{{asset($chef->user->image)}}"></label>

                                                    </div>
                                                </div>
                                                <small>Votre photo de profile sera visible par tout les utilisateurs.</small> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-6">Photo de couverture <span class="text-danger"></span></label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <img  id="cover_photo_change_result" src="{{asset($chef->cover_photo)}}"></label>
                                                </div>
                                                <small>Votre photo de couverture sera visible par tout les utilisateurs.</small> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Numéro de téléphone <span class="text-danger"></span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <div class="input-group tel_result">

                                        </div>
                                        <small>Votre numéro est obligatoire pour la confirmation de votre compte.</small> </div>
                                </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Adresse<span class="text-danger"></span></label>
                                        <div class="col-md-8 col-sm-9">
                                            <div class="input-group address_result">

                                            </div>
                                            <small>Votre address nous aide à vous localisez facilement pour la recherche.</small> </div>
                                    </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3">Vos images (<span name="countImage" id="images_count_result">0</span>) <span class="text-danger"></span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <div class="input-group results_images">
                                        </div>
                                        <small>Vos photos de cuisine seront visible par tous les clients.</small>
                                    </div>
                                </div>

                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-default prev-step">Retour</button></li>
                                    <li><button type="button" id="btn_complete" class="btn btn-primary btn-info-full">Valider</button></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>

        $(function() { "use strict";

            $("#startMonday").timepicker({defaultTime: "{{$chef->schedule[0]->start_at}}",showMeridian: false});
            $("#endMonday").timepicker({defaultTime: "{{$chef->schedule[0]->ends_at}}",showMeridian: false});

            $("#startTuesday").timepicker({defaultTime: "{{$chef->schedule[1]->start_at}}",showMeridian: false});
            $("#endTuesday").timepicker({defaultTime: "{{$chef->schedule[1]->ends_at}}",showMeridian: false});

            $("#startWednesday").timepicker({defaultTime: "{{$chef->schedule[2]->start_at}}",showMeridian: false});
            $("#endWednesday").timepicker({defaultTime: "{{$chef->schedule[2]->ends_at}}",showMeridian: false});

            $("#startThursday").timepicker({defaultTime: "{{$chef->schedule[3]->start_at}}",showMeridian: false});
            $("#endThursday").timepicker({defaultTime: "{{$chef->schedule[3]->ends_at}}",showMeridian: false});

            $("#startFriday").timepicker({defaultTime: "{{$chef->schedule[4]->start_at}}",showMeridian: false});
            $("#endFriday").timepicker({defaultTime: "{{$chef->schedule[4]->ends_at}}",showMeridian: false});

            $("#startSaturday").timepicker({defaultTime: "{{$chef->schedule[5]->start_at}}",showMeridian: false});
            $("#endSaturday").timepicker({defaultTime: "{{$chef->schedule[5]->ends_at}}",showMeridian: false});

            $("#startSunday").timepicker({defaultTime: "{{$chef->schedule[6]->start_at}}",showMeridian: false});
            $("#endSunday").timepicker({defaultTime: "{{$chef->schedule[6]->ends_at}}",showMeridian: false});



        });





    </script>
    <script>
        function addImage(input,idTarget) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#"+idTarget+"").attr("src",e.target.result);
                    $("#"+idTarget+"_result").attr("src",e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#cover_photo").change(function(){
            addImage(this,"cover_photo_change");
        });

        $("#user_image").change(function()
        {
            addImage(this,"user_image_change");
        });
    </script>
    <script src="{{asset('js/wizardForm.js')}}"></script>
@stop
@section('footer')
    @include('frontOffice.inc.footer')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCj1cCyUDGUciWPWK7kzjrxjLx4wDDS9c&libraries=places&callback=initAutocomplete"
            async defer></script>
    <!-- Bootstrap Timepicker -->


    <script type="text/javascript" src="{{ asset ('plugins') }}/timepicker/timepicker.js"></script>
@endsection
