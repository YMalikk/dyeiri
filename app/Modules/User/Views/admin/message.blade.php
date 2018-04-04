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
            <h2>Messages</h2>
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
            <div class="col-md-3">
                <a href="#" data-toggle="modal" data-target="#messages" class="btn btn-primary btn-block margin-bottom">Nouveau message</a>

                <div class="box box-solid">
                    <div class="modal-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="#recu" data-toggle="tab"><i class="fa fa-inbox"></i> Reçu

                            <li><a href="#ici" data-toggle="tab"><i class="fa fa-envelope-o"></i> Envoyé</a></li>
                            <li><a href="#supp" data-toggle="tab"><i class="fa fa-trash-o"></i> Supprimé</a></li>
                        </ul>
                    </div>
                    <!-- /.modal-body -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="tab-content clearfix">
                    <div class="tab-pane active" id="recu">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Boite de reception</h3>

                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            @if(count($receivedMessages)==0)
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Pas de messages!</h4>
                                    Votre boite de reception est vide.
                                </div>
                            @else
                                <div class="modal-body no-padding">
                                    <div class="table-responsive mailbox-messages overFlowXHidden">
                                        <table id="receivedTable" class="table table-hover table-striped table3">
                                            <thead><tr>
                                                <th></th><th>De </th><th>Sujet</th><th>Message</th><th>Date</th>
                                            </tr></thead>
                                            <tbody>
                                            @foreach($receivedMessages as $message)
                                                @if($message->status==0)
                                                    <tr style="background: lightgray" data-toggle="modal" id="readMessage" data-message="{{$message->id}}" data-target="#read{{$message->id}}">
                                                @else
                                                    <tr data-toggle="modal" id="readMessage" data-message="{{$message->id}}" data-target="#read{{$message->id}}">
                                                        @endif
                                                        <td><input type="checkbox"></td>
                                                        <td class="mailbox-name">
                                                            <a href="#" >{{ucfirst($message->sender->name)}} {{ucfirst($message->sender->surname)}}</a>
                                                        </td>
                                                        <td class="mailbox-subject"><b>{{$message->subject}}</b></td>
                                                        <td>{{$message->content}} </td>

                                                        <td class="mailbox-date">{{date('d-m-Y H:i', strtotime($message->created_at))}}</td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                        <!-- /.table -->
                                    </div>
                                    <!-- /.mail-box-messages -->
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="ici">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Messages Envoyés</h3>

                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            @if(count($sentMessages)==0)
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Pas de messages!</h4>
                                    Vous n'avez envoyé aucun message.
                                </div>
                            @else
                                <div class="modal-body no-padding">
                                    <div class="table-responsive mailbox-messages overFlowXHidden">
                                        <table id="sentTable" class="table table-hover table-striped table4">
                                            <thead><tr>
                                                <th></th><th>De </th><th>A</th><th>Sujet</th><th>Message</th><th>Date</th>
                                            </tr></thead>
                                            <tbody>
                                            @foreach($sentMessages as $message)
                                                <tr>
                                                    <td><input type="checkbox"></td>
                                                    <td class="mailbox-name"><a href="#" data-toggle="modal" data-target="#send{{$message->id}}" >Admin</a></td>
                                                    <td>{{ucfirst($message->receiver->name)}} {{ucfirst($message->receiver->surname)}}</td>
                                                    <td class="mailbox-subject"><b>{{$message->subject}}</b></td>
                                                    <td>{{$message->content}}  </td>

                                                    <td class="mailbox-date">{{date('d-m-Y H:i', strtotime($message->created_at))}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <!-- /.table -->
                                    </div>
                                    <!-- /.mail-box-messages -->
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="supp">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Messages Supprimés</h3>

                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            @if(count($deletedSentMessages)==0 && count($deletedReceivedMessages)==0 )
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Pas de messages!</h4>
                                    Vous n'avez supprimé aucun message.
                                </div>
                            @else
                                <div class="modal-body no-padding">
                                    <div class="table-responsive mailbox-messages overFlowXHidden">
                                        <table id="deletedTable" class="table table-hover table-striped table4">
                                            <thead><tr>
                                                <th></th><th>De </th><th>Sujet</th><th>Message</th><th>Date</th>
                                            </tr></thead>
                                            <tbody>
                                            @foreach($deletedSentMessages as $message)
                                                <tr>
                                                    <td><input type="checkbox"></td>
                                                    <td class="mailbox-name"><a href="#" data-toggle="modal" data-target="#delete{{$message->id}}" >{{ucfirst($user->name)}} {{ucfirst($user->surname)}}</a></td>
                                                    <td class="mailbox-subject"><b>{{$message->subject}}</b></td>
                                                    <td>{{$message->content}} </td>
                                                    <td class="mailbox-date">{{$message->created_at}}</td>
                                                </tr>
                                            @endforeach
                                            @foreach($deletedReceivedMessages as $message)
                                                <tr>
                                                    <td><input type="checkbox"></td>
                                                    <td class="mailbox-name"><a href="#" data-toggle="modal" data-target="#delete{{$message->id}}" >{{ucfirst($user->name)}} {{ucfirst($user->surname)}}</a></td>
                                                    <td class="mailbox-subject"><b>{{$message->subject}}</b>&nbsp;{{$message->content}}
                                                    </td>
                                                    <td class="mailbox-attachment"></td>
                                                    <td class="mailbox-date">{{date('d-m-Y H:i', strtotime($message->created_at))}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <!-- /.table -->
                                    </div>
                                    <!-- /.mail-box-messages -->
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="modal fade" id="messages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header modalHeader">
                        <button type="button" class="close modalCloseButton" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><b>Envoyé un message</b></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="{{ route('handleAdminSendMessage')}}"
                              enctype="multipart/form-data">

                            {!! csrf_field() !!}
                            <div class="modal-body">
                                <div class="form-group">
                                   <select class="form-control" name="to">
                                       @foreach($users as $user)
                                        <option value="{{$user->id}}">{{ucfirst($user->name)}} {{ucfirst($user->surname)}}</option>
                                       @endforeach
                                   </select>
                                    <input type="hidden" name="destinataire" value="1">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="subject" placeholder="Sujet : ">
                                </div>
                                <div class="form-group">
                                    <textarea id="compose-textarea" name="message" class="form-control height300"></textarea>
                                </div></div>

                            <!-- /.modal-body -->
                            <div class="modal-footer">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-envelope-o"></i> Envoyer</button>
                                </div>
                                <button type="reset" data-dismiss="modal" class="btn btn-primary pull-left"><i class="fa fa-times"></i> Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @foreach($receivedMessages as $message)
            <div class="modal fade" id="read{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header modalHeader">
                            <button type="button" class="close modalCloseButton" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><b>Message reçu</b></h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <!-- /.box-header -->
                                <div class="modal-body no-padding">
                                    <div class="mailbox-read-info">
                                        <h3>{{$message->subject}}</h3>
                                        <h5>De: {{ucfirst($user->name)}} {{ucfirst($user->surname)}} </h5>
                                        <h5>A: {{ucfirst($user->name)}} {{ucfirst($user->surname)}}
                                            <span class="mailbox-read-time pull-right">{{date('d-m-Y H:i', strtotime($message->created_at))}}</span></h5>
                                    </div>
                                    <!-- /.mailbox-read-info -->

                                    <!-- /.mailbox-controls -->
                                    <div class="mailbox-read-message">
                                        {{$message->content}}
                                    </div>
                                    <!-- /.mailbox-read-message -->
                                </div>
                                <!-- /.modal-body -->
                                <!-- /.modal-footer -->
                                <div class="modal-footer">
                                    <div>
                                        <form class="form-horizontal" method="POST" action="{{route('handleDeleteMessage',['id' => $message->id])}}">
                                            {!! csrf_field() !!}
                                            <a href="#" data-toggle="modal" data-target="#messages"  data-dismiss="modal" class="btn btn-success pull-right"> Répondre <i class="fa fa-share"></i></a>
                                            <button type="submit" class="btn btn-danger pull-right marginRight2"><i class="fa fa-trash-o"></i> Supprimer</button>
                                            <button type="reset" data-dismiss="modal" class="btn btn-primary pull-left"><i class="fa fa-times"></i> Retour</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.modal-footer -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($sentMessages as $message)
            <div class="modal fade" id="send{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header modalHeader">
                            <button type="button" class="close modalCloseButton" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><b>Message envoyé</b></h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <!-- /.box-header -->
                                <div class="modal-body no-padding">
                                    <div class="mailbox-read-info">
                                        <h3>{{$message->subject}}</h3>
                                        <h5>De: {{$user->name}} {{$user->surname}}</h5>
                                        <h5>A: Admin
                                            <span class="mailbox-read-time pull-right">{{$message->created_at}}</span></h5>
                                    </div>
                                    <!-- /.mailbox-read-info -->

                                    <!-- /.mailbox-controls -->
                                    <div class="mailbox-read-message">
                                        {{$message->content}}
                                    </div>
                                    <!-- /.mailbox-read-message -->
                                </div>
                                <!-- /.modal-body -->
                                <!-- /.modal-footer -->
                                <div class="modal-footer">
                                    <div>
                                        <form class="form-horizontal" method="POST" action="{{route('handleDeleteMessage',['id' => $message->id])}}">
                                            {!! csrf_field() !!}

                                            <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-trash-o"></i> Supprimer</button>
                                            <button type="reset" data-dismiss="modal" class="btn btn-primary pull-left"><i class="fa fa-times"></i> Retour</button>
                                        </form>
                                    </div>

                                </div>
                                <!-- /.modal-footer -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($deletedSentMessages as $message)
            <div class="modal fade" id="delete{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header modalHeader">
                            <button type="button" class="close modalCloseButton" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><b>Message supprimé</b></h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <!-- /.box-header -->
                                <div class="modal-body no-padding">
                                    <div class="mailbox-read-info">
                                        <h3>{{$message->subject}}</h3>
                                        <h5>De: {{$user->name}} {{$user->surname}}</h5>
                                        <h5>A: Admin </h5>
                                        <span class="mailbox-read-time pull-right">{{$message->created_at}}</span></h5>
                                    </div>
                                    <!-- /.mailbox-read-info -->

                                    <!-- /.mailbox-controls -->
                                    <div class="mailbox-read-message">
                                        {{$message->content}}
                                    </div>
                                    <!-- /.mailbox-read-message -->
                                </div>
                                <!-- /.modal-body -->
                                <!-- /.modal-footer -->
                                <div class="modal-footer">
                                    <div>
                                        <form class="form-horizontal" method="POST" action="{{route('handleRestoreMessage',['id' => $message->id])}}">
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-undo"></i> Restaurer</button>
                                            <button type="reset" data-dismiss="modal" class="btn btn-primary pull-left"><i class="fa fa-times"></i> Retour</button>
                                        </form>
                                    </div>

                                </div>
                                <!-- /.modal-footer -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($deletedReceivedMessages as $message)
            <div class="modal fade" id="delete{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header modalHeader">
                            <button type="button" class="modalCloseButton close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><b>Message supprimé</b></h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <!-- /.box-header -->
                                <div class="modal-body no-padding">
                                    <div class="mailbox-read-info">
                                        <h3>{{$message->subject}}</h3>
                                        <h5>De: Admin </h5>
                                        <h5>A:  {{$user->name}} {{$user->surname}}
                                            <span class="mailbox-read-time pull-right">{{$message->created_at}}</span></h5>
                                    </div>
                                    <!-- /.mailbox-read-info -->

                                    <!-- /.mailbox-controls -->
                                    <div class="mailbox-read-message">
                                        {{$message->content}}
                                    </div>
                                    <!-- /.mailbox-read-message -->
                                </div>
                                <!-- /.modal-body -->
                                <!-- /.modal-footer -->
                                <div class="modal-footer">
                                    <div>
                                        <form class="form-horizontal" method="POST" action="{{route('handleRestoreMessage',['id' => $message->id])}}">

                                            {!! csrf_field() !!}

                                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-undo"></i> Restaurer</button>
                                            <button type="reset" data-dismiss="modal" class="btn btn-primary pull-left"><i class="fa fa-times"></i> Retour</button>
                                        </form>
                                    </div>
                                    <!-- /.modal-footer -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <script>
            $("#receivedTable").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
                "bSort" : false

            });
            $("#sentTable").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
                "bSort" : false

            });
            $("#deletedTable").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
                "bSort" : false
            });
        </script>
        <script>
            $(document).ready(function()
            {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

            $(document).on("click","#readMessage",function()
            {
                var messageData=new FormData();
                var clicked=$(this);
                messageData.append('messageId',$(this).attr("data-message"));
                $.ajax({
                    url:"{{route('handleReadMessage')}}",
                    type:"POST",
                    data:messageData,
                    contentType: false,
                    processData: false,
                    success:function (result) {
                        clicked.css("background","");
                        console.log(result);
                    },
                    error:function()
                    {

                    }
                })
            });
        </script>

@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection