<div id="page-sidebar" class="bg-black font-inverse">
    <div class="scroll-sidebar">


        <ul id="sidebar-menu" style="background-color: #2d2d2d;">
            <li class="header"><span>Overview</span></li>
            <li>
                <a href="{{route('showDashboard')}}" title="Admin Dashboard">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Dyeiri dashboard</span>
                </a>
            </li>
            <li class="divider"></li>
            <li class="header"><span>Composants</span></li>
            <li>
                <a href="#" title="Dashboard boxes">
                    <i class="glyph-icon icon-linecons-lightbulb"></i>
                    <span>Chefs</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="#" title="Chart boxes"><span>Ajouter un chef</span></a></li>
                        <li><a href="{{route('showChefList')}}" title="Panel boxes"><span>Afficher les chefs</span></a></li>
                    </ul>

                </div><!-- .sidebar-submenu -->
            </li>

            <li>
                <a href="#" title="Dashboard boxes">
                    <i class="glyph-icon icon-linecons-lightbulb"></i>
                    <span>Clients</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="#" title="Panel boxes"><span>Ajouter un client</span></a></li>
                        <li><a href="{{route('showClientList')}}" title="Panel boxes"><span>Afficher les clients</span></a></li>
                    </ul>

                </div><!-- .sidebar-submenu -->
            </li>

            <li>
                <a href="#" title="Dashboard boxes">
                    <i class="glyph-icon icon-linecons-lightbulb"></i>
                    <span>Commandes</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{route('showOrderList')}}" title="Panel boxes"><span>Afficher les commandes</span></a></li>
                    </ul>

                </div><!-- .sidebar-submenu -->
            </li>


            <li>
                <a href="#" title="Dashboard boxes">
                    <i class="glyph-icon icon-linecons-lightbulb"></i>
                    <span>Blog</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{route('showAddBlog')}}" title="Panel boxes"><span>Ajouter un blog</span></a></li>
                        <li><a href="{{route('showBlogList')}}" title="Panel boxes"><span>Afficher les publications</span></a></li>
                    </ul>

                </div><!-- .sidebar-submenu -->
            </li>

           <!-- <li>
                <a href="#" title="Dashboard boxes">
                    <i class="glyph-icon icon-linecons-lightbulb"></i>
                    <span>Gérer le site web</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="#" title="Panel boxes"><span>Information supplémentaire</span></a></li>
                    </ul>
                </div><!-- .sidebar-submenu
        <!--  </li> -->


            <li>
                <a href="{{route('showAdminMessages')}}" title="Panel boxes">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Messages</span>
                </a>
            </li>

              <li>
                <a href="#" title="Panel boxes">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Avis</span>
                </a>
            </li>

        </ul><!-- #sidebar-menu -->


    </div>
</div>
