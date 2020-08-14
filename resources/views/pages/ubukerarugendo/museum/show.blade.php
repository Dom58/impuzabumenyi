@extends('submain')
<?php  $titleTag =htmlspecialchars( $museum->name); ?>
@section('title', "|  $titleTag " )
@section('cssFiles')
<style type="text/css">
  
 .bodyPost>h5>p{
        color: black;
     padding: 10px;
    }
    .museum{
      background-color: #5bc0de;
    }
</style>

@endsection
 @section('informationBody')
    <div class="col-md-8"  style=" background-color:#f5f5f5; border-radius: 10px; border: 3px solid gray;">
        <h3>Soma ibyerekeye "<b>{{ $museum ->name }}</b>"</h3> 
        <center>
        <div class="figure">
          <a href="/museums/{{$museum ->file_name}}" target="_blank">
        <img src="/museums/{{$museum ->file_name}}" class="img-responsive" />
        </a>
        <h4 style="color:blue; text-align: center; font-weight: bold;" class="caption">{{ $museum ->name }} </h4>
        </div>
        </center>
         <div class="bodyPost"> 
            <p> {!! $museum -> description !!} </p> 
        </div>

        <div class="line"></div>
        <div class="panel">
          <h4 style="text-align: center; font-weight: bold;">Dore izindi nzu ndangamurage</h4>
          <div class="line"></div>
        @foreach($all_museums as $all_museum)
        <a href="{{ route('museums.show',$all_museum->slug) }}" class="btn btn-default btn-sm museum">
          {{ $all_museum->name }}
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
  
