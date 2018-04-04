@extends('backOffice.layout')

@section('head')
    @include('backOffice.inc.head')
@endsection


@section('slideBar')
    @include('backOffice.inc.slideBar')
@endsection

@section('header')
    @include('backOffice.inc.header')
@endsection

@section('sidebar')
    @include('backOffice.inc.sideBar')
@endsection

@section('content')

    <div class="container">

        <div id="page-title">

            <h2>Commande</h2>

            <div id="theme-options" class="admin-options">
                <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
                    <i class="glyph-icon icon-linecons-cog icon-spin"></i>
                </a>
                <div id="theme-switcher-wrapper">
                    <div class="scroll-switcher">
                        <h5 class="header">Layout options</h5>
                        <ul class="reset-ul">
                            <li>
                                <label for="fixed-header">Fixed header</label>
                                <input type="checkbox" data-toggletarget="fixed-header" id="fixed-header" class="input-switch-alt">
                            </li>
                            <li>
                                <label for="fixed-sidebar">Fixed sidebar</label>
                                <input type="checkbox" data-toggletarget="fixed-sidebar" id="fixed-sidebar" class="input-switch-alt">
                            </li>
                            <li>
                                <label for="closed-sidebar">Closed sidebar</label>
                                <input type="checkbox" data-toggletarget="closed-sidebar" id="closed-sidebar" class="input-switch-alt">
                            </li>
                        </ul>
                        <div class="boxed-bg-wrapper hide">
                            <h5 class="header">
                                Boxed Page Background
                                <a class="set-background-style" data-header-bg="" title="Remove all styles" href="javascript:void(0);">Clear</a>
                            </h5>
                            <div class="theme-color-wrapper clearfix">
                                <h5>Patterns</h5>
                                <a class="tooltip-button set-background-style pattern-bg-3" data-header-bg="pattern-bg-3" title="Pattern 3" href="javascript:void(0);">Pattern 3</a>
                                <a class="tooltip-button set-background-style pattern-bg-4" data-header-bg="pattern-bg-4" title="Pattern 4" href="javascript:void(0);">Pattern 4</a>
                                <a class="tooltip-button set-background-style pattern-bg-5" data-header-bg="pattern-bg-5" title="Pattern 5" href="javascript:void(0);">Pattern 5</a>
                                <a class="tooltip-button set-background-style pattern-bg-6" data-header-bg="pattern-bg-6" title="Pattern 6" href="javascript:void(0);">Pattern 6</a>
                                <a class="tooltip-button set-background-style pattern-bg-7" data-header-bg="pattern-bg-7" title="Pattern 7" href="javascript:void(0);">Pattern 7</a>
                                <a class="tooltip-button set-background-style pattern-bg-8" data-header-bg="pattern-bg-8" title="Pattern 8" href="javascript:void(0);">Pattern 8</a>
                                <a class="tooltip-button set-background-style pattern-bg-9" data-header-bg="pattern-bg-9" title="Pattern 9" href="javascript:void(0);">Pattern 9</a>
                                <a class="tooltip-button set-background-style pattern-bg-10" data-header-bg="pattern-bg-10" title="Pattern 10" href="javascript:void(0);">Pattern 10</a>

                                <div class="clear"></div>

                                <h5 class="mrg15T">Solids &amp;Images</h5>
                                <a class="tooltip-button set-background-style bg-black" data-header-bg="bg-black" title="Black" href="javascript:void(0);">Black</a>
                                <a class="tooltip-button set-background-style bg-gray mrg10R" data-header-bg="bg-gray" title="Gray" href="javascript:void(0);">Gray</a>

                                <a class="tooltip-button set-background-style full-bg-1" data-header-bg="full-bg-1 fixed-bg" title="Image 1" href="javascript:void(0);">Image 1</a>
                                <a class="tooltip-button set-background-style full-bg-2" data-header-bg="full-bg-2 fixed-bg" title="Image 2" href="javascript:void(0);">Image 2</a>
                                <a class="tooltip-button set-background-style full-bg-3" data-header-bg="full-bg-3 fixed-bg" title="Image 3" href="javascript:void(0);">Image 3</a>
                                <a class="tooltip-button set-background-style full-bg-4" data-header-bg="full-bg-4 fixed-bg" title="Image 4" href="javascript:void(0);">Image 4</a>
                                <a class="tooltip-button set-background-style full-bg-5" data-header-bg="full-bg-5 fixed-bg" title="Image 5" href="javascript:void(0);">Image 5</a>
                                <a class="tooltip-button set-background-style full-bg-6" data-header-bg="full-bg-6 fixed-bg" title="Image 6" href="javascript:void(0);">Image 6</a>

                            </div>
                        </div>
                        <h5 class="header">
                            Header Style
                            <a class="set-adminheader-style" data-header-bg="bg-gradient-9" title="Remove all styles" href="javascript:void(0);">Clear</a>
                        </h5>
                        <div class="theme-color-wrapper clearfix">
                            <h5>Solids</h5>
                            <a class="tooltip-button set-adminheader-style bg-primary" data-header-bg="bg-primary font-inverse" title="Primary" href="javascript:void(0);">Primary</a>
                            <a class="tooltip-button set-adminheader-style bg-green" data-header-bg="bg-green font-inverse" title="Green" href="javascript:void(0);">Green</a>
                            <a class="tooltip-button set-adminheader-style bg-red" data-header-bg="bg-red font-inverse" title="Red" href="javascript:void(0);">Red</a>
                            <a class="tooltip-button set-adminheader-style bg-blue" data-header-bg="bg-blue font-inverse" title="Blue" href="javascript:void(0);">Blue</a>
                            <a class="tooltip-button set-adminheader-style bg-warning" data-header-bg="bg-warning font-inverse" title="Warning" href="javascript:void(0);">Warning</a>
                            <a class="tooltip-button set-adminheader-style bg-purple" data-header-bg="bg-purple font-inverse" title="Purple" href="javascript:void(0);">Purple</a>
                            <a class="tooltip-button set-adminheader-style bg-black" data-header-bg="bg-black font-inverse" title="Black" href="javascript:void(0);">Black</a>

                            <div class="clear"></div>

                            <h5 class="mrg15T">Gradients</h5>
                            <a class="tooltip-button set-adminheader-style bg-gradient-1" data-header-bg="bg-gradient-1 font-inverse" title="Gradient 1" href="javascript:void(0);">Gradient 1</a>
                            <a class="tooltip-button set-adminheader-style bg-gradient-2" data-header-bg="bg-gradient-2 font-inverse" title="Gradient 2" href="javascript:void(0);">Gradient 2</a>
                            <a class="tooltip-button set-adminheader-style bg-gradient-3" data-header-bg="bg-gradient-3 font-inverse" title="Gradient 3" href="javascript:void(0);">Gradient 3</a>
                            <a class="tooltip-button set-adminheader-style bg-gradient-4" data-header-bg="bg-gradient-4 font-inverse" title="Gradient 4" href="javascript:void(0);">Gradient 4</a>
                            <a class="tooltip-button set-adminheader-style bg-gradient-5" data-header-bg="bg-gradient-5 font-inverse" title="Gradient 5" href="javascript:void(0);">Gradient 5</a>
                            <a class="tooltip-button set-adminheader-style bg-gradient-6" data-header-bg="bg-gradient-6 font-inverse" title="Gradient 6" href="javascript:void(0);">Gradient 6</a>
                            <a class="tooltip-button set-adminheader-style bg-gradient-7" data-header-bg="bg-gradient-7 font-inverse" title="Gradient 7" href="javascript:void(0);">Gradient 7</a>
                            <a class="tooltip-button set-adminheader-style bg-gradient-8" data-header-bg="bg-gradient-8 font-inverse" title="Gradient 8" href="javascript:void(0);">Gradient 8</a>
                        </div>
                        <h5 class="header">
                            Sidebar Style
                            <a class="set-sidebar-style" data-header-bg="" title="Remove all styles" href="javascript:void(0);">Clear</a>
                        </h5>
                        <div class="theme-color-wrapper clearfix">
                            <h5>Solids</h5>
                            <a class="tooltip-button set-sidebar-style bg-primary" data-header-bg="bg-primary font-inverse" title="Primary" href="javascript:void(0);">Primary</a>
                            <a class="tooltip-button set-sidebar-style bg-green" data-header-bg="bg-green font-inverse" title="Green" href="javascript:void(0);">Green</a>
                            <a class="tooltip-button set-sidebar-style bg-red" data-header-bg="bg-red font-inverse" title="Red" href="javascript:void(0);">Red</a>
                            <a class="tooltip-button set-sidebar-style bg-blue" data-header-bg="bg-blue font-inverse" title="Blue" href="javascript:void(0);">Blue</a>
                            <a class="tooltip-button set-sidebar-style bg-warning" data-header-bg="bg-warning font-inverse" title="Warning" href="javascript:void(0);">Warning</a>
                            <a class="tooltip-button set-sidebar-style bg-purple" data-header-bg="bg-purple font-inverse" title="Purple" href="javascript:void(0);">Purple</a>
                            <a class="tooltip-button set-sidebar-style bg-black" data-header-bg="bg-black font-inverse" title="Black" href="javascript:void(0);">Black</a>

                            <div class="clear"></div>

                            <h5 class="mrg15T">Gradients</h5>
                            <a class="tooltip-button set-sidebar-style bg-gradient-1" data-header-bg="bg-gradient-1 font-inverse" title="Gradient 1" href="javascript:void(0);">Gradient 1</a>
                            <a class="tooltip-button set-sidebar-style bg-gradient-2" data-header-bg="bg-gradient-2 font-inverse" title="Gradient 2" href="javascript:void(0);">Gradient 2</a>
                            <a class="tooltip-button set-sidebar-style bg-gradient-3" data-header-bg="bg-gradient-3 font-inverse" title="Gradient 3" href="javascript:void(0);">Gradient 3</a>
                            <a class="tooltip-button set-sidebar-style bg-gradient-4" data-header-bg="bg-gradient-4 font-inverse" title="Gradient 4" href="javascript:void(0);">Gradient 4</a>
                            <a class="tooltip-button set-sidebar-style bg-gradient-5" data-header-bg="bg-gradient-5 font-inverse" title="Gradient 5" href="javascript:void(0);">Gradient 5</a>
                            <a class="tooltip-button set-sidebar-style bg-gradient-6" data-header-bg="bg-gradient-6 font-inverse" title="Gradient 6" href="javascript:void(0);">Gradient 6</a>
                            <a class="tooltip-button set-sidebar-style bg-gradient-7" data-header-bg="bg-gradient-7 font-inverse" title="Gradient 7" href="javascript:void(0);">Gradient 7</a>
                            <a class="tooltip-button set-sidebar-style bg-gradient-8" data-header-bg="bg-gradient-8 font-inverse" title="Gradient 8" href="javascript:void(0);">Gradient 8</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12">

                    <table></table>

                </div>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div  class="panel">
                    <div style="max-height: 550px;;overflow: auto" class="panel-body">
                        <h4 style="font-size:12px!important;" class="title-hero ">
                            Liste des commandes
                        </h4>

                        <table class="table" id="orders_table">
                            <thead>
                            <th>Chef </th>
                            <th>Client </th>
                            <th>Statut</th>
                            <th>Prix</th>
                            <th>Type</th>
                            <th>Annulez par</th>
                            <th>Heure de livraison</th>
                            <th>Date de création</th>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->chef->user->name}}, {{$order->chef->user->surname}}</td>
                                    <td>{{$order->client->name}}, {{$order->client->surname}}</td>
                                    <td>
                                        @if($order->status == 0)
                                            <h4><span class="label label-warning">En attente</span></h4>
                                        @elseif($order->status == 1)
                                            @if($order->message)
                                                <h4 class="tooltip_styled tooltip-effect-4"><span class="label" style="background-color: lightseagreen">Confirmé par le chef</span>
                                                    <div class="fs1" style="display: inherit;" aria-hidden="true" data-icon="r"></div> <div class="tooltip-content">Le chef a laissé un message</div></h4>
                                            @else
                                                <h4 class="fs1 tooltip_styled tooltip-effect-4"><span class="label" style="background-color: lightseagreen">Confirmé par le chef</span></h4>
                                            @endif
                                        @elseif($order->status == 2)
                                            <h4><span class="label" style="background-color: #415F95">Prêt</span></h4>
                                        @elseif($order->status == 3)
                                            <h4><span class="label label-info">Confirmé par le livreur</span></h4>
                                        @elseif($order->status == 4)
                                            <h4><span class="label label-success">Livré</span></h4>
                                        @else
                                            <h4><span class="label label-danger">Annulé</span></h4>
                                        @endif
                                    </td>
                                    <td>{{$order->price}} DT</td>
                                    <td>
                                        @if($order->delivery_time_id)
                                            Livraison
                                        @else
                                            A emporter
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->cancelled_by)
                                            @if($order->cancelled_by==1)
                                                Client
                                            @else
                                                Chef
                                            @endif
                                        @else
                                            Non annulé
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->delivery_time_id)
                                            {{ $order->delivery_time->time}}
                                        @else
                                            Pas de livraison
                                        @endif
                                    </td>
                                    <td>{{date("j F Y",strtotime($order->created_at))}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function()
        {
            $("#orders_table").dataTable(
                {
                dom: 'Bfrtip',
                buttons: [
                    'excelHtml5', 'pdfHtml5', 'csvHtml5'
                ],
                    "language": {
                        "sProcessing": "Traitement en cours...",
                        "sSearch": "Rechercher&nbsp;:",
                        "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                        "sInfo": "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                        "sInfoEmpty": "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                        "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                        "sInfoPostFix": "",
                        "sLoadingRecords": "Chargement en cours...",
                        "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                        "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                        "oPaginate": {
                            "sFirst": "Premier",
                            "sPrevious": "Pr&eacute;c&eacute;dent",
                            "sNext": "Suivant",
                            "sLast": "Dernier"
                        },
                    }
                });

        });

    </script>
@endsection

@section('footer')
    @include('backOffice.inc.footer')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"/>
@endsection
