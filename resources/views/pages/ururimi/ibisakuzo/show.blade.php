@extends('submain')
<?php  $titleTag =htmlspecialchars( $igisakuzo->name); ?>
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
    <div class="col-md-8"  style=" background-color:white; border-radius: 10px; border: 3px solid gray;">
        <h3>Sakwe Sakwe! Soma... "<b>{{ $igisakuzo ->name }}</b>"</h3> 
         <div class="bodyPost"> 
          <h3 style="color:blue; text-align: center;">{{ $igisakuzo ->name }} </h3>
            <p style="text-align: center;">Igisubizo: <b> {!! $igisakuzo -> kice !!}</b> </p> 
        </div>
<div class="line"></div>
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
  
