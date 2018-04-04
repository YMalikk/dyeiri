@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@stop

@section('header')
    @include('frontOffice.inc.header')
@stop

@section('content')
   <section class="page_content">
       <form action="{{route('handleSubscriptionProviderType')}}" method="POST">
           {!! csrf_field() !!}
            <div class="row col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 margin_30 col-sm-12 col-sm-offset-0">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4" style="text-align: center;">
                        Inscription en tant que : <br>
                        <input type="radio" id="contactChoice1" name="userType" value="client">
                        <label for="contactChoice1">Client</label><br>

                        <input type="radio" id="contactChoice2" name="userType" value="chef">
                        <label for="contactChoice2">Chef</label>

                        <button type="submit" class="btn btn-submit">Connexion</button>
                    </div>
                </div>
            </div>
       </form>
   </section>
@stop
@section('footer')
    @include('frontOffice.inc.footer')
@endsection
