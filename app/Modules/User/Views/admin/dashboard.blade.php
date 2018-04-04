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
    <style>
        .commandsOnWaitList
        {
            max-height: 250px;
            overflow:auto
        }

        .commandsOnWait
        {
            white-space: pre-line;
            line-height: unset;
        }

    </style>

    <div class="container">

        <div id="page-title">
            <h2>Dashbaord Dyeiri </h2>
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
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-box dashboard-box-chart bg-white content-box">
                    <div class="content-wrapper">
                        <div class="header">
                            {{count($chefs)}}
                            <span>Nombre de chef traités Dyeiri</span>
                        </div>
                        <div class="bs-label bg-green"></div>
                        <div class="center-div sparkline-big-alt">
                            {{$months[0]}},
                            {{$months[1]}},
                            {{$months[2]}},
                            {{$months[3]}},
                            {{$months[4]}},
                            {{$months[5]}},
                            {{$months[6]}},
                            {{$months[7]}},
                            {{$months[8]}},
                            {{$months[9]}},
                            {{$months[10]}},
                            {{$months[11]}}
                        </div>
                        <div class="row list-grade">
                            <div class="col-md-1">Janvier</div>
                            <div class="col-md-1">Février</div>
                            <div class="col-md-1">Mars</div>
                            <div class="col-md-1">Avril</div>
                            <div class="col-md-1">Mai</div>
                            <div class="col-md-1">Juin</div>
                            <div class="col-md-1">Juillet</div>
                            <div class="col-md-1">Aout</div>
                            <div class="col-md-1">Septembre</div>
                            <div class="col-md-1">October</div>
                            <div class="col-md-1">Novembre</div>
                            <div class="col-md-1">Décembre</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-box dashboard-box-chart bg-white content-box">
                    <div class="content-wrapper">
                        <div class="header">
                            {{count($users)}}
                            <span>Nombre de clients traités Dyeiri</span>
                        </div>
                        <div class="bs-label bg-green"></div>
                        <div class="center-div sparkline-big-alt">
                            {{$monthsUser[0]}},
                            {{$monthsUser[1]}},
                            {{$monthsUser[2]}},
                            {{$monthsUser[3]}},
                            {{$monthsUser[4]}},
                            {{$monthsUser[5]}},
                            {{$monthsUser[6]}},
                            {{$monthsUser[7]}},
                            {{$monthsUser[8]}},
                            {{$monthsUser[9]}},
                            {{$monthsUser[10]}},
                            {{$monthsUser[11]}}
                        </div>
                        <div class="row list-grade">
                            <div class="col-md-1">Janvier</div>
                            <div class="col-md-1">Février</div>
                            <div class="col-md-1">Mars</div>
                            <div class="col-md-1">Avril</div>
                            <div class="col-md-1">Mai</div>
                            <div class="col-md-1">Juin</div>
                            <div class="col-md-1">Juillet</div>
                            <div class="col-md-1">Aout</div>
                            <div class="col-md-1">Septembre</div>
                            <div class="col-md-1">October</div>
                            <div class="col-md-1">Novembre</div>
                            <div class="col-md-1">Décembre</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-box dashboard-box-chart bg-white content-box">
                    <div class="content-wrapper">
                        <div class="header">
                            Les chef
                        </div>
                        <table class="table" id="users_table">
                            <thead>
                            <th>Nom </th>
                            <th>Prénom </th>
                            <th>Photo</th>
                            <th>Email</th>
                            </thead>
                            <tbody>
                            @for($i=0;$i<4;$i++)
                                @if($i<count($chefs))
                                    <tr>
                                        <td>{{$chefs[$i]->name}}</td>
                                        <td>{{$chefs[$i]->surname}}</td>
                                        @if( strpos( $chefs[$i]->image, "storage/uploads/chefs" ) !== false )

                                            <td><img class="img-circle" width="75px" src="{{asset($chefs[$i]->image)}}"/></td>
                                        @else
                                            <td><img class="img-circle" width="75px" src="{{$chefs[$i]->image}}"/></td>
                                        @endif

                                        <td>{{$chefs[$i]->email}}</td>
                                    </tr>
                                @endif
                            @endfor
                            </tbody>
                        </table>
                    </div>
                    <div class="button-pane">
                        <div class="size-md float-left">
                            <a href="{{route('showChefList')}}" title="">
                                Tous les chefs
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-box dashboard-box-chart bg-white content-box">
                    <div class="content-wrapper">
                        <div class="header">
                            Les clients
                        </div>
                        <table class="table" id="users_table">
                            <thead>
                            <th>Nom </th>
                            <th>Prénom </th>
                            <th>Photo</th>
                            <th>Email</th>
                            <th>Date de création</th>
                            </thead>
                            <tbody>
                            @for($i=0;$i<4;$i++)
                                @if($i<count($users))
                                    <tr>
                                        <td>{{$users[$i]->name}}</td>
                                        <td>{{$users[$i]->surname}}</td>
                                        @if( strpos( $users[$i]->image, "storage/uploads/chefs" ) !== false )

                                            <td><img class="img-circle" width="75px" src="{{asset($users[$i]->image)}}"/></td>
                                        @else
                                            <td><img class="img-circle" width="75px" src="{{$users[$i]->image}}"/></td>
                                        @endif

                                        <td>{{$users[$i]->email}}</td>
                                        <td>{{$users[$i]->created_at}}</td>
                                    </tr>
                                @endif
                            @endfor
                            </tbody>
                        </table>
                    </div>
                    <div class="button-pane">
                        <div class="size-md float-left">
                            <a href="{{route('showClientList')}}" title="">
                                Tous les clients
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection