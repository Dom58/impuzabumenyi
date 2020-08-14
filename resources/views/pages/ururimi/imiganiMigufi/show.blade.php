@extends('submain')
<?php  $titleTag =htmlspecialchars( $imiganimigufi->name); ?>
@section('title', "|  $titleTag " )
@section('cssFiles')
<style type="text/css">
  
 .bodyPost>h5>p{
        color: black;
     padding: 10px;
    }
</style>

@endsection
 @section('informationBody')
    <div class="col-md-8"  style=" background-color:whitesmoke; border-radius: 10px; border: 3px solid gray;">
        <h3 style="text-align: center;">Umugani witwa "<b>{{ $imiganimigufi ->name }}</b>"</h3> 
         <div class="bodyPost"> 
          <div class="line"></div>
          <h3 style="text-align: center;">Igisobanuro cy'uyu mugani</h3>
            <p style="text-align: center;"> {!! $imiganimigufi ->igisobanuro !!} </p> 
        </div>
<div class="line"></div>
<h2><a href="{{route('imigani_migufi.index')}}"><span class="fa fa-arrow-circle-o-left" style="font-size: 40px; color: green;"></span></a> </h2>
    </div>
    @endsection
  @section('javaScriptFiles')
   <script type="text/javascript">
  
  // Hover only display a title
  $(document).ready(function(){

  $('#comment').tooltip();
  });
</script>
  @endsection
  
