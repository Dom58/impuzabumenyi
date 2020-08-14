@extends('submain')
<?php  $titleTag =htmlspecialchars( $gakondo->name); ?>
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
        <h3>Soma Amateka y'umwambaro witwaga "<b>{{ $gakondo ->name }}</b>"</h3> 

        <h3 style="color:blue; text-align: center;">{{ $gakondo ->name }} </h3>
        <center>
        <div class="figure">
          <a href="/imyambaroGakondo/{{$gakondo ->file_name}}" target="_blank">
        <img src="/imyambaroGakondo/{{$gakondo ->file_name}}" class="img-responsive" />
        </a>
        </div>
        </center>
        <br>
         <div class="bodyPost"> 
            <p> {!! $gakondo -> description !!} </p> 
        </div>

        <hr style=" background-color:brown; height:2px;">
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
  
