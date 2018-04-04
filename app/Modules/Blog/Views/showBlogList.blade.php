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
    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="{{asset('plugins/fancyBox')}}/lib/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="{{asset('plugins/fancyBox')}}//source/jquery.fancybox.css?v=2.1.7" type="text/css" media="screen" />
    <script type="text/javascript" src="{{asset('plugins/fancyBox')}}//source/jquery.fancybox.pack.js?v=2.1.7"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="{{asset('plugins/fancyBox')}}/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <script type="text/javascript" src="{{asset('plugins/fancyBox')}}//source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="{{asset('plugins/fancyBox')}}//source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <link rel="stylesheet" href="{{asset('plugins/fancyBox')}}/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <script type="text/javascript" src="{{asset('plugins/fancyBox')}}//source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script> <div class="container">

        <div id="page-title">

            <h2>Blog</h2>

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
                           Liste des publications
                        </h4>

                        @foreach($blogs as $blog)
                            <div class="col-md-4">
                                <div class="panel" >
                                    <div class="panel-body">
                                        <h2 class="title-hero" >

                                            <div class="row">
                                                <div class="col-md-8 col-xs-8">
                                                    <b> {{$blog->title}}</b><br/>
                                                </div>

                                            </div>
                                        </h2>

                                        <div class="example-box-wrapper">
                                            <div class="waiters_panel">
                                                <div >
                                                    <div class="thumbnail-box">
                                                        <div class="thumb-content">
                                                            <div class="center-vertical">
                                                                <div class="center-content">
                                                                    <div class="thumb-btn animated zoomIn">
                                                                        <a rel="fancybox-button" class="btn btn-lg btn-round btn-success fancybox-button" href="{{asset($blog->image)}}" title=""><i class="glyph-icon icon-eye"></i></a>
                                                                   </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="thumb-overlay bg-gray"></div>
                                                        <img class="photo_gallery" src="{{asset($blog->image)}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="font-size:1px;"/>
                                            <div class="row">
                                                <div class="col-md-8 col-xs-8">
                                                    @if($blog->status==1)
                                                        Status : active
                                                    @else
                                                        Status : inactive
                                                    @endif
                                                </div>

                                                <div class="col-md-3 col-xs-3">
                                                    @if($blog->status==1)
                                                        <a href="{{route('handleDisableBlog',array($blog->id,0))}}" class="btn btn-danger pull-left">Supprimer</a>
                                                    @else
                                                        <a href="{{route('handleEnableBlog',array($blog->id,1))}}" class="btn btn-success pull-left">Restaurer</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".fancybox-button").fancybox({
                prevEffect		: 'none',
                nextEffect		: 'none',
                closeBtn		: false,
                'width'         : 940,
                'height'        : 400,
                helpers		: {
                    title	: { type : 'inside' },
                    buttons	: {}
                }
            });

            $(".fancybox-logo").fancybox({
                prevEffect		: false,
                nextEffect		: false,
                closeBtn		: false,
            });
        });
    </script>
@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection
