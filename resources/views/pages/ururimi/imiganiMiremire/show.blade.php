@extends('submain')
<?php  $titleTag =htmlspecialchars( $imiganimiremire->name); ?>
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
        <h3 style="text-align: center;">Soma umugani witwa "<b>{{ $imiganimiremire ->title }}</b>"</h3> 
         <div class="bodyPost"> 
          <p>{!! $imiganimiremire ->body !!} </p>

          <div class="line"></div>
          <h2 style="text-align: center;">Igisobanuro cy'umugani</h2>
            <p style="text-align: center;"> {!! $imiganimiremire ->igisobanuro !!} </p> 
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
  
