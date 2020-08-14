@extends('submain')

<?php  $titleTag =htmlspecialchars( $pub ->file_name); ?>
@section('title', "|  $titleTag " )
<!-- @section('title','| All Saints') -->

@section('cssFiles')
<style type="text/css">
  .col-md-9{
    background-color: white;
  }
</style>

@endsection

@section('leftTwocolomn')


@endsection

@section('informationBody')
<div class="col-md-10 col-md-offset-1">
        <h2>The Publicity</h2> 
        <hr>
        <b> By: <span class="fa fa-user"></span> </b>&nbsp;<font style="" >{{ $pub ->user->name }}</font><br>
         <div class="col-md-12 border">
       <a href="{{ $pub ->pub_link }}" target="_blank">   <img src="/publicity/{{ $pub ->file_name }}" class="img-responsive" alt="Nta foto yabashije ">  </a> 
        <!-- div class="caption"> --><p class="caption"> {!! $pub ->description !!}  </p><!-- </div> -->
</div>
          
          
    </div>

@endsection
  <!--       @yield('javaScriptFiles') -->