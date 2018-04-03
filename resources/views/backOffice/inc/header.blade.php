<div id="page-header" class="bg-dyeiri font-inverse">
    <div id="mobile-navigation">
        <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
        <a href="{{route('showHome')}}" class="logo-content-small" title="ManageRestaurant"></a>
    </div>
    <div id="header-logo" class="logo-bg">
        <a href="{{route('showHome')}}" class="logo-content-big" title="ManageRestaurant">
          <span style="size: 4px">Dyeiri</span>

        </a>
        <a href="{{route('showHome')}}" class="logo-content-small" title="ManageRestaurant">
            My walter
            <span>The perfect solution for manage restaurants</span>
        </a>
        <a id="close-sidebar" href="#" title="Close sidebar">
            <i class="glyph-icon icon-angle-left"></i>
        </a>
    </div>
    <div id="header-nav-left">
        <div class="user-account-btn dropdown">
            <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
                <img width="28" src="{{asset('templates/admin/img/admin.png')}}" alt="Profile image">
                <span>Admin Admin</span>
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <div class="dropdown-menu float-left">
                <div class="box-sm">
                    <div class="login-box clearfix">
                        <div class="user-img">
                            <a href="#" title="" class="change-img">Change photo</a>

                        </div>
                        <div class="user-info" style="color: black;">
                            <span>
                               Admin
                            </span>
                            <a href="#" title="Edit profile">Modifier restaurant</a>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <ul class="reset-ul mrg5B">
                        <li>
                            <a href="#">
                               Détails de votre compte
                            </a>
                        </li>
                    </ul>
                    <div class="pad5A button-pane button-pane-alt text-center">
                        <a href="{{route('logout')}}" class="btn display-block font-normal btn-danger">
                            <i class="glyph-icon icon-power-off"></i>
                           Déconnexion
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #header-nav-left -->

    <div id="header-nav-right">
        <a href="#" class="hdr-btn" id="fullscreen-btn" title="Fullscreen">
            <i class="glyph-icon icon-arrows-alt"></i>
        </a>
        <a class="header-btn" id="logout-btn" href="{{route('logout')}}" title="Déconneion">
            <i class="glyph-icon icon-power-off"></i>
        </a>

    </div><!-- #header-nav-right -->

</div>