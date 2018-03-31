@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
@stop

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <section class="page_content">
        <div class="container">
<div class="row">
    <div class="col-md-3">
        <a href="#" data-toggle="modal" data-target="#messages" class="btn btn-primary btn-block margin-bottom">Nouveau message</a>

        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Dossiers</h3>

                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
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
                                                <a href="#" >Admin</a>
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
                                        <th></th><th>De </th><th>Sujet</th><th>Message</th><th>Date</th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($sentMessages as $message)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td class="mailbox-name"><a href="#" data-toggle="modal" data-target="#send{{$message->id}}" >Admin</a></td>
                                            <td class="mailbox-subject"><b>{{$message->subject}}</b></td>
                                            <td>{{$message->content}}  </td>

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
                                            <td class="mailbox-name"><a href="#" data-toggle="modal" data-target="#delete{{$message->id}}" >Admin</a></td>
                                            <td class="mailbox-subject"><b>{{$message->subject}}</b></td>
                                            <td>{{$message->content}} </td>
                                            <td class="mailbox-attachment"></td>
                                            <td class="mailbox-date">{{$message->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    @foreach($deletedReceivedMessages as $message)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td class="mailbox-name"><a href="#" data-toggle="modal" data-target="#delete{{$message->id}}" >Admin</a></td>
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
        </div>
    </section>
    <div class="modal fade" id="messages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modalHeader">
                    <button type="button" class="close modalCloseButton" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><b>Envoyé un message</b></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ route('handleSendMessage')}}"
                          enctype="multipart/form-data">

                        {!! csrf_field() !!}
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control"  placeholder="Destinataire : Administrateur" disabled>
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
                                    <h5>De: Admin </h5>
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
@stop
@section('footer')
    @include('frontOffice.inc.footer')
@endsection