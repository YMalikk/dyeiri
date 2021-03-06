<!-- Header ================================================== -->
<header>
    <div class="container-fluid">
        <div class="row delivery_bar">
            <div class="col-md-12 col-xs-12">
                <div class="pull-right">
                    @if($user==null)
                        <a href="{{route('showDeliveryRegister')}}" class="be_delivery_man">Devenir un livreur</a>
                        @else
                        <span style="height: 30px;display: block"></span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col--md-4 col-sm-4 col-xs-4">
                <a href="{{route('showHome')}}" id="logo">
                    <img src="{{asset('img')}}/greenLogo.png" width="190" height="23" alt=""  data-retina="true" class="hidden-xs logo_image">
                    <img src="{{asset('img')}}/greenLogo.png" width="59" height="23" alt="" data-retina="true" class="hidden-lg hidden-md hidden-sm logo_image_mobile">
                </a>
            </div>
            <nav class="col--md-8 col-sm-8 col-xs-8 header_dyeiri">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="{{asset('img')}}/logoDyeiri.png" width="190" height="23" alt="" class="logo_image_menu" data-retina="true">
                    </div>
                    <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
                    <ul>
                        @if($user==null)
                            <li><a href="{{route('showChefRegister')}}" style="border: none;width: 100%;" class="be_delivery_man become_chef">Proposer un plat</a></li>
                        @endif
                            <li><a href="{{route('showBlogs')}}">Blog</a></li>
                            <li><a href="about.html">A propos de nous</a></li>
                            <li><a href="{{route('showFAQ')}}">FAQ</a></li>
                            @if($user==null)
                                <li><a href="{{route('showClientRegister')}}">S'inscrire</a></li>
                                <li><a href="#0" data-toggle="modal" data-target="#login_2">Connexion</a></li>
                            @else
                                <li><a href="{{route('showMessages')}}">Boite de reception ({{count($user->messagesNotRead)}})</a></li>
                                @if(\Illuminate\Support\Facades\Auth::user()->current_user==1)
                                  <li><a href="{{route('showChefProfile')}}" >Mon profil</a></li>
                                @else

                                  <li><a href="{{route('showProfile')}}" >Mon profil</a></li>
                                @endif
                                    <li><a href="{{route('logout')}}">Déconnexion</a></li>
                            @endif

                    </ul>
                </div><!-- End main-menu -->
            </nav>
        </div><!-- End row -->
    </div><!-- End container -->
</header>
<!-- End Header =============================================== -->
<!-- Login modal -->
<div class="modal fade" id="login_2" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
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
        </div>
    </div>
</div><!-- End modal -->
   
