@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
@stop

@section('content')
    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short"  data-parallax="scroll" data-image-src="img/sub_header_short.jpg" data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
                <h1>FAQ</h1>
                <p>Question fréquente.</p>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="{{route('showHome')}}">Acceuil</a></li>
                <li><a href="{{route('showFAQ')}}">FAQ</a></li>
            </ul>
            <a href="#0" class="search-overlay-menu-btn"></a>
        </div>
    </div><!-- Position -->

    <!-- Content ================================================== -->
    <div class="container margin_60_35">
        <div class="row">

            <div class="col-md-3" id="sidebar">
                <div class="theiaStickySidebar">
                    <div class="box_style_1" id="faq_box">
                        <ul id="cat_nav">
                            <li><a href="#payment" class="active">Payments</a></li>
                            <li><a href="#works">How it works</a></li>
                            <li><a href="#delay">Delivery delay</a></li>
                            <li><a href="#takeaway">Takeaway</a></li>
                            <li><a href="#preorder">Preorder</a></li>
                        </ul>
                    </div><!-- End box_style_1 -->
                </div><!-- End theiaStickySidebar -->
            </div><!-- End col-md-3 -->

            <div class="col-md-9">
                <h3 class="nomargin_top">Payments</h3>

                <div class="panel-group" id="payment">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseOne">Qu'est-ce que dyeiri ?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                Dyeiri met en relation les passionnés de cuisine , les gourmands, les coudants bleus, les pressés, les étudiants pour une nouvelle experience de partage . Sélectionnez vos plats fait-maison parmi un large choix de passionnées , et commandez ce qui vous plaît tous les jours.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseTwo">Quand le service Dyeiri est-il disponible ?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                Dyeiri  est disponible 7 jours / 7 de 08:00 à 01:00.                                                          Pour le déjeuner veuillez commander avant 11:00.                                                  Pour la livraison de déjeuner, la commande sera disponible 12h,13h ou 14h          (a votre choix ) .
                                . Les services salades,sweets, snacks et drinks  étant disponible de 08:00 à 00:00  .
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseThree">Dans quelles régions le service Dyeiri est-il disponible ?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                Dyeiri est disponible dans Gazella ( pole technologique ) et dans plus d'une centaine de communes de la région Ariana.  </div>
                        </div>
                    </div>
                </div><!-- End panel-group -->

                <h3>How it works</h3>

                <div class="panel-group" id="works">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#works" href="#collapseOne_works">Comment commander un repas avec Dyeiri ?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_works" class="panel-collapse collapse">
                            <div class="panel-body">
                                1.	Se localiser pour trouver les passionnes valable dans votre region .<br/>
                                2.	Choisissez le plat que vous souhaitez commander.<br/>
                                3.	Suivez l’arrivée de votre coursier partenaire ou importer .    </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#works" href="#collapseTwo_works">	Comment livrez-vous ?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseTwo_works" class="panel-collapse collapse">
                            <div class="panel-body">
                                Votre commande sera collectée directement auprès de notre passionnées partenaires par un coursier. Elle sera soigneusement placée dans un sac spécialement conçu pour livrer vos commandes dyeiri, qui garantit une chaleur/fraîcheur optimale pendant toute la durée du trajet. Le coursier se rend ensuite directement jusqu’à votre porte pour vous remettre vos délicieux plats. Les livraisons se font majoritairement à vélo, nous sommes donc à la fois rapides et respectueux de l'environnement.

                                Si vous avez choisi l’option “a importer”, vous devez simplement vous rendre au Cook  à l’heure sélectionnée, présenter la confirmation de commande et vous pourrez récupérer votre commande q. Pensez à bien vérifier que votre commande est complète avant de partir !
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#works" href="#collapseThree_works">Comment régler ?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseThree_works" class="panel-collapse collapse">
                            <div class="panel-body">

                                Vous pouvez régler en ligne grâce à notre système de commande sur le web .  Nous prenons vos informations personnelles très au sérieux. Pour cette raison, vos données sont toujours cryptées afin d'assurer une protection maximale et ne seront jamais partagées.

                                Nos équipes font leur maximum pour pouvoir mettre en place les paiements par tickets restaurants au plus vite, mais cela n’est pas encore possible.

                            </div>
                        </div>
                    </div>
                </div><!-- End panel-group -->

                <h3>Delivery delay</h3>

                <div class="panel-group" id="delay">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#delay" href="#collapseOne_delay">Comment récupérer sa facture ?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_delay" class="panel-collapse collapse">
                            <div class="panel-body">
                                Vous recevrez votre facture par mail au moment où votre commande vous sera livrée. Si jamais ça n’est pas le cas, elle est probablement dans vos courriers indésirables, mais vous pouvez toujours contacter notre service client par mail ou chat si nécessaire.  </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#delay" href="#collapseTwo_delay">Combien coûte Dyeiri ?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseTwo_delay" class="panel-collapse collapse">
                            <div class="panel-body">
                                Dyeiri  propose des menus différents à des prix variés. Les prix sont fixés par les passionnés . Les prix et offres spéciales seront  affichés sur le site web dyeiri.tn .
                                Le montant des frais de livraison varie selon différents facteurs (comme par exemple la zone de livraison) mais le prix sera toujours affiché clairement dans le site web avant de passer commande. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#delay" href="#collapseThree_delay">Quels sont les frais de livraison sur Dyeiri ?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseThree_delay" class="panel-collapse collapse">
                            <div class="panel-body">
                                Les frais de livraison Dyeiri sont des frais que vous payez à Dyeiri pour chaque livraison et qui permettent de couvrir les coûts de fonctionnement.
                            </div>
                        </div>
                    </div>
                </div><!-- End panel-group -->

                <h3>Takeaway</h3>

                <div class="panel-group" id="takeaway">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#takeaway" href="#collapseOne_takeaway">Comment les restaurants sont-ils sélectionnés ?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_takeaway" class="panel-collapse collapse">
                            <div class="panel-body">
                                Dyeiri s’associe aux meilleurs  Passionnées ( correspond au termes d`acceptation ) et vous proposent leurs menus dans le site . </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#takeaway" href="#collapseTwo_takeaway">Comment cela se passe-t-il si j'ai des intolérances alimentaires ou si je souhaite modifier une commande ?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseTwo_takeaway" class="panel-collapse collapse">
                            <div class="panel-body">
                                Pour une grande partie des plats disponibles sur Dyeiri, vous aurez la possibilité d'ajouter des instructions spécifiques pour votre commande. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#takeaway" href="#collapseThree_takeaway">Que se passe-t-il en cas de problème avec ma commande ?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseThree_takeaway" class="panel-collapse collapse">
                            <div class="panel-body">
                                Nous sommes à votre disposition. Une fois la commande effectuée, si vous avez des questions ou remarques, contactez notre service client , et nous nous chargerons de vous apporter des solutions.   </div>
                        </div>
                    </div>
                </div><!-- End panel-group -->

                <h3>Preorder</h3>

                <div class="panel-group" id="preorder">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#preorder" href="#collapseOne_preorder">Le coursier va-t-il apporter ma commande au pied de mon immeuble ou directement à mon bureau ?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_preorder" class="panel-collapse collapse">
                            <div class="panel-body">
                                Votre coursier vous apportera votre commande directement chez vous, à votre porte. Si vous préférez sortir et retrouver votre coursier à l’extérieur, cela ne pose pas de problème. Vous pouvez toujours aller le rencontrer sur le trottoir.   </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#preorder" href="#collapseTwo_preorder">Dois-je donner un pourboire au coursier ?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseTwo_preorder" class="panel-collapse collapse">
                            <div class="panel-body">
                                le pourboire n’est pas inclue et n’est pas attendu ou exigé . vous pouvez toujours évaluer votre experience après la commande .


                                Vous avez d'autres questions auxquelles nous n'avons pas encore répondu ? Rendez-vous sur notre page d'aide ou appuyez sur « Aide » dans le site dyeiri.tn . </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#preorder" href="#collapseThree_preorder">Our Mission<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseThree_preorder" class="panel-collapse collapse">
                            <div class="panel-body">
                                Dyeiri is transforming the way peoples experience their meals   by choosing from a variety of clean,tasty and healthy food made by passionate cook  and have anything delivered on-demand. Our revolutionary Urban community  platform connects customers with local cook who can prepare  anything from any categories in their profiles in minutes. We empower communities to shop local with no waiting, and empower businesses by saving times for the workers and students .
                            </div>
                        </div>
                    </div>
                </div><!-- End panel-group -->

            </div><!-- End col-md-9 -->
        </div><!-- End row -->
    </div><!-- End container -->
    <!-- End Content =============================================== -->
    <script>
        $('#faq_box a[href^="#"]').on('click', function (e) {
            e.preventDefault();
            var target = this.hash;
            var $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 120
            }, 900, 'swing', function () {
                window.location.hash = target;
            });
        });
    </script>
@stop
@section('footer')
    @include('frontOffice.inc.footer')
@endsection
