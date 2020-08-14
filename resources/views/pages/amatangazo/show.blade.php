@extends('submain')

<?php  $titleTag =htmlspecialchars( date('d F, Y',strtotime($itangazo->updated_at))); ?>

@section('title', "|  $titleTag " )
<!-- @section('title','| All Saints') -->

@section('cssFiles')
<style type="text/css">
  .col-md-8{
    background-color: white;
  }
</style>

@endsection

@section('leftTwocolomn')


@endsection

@section('informationBody')
<div class="col-md-8 col-md-offset-2">
        <h2>Itangazo</h2> 
        <hr>
        <b> By: <span class="fa fa-user"></span> </b>&nbsp;<font style="" >{{  $itangazo ->user->name }}</font><br>
         <div class="col-md-12 border">
       <a href="{{  $itangazo ->pub_link }}" target="_blank">   
        {!!  $itangazo ->description !!}  </a>
      <p class="pull-right" style="margin-bottom: 10px;"> <span class="badge"> 
@if( $itangazo ->news_type == 1) 
             <b >Amatangazo Rusange</b>

              @elseif ($itangazo ->news_type == 2 )
             <b >Amatangazo Amenyesha</b>

              @elseif ($itangazo ->news_type == 3 )
             <b >Emergency news</b>

            @else 
        <b> Unknown Type</b>
            @endif
        </span>
      </p>
</div>
          
          
    </div>

@endsection
  <!--       @yield('javaScriptFiles') -->