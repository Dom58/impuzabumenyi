@extends('submain')
<?php  $titleTag =htmlspecialchars( $insigamigani->name); ?>
@section('title', "|  $titleTag " )
@section('cssFiles')
<style type="text/css">
  
 .bodyPost>h5>p{
        color: black;
     padding: 10px;
    }
    .insigamugani{
      background-color: #276161;
      margin-bottom: 3px;
    }
    .insigamugani:hover{
       transform: scaleY(1.3);
    }
</style>

@endsection
 @section('informationBody')
    <div class="col-md-8"  style=" background-color:whitesmoke; border-radius: 10px; border: 3px solid gray;">
        <h3 style="text-align: center;">Soma Insigamugani yitwa "<b>{{ $insigamigani ->name }}</b>"</h3>
        <div class="line"></div> 
         <div class="bodyPost"> 
          <p>{!! $insigamigani ->body !!} </p>

          <div class="line"></div>
          <div class="well">
            <h3 style="text-align: center;">Soma izindi nsigamigani</h3>
            @foreach($all_insigamigani as $insigamugani)
            <a href="{{ route('insigamigani.show',$insigamugani->slug) }}" class="btn btn-info btn-sm insigamugani">
           {{ $insigamugani->name }}
           </a>
           @endforeach
          </div>
          
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
  
