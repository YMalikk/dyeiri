<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('templates/frontOffice/img')}}/pastille-80x80.png" />
    <style>
        /* Loading Spinner */
        .spinner {
            margin: 0;
            width: 70px;
            height: 18px;
            margin: -35px 0 0 -9px;
            position: absolute;
            top: 50%;
            left: 50%;
            text-align: center
        }

        .spinner > div {
            width: 18px;
            height: 18px;
            background-color: #333;
            border-radius: 100%;
            display: inline-block;
            -webkit-animation: bouncedelay 1.4s infinite ease-in-out;
            animation: bouncedelay 1.4s infinite ease-in-out;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both
        }

        .spinner .bounce1 {
            -webkit-animation-delay: -.32s;
            animation-delay: -.32s
        }

        .spinner .bounce2 {
            -webkit-animation-delay: -.16s;
            animation-delay: -.16s
        }

        @-webkit-keyframes bouncedelay {
            0%, 80%, 100% {
                -webkit-transform: scale(0.0)
            }
            40% {
                -webkit-transform: scale(1.0)
            }
        }

        @keyframes bouncedelay {
            0%, 80%, 100% {
                transform: scale(0.0);
                -webkit-transform: scale(0.0)
            }
            40% {
                transform: scale(1.0);
                -webkit-transform: scale(1.0)
            }
        }

        .sfActive
        {
            background: transparent!important;
        }
        #theme-options
        {
            display:none!important;
        }
    </style>


    <meta charset="UTF-8">
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Dyeiri</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/bootstrap/bootstrap.css">


    <!-- HELPERS -->

    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css') }}/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css') }}/backgrounds.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css') }}/boilerplate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css') }}/border-radius.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css') }}/grid.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css') }}/page-transitions.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css') }}/spacing.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css') }}/typography.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css')}}/utils.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css') }}/colors.css">

    <!-- ELEMENTS -->

    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/chat.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/files-box.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/login-box.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/notification-box.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/progress-box.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/todo.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/user-profile.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/mobile-navigation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/badges.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/buttons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/content-box.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/dashboard-box.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/forms.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/images.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/info-box.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/invoice.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/loading-indicators.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/menus.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/panel-box.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/response-messages.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/responsive-tables.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/ribbon.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/social-box.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/tables.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/tile-box.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/inc') }}/timeline.css">


    <!-- ICONS -->

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/icons') }}/fontawesome/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/icons') }}/linecons/linecons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/icons') }}/spinnericon/spinnericon.css">


    <!-- PLUGINS -->

    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/accordion-ui/accordion.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/calendar/calendar.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/carousel/carousel.css">

    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/justgage/justgage.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/morris/morris.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/piegage/piegage.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/xcharts/xcharts.css">

    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/chosen/chosen.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/colorpicker/colorpicker.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/datatable/datatable.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/datepicker/datepicker.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/datepicker-ui/datepicker.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/dialog/dialog.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/dropdown/dropdown.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/dropzone/dropzone.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/fileinput/fileinput.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/inputswitch/inputswitch.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/inputswitch/inputswitch-alt.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/ionrangeslider/ionrangeslider.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/jcrop/jcrop.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/jgrowl/jgrowl.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/loadingbar/loadingbar.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/vectormaps/vectormaps.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/markdown/markdown.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/modal/modal.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/multiselect/multiselect.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/fileupload/fileupload.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/nestable/nestable.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/noty/noty.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/popover/popover.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/prettyphoto/prettyphoto.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/progressbar/progressbar.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/rangeslider/rangeslider.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/slidebars/slidebars.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/slider-ui/slider.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/summernote-wysiwyg/summernote-wysiwyg.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/tabs-ui/tabs.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/themeswitcher/themeswitcher.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/timepicker/timepicker.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/tocify/tocify.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/tooltip/tooltip.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/touchspin/touchspin.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/uniform/uniform.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/wizard/wizard.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/xeditable/xeditable.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/sweetalert/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('plugins') }}/sweetalert/swal-forms.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <!-- Admin theme -->

    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css') }}/layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css') }}/default_colors.css">

    <!-- Components theme -->

    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css') }}/default.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css') }}/border-radius_002.css">

    <!-- Admin responsive -->

    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css') }}/responsive-elements.css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('templates/admin/css') }}/admin-responsive.css">

    <!-- JS Core -->

    <script type="text/javascript" src="{{ asset ('plugins') }}/jquery/jquery.js"></script>
    <script type="text/javascript" src="{{ asset ('plugins') }}/jquery/jquery-core.js"></script>
    <script type="text/javascript" src="{{ asset ('plugins') }}/jquery-ui/jquery-ui-core.js"></script>
    <script type="text/javascript" src="{{ asset ('plugins') }}/jquery-ui/jquery-ui-widget.js"></script>
    <script type="text/javascript" src="{{ asset ('plugins') }}/jquery-ui/jquery-ui-mouse.js"></script>
    <script type="text/javascript" src="{{ asset ('plugins') }}/jquery-ui/jquery-ui-position.js"></script>
    <!--<script type="text/javascript" src="../../assets/js-core/transition.js"></script>-->
    <script type="text/javascript" src="{{ asset ('plugins') }}/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="{{ asset ('plugins') }}/jquery/jquery-cookie.js"></script>
    <script type="text/javascript" src="{{ asset ('plugins') }}/sweetalert/sweetalert.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script type="text/javascript">
        $(window).load(function () {
            setTimeout(function () {
                $('#loading').fadeOut(400, "linear");
            }, 300);
        });
    </script>

    <!-- sweet alert -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert')}}/sweetalert.css"/>
    <script src="{{asset('plugins/sweetalert')}}/sweetalert.min.js"></script>

</head>

