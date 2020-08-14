@extends('submain')
<?php  $titleTag =htmlspecialchars( $ahantunyaburanga->name); ?>
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
        <h3>Soma Amateka y'ahantu Nyaburanga hitwa "<b>{{ $ahantunyaburanga ->name }}</b>"</h3> 

        <h3 style="color:blue; text-align: center;">{{ $ahantunyaburanga ->name }} </h3>
        <center>
        <div class="figure">
          <a href="/Ahantunyaburanga/{{$ahantunyaburanga ->file_name}}" target="_blank">
        <img src="/Ahantunyaburanga/{{$ahantunyaburanga ->file_name}}" class="img-responsive" />
        </a>
        </div>
        </center>
        <br>
         <div class="bodyPost"> 
            <p> {!! $ahantunyaburanga -> description !!} </p> 
        </div>

        <hr style=" background-color:brown; height:2px;">
        <div class="col-md-10 col-md-offset-1">
          <div class="well">  
          <center> <h3> Ibitekerezo Byatanzwe kuri aha hantu nyaburanga  </h3> </center>
          <p style="font-size: 20px;"> <span class="fa fa-comments-o"> <b>
            @if($ahantunyaburanga-> comments->count() ==0)
              {{ $ahantunyaburanga-> comments->count() }} <font style="color: brown;"> Ntakiravugwa kuri aha hantu Nyaburanga. Ba uwambere gutanga igitekerezo. </font>
              @elseif($ahantunyaburanga-> comments->count() ==1)
              {{ $ahantunyaburanga-> comments->count() }} </b>  Igitekerezo
            @else
            {{ $ahantunyaburanga-> comments->count() }}<!--  </b> -->  Ibitekerezo
            @endif
          </span> </p>

       <ul class="list-group">
        
            @foreach($ahantunyaburanga-> comments as $comment)
            @if($comment->status ==1) 

           <li class="list-group-item">
              <p class="pull-right"> 
                <small> By :&nbsp;{{ $comment->name }}</small> 
              </p>        
                <p>
             <b><i>  {{ $comment->created_at->diffForHumans() }} </i></b> :&nbsp;
               </p>
               {{ $comment->comment }} &nbsp;&nbsp; 
  </li>
  @endif
  @endforeach
  </ul>
  </div>             
          <hr>
        <h3 style="text-align: center;">Tanga Igitekerezo kuri aha hantu Nyaburanga</h3>
        @if(Auth::guest())
        <form action="{{url('amateka/all/ahantunyaburanga_comment')}}" method="POST">
          {{ csrf_field()}}
          <input type="hidden" name="ahantunyaburanga_id" value="{{ $ahantunyaburanga->id}}">
          <input type="text" name="name" placeholder="Andika Izina ryawe aha..." class="form-control">
          <br>
          <input type="email" name="email" placeholder="Andika Imeli yawe aha..." class="form-control">

          <textarea name="comment" cols="40" rows="5" placeholder="Andika igitekerezo aha...." class="form-control" style="margin-top: 10px;"></textarea>
          <div class="col-md-6 col-md-offset-3">
          <button class="btn btn-primary" style="margin-top: 20px; margin-bottom: 20px;">Ohereza Igitekerezo</button>
        </div>
        </form>
        @else
        <form action="{{url('amateka/all/ahantunyaburanga_comment')}}" method="POST">
          {{ csrf_field()}}
          <input type="hidden" name="ahantunyaburanga_id" value="{{ $ahantunyaburanga->id}}">
          <input type="hidden" name="name" value="{{ Auth::user()->name}}" placeholder="Andika Izina ryawe aha..." class="form-control" >
          <br>
          <input type="hidden" name="email" value="{{ Auth::user()->email}}" placeholder="Andika Imeli yawe aha..." class="form-control">

          <textarea name="comment" cols="40" rows="5" placeholder="Andika igitekerezo aha...." class="form-control" style="margin-top: 10px;"></textarea>
          <div class="col-md-6 col-md-offset-3">
          <button class="btn btn-primary" style="margin-top: 20px; margin-bottom: 20px;">Ohereza Igitekerezo</button>
          </div>
        </form>
        @endif
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
  
