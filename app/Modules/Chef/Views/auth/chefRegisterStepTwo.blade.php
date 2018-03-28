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
                                <span class="title">Information personnelles</span>
                                <div class="wizard_content">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Photo de profile <span class="text-danger"></span></label>
                                        <div class="col-md-8 col-sm-9">
                                            <div class="input-group">
                                                <input type="file" id="image" name="user_image" class="form-control"  />
                                            </div>
                                            <small>Votre photo de profile sera visible par tous les clients.</small> </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Photo de couverture<span class="text-danger"></span></label>
                                        <div class="col-md-8 col-sm-9">
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="cover_photo">
                                            </div>
                                            <small>Votre votre photo couverture sera visible par tous les clients.</small> </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Spécialité<span class="text-danger"></span></label>
                                        <div class="col-md-8 col-sm-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="speciality" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" id="spec" >
                                            </div>
                                            <small>Votre spécialité va faciliter la recherche de votre profile.</small> </div>
                                    </div>
                                </div>

                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-default prev-step">Retour</button></li>
                                    <li><button type="button" class="btn btn-default next-step">Passer</button></li>
                                    <li><button type="button" class="btn btn-primary btn-info-full next-step">Continuer</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step3">
                                <span class="title">Photo de votre cuisine</span>
                                <div class="wizard_content">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Ajouter une photo de votre cuisine <span class="text-danger"></span></label>
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
    <script src="{{asset('js/wizardForm.js')}}"></script>
@stop
@section('footer')
    @include('frontOffice.inc.footer')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCj1cCyUDGUciWPWK7kzjrxjLx4wDDS9c&libraries=places&callback=initAutocomplete"
            async defer></script>
@endsection
