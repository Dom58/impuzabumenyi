@extends('submain')
<?php  $titleTag =htmlspecialchars( $park->name); ?>
@section('title', "|  $titleTag " )
@section('cssFiles')
<style type="text/css">
  
 .bodyPost>h5>p{
        color: black;
     padding: 10px;
    }
  .park{
    background-color: #5cb85c;
    color: white;
  }
</style>

@endsection
 @section('informationBody')
    <div class="col-md-8"  style=" background-color:#e1f3d5; border-radius: 10px; border: 3px solid gray;">
        <h3>Soma Amateka ya "<b>{{ $park ->name }}</b>"</h3> 
        <center>
        <div class="figure">
          <a href="/Parks/{{$park ->file_name}}" target="_blank">
        <img src="/Parks/{{$park ->file_name}}" class="img-responsive" />
        </a>
        <h4 style="color:blue; text-align: center;" class="caption">{{ $park ->name }} </h4>
        </div>
        </center>
         <div class="bodyPost"> 
            <p> {!! $park -> description !!} </p> 
        </div>

        <div class="line"></div>
        <div class="panel">
          <h4 style="text-align: center; font-weight: bold;">Soma izindi parike zo mu Rwanda</h4>
          <div class="line"></div>
        @foreach($all_parks as $all_park)
        <a href="{{ route('parks.show',$all_park->slug) }}" class="btn btn-default btn-sm park">
          {{ $all_park->name }}
        </a>
        @endforeach
        </div>
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
  
