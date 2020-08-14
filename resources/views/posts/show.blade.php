@extends('submain')
<?php  $titleTag =htmlspecialchars( $post->title); ?>
@section('title', "|  $titleTag " )
@section('cssFiles')
<style type="text/css">
  
 .bodyPost>h5>p{
        color: black;
     padding: 10px;
    }
    .list-group-item>h4>p{
        color: black;
    }
</style>

@endsection
 @section('informationBody')
    <div class="col-md-10 col-md-offset-1"  style=" background-color:white;">
        <h2>Soma Inkuru Irambuye</h2> <hr>
        <b><span class="fa fa-user" style="font-size: 20px;"></span> </b>&nbsp;<font style="color:#FFB556; font-size:18px; margin-right: 20px;" >{{ $post ->user->sname }}</font>
        
        <b><span class="fa fa-calendar-check-o" style="font-size: 17px;"></span></b>&nbsp;<em><i>{{ date('d M, Y',strtotime($post ->created_at)) }}</i></em> 
        <br>
        <h3 style="color:blue;">{{ $post ->title }} </h3>
         <div class="bodyPost"> 
            <p >{!! $post -> body !!}</p> 

            <p style="margin-top: 5px; text-align: center; margin-bottom: 20px; background-color:#dcf1f1e8; width: 40%; border-radius: 40px;" class="pull-right"><b>Ikiciro:</b> <b> {{ $post->category->name}} </b></p>
        </div>

        <hr style=" background-color:brown; height:2px;">
       
        <div class="row">
          <div class="col-md-10 col-md-offset-1" style="background-color: white;">
         <div class="well">  
          <center> <h3> Ibyavuzwe kuri iyi nkuru  </h3> </center>
          <p style="font-size: 20px;"> <span class="fa fa-comments-o"> <b>
            @if($post-> postcomments->count() ==0)
              {{ $post-> postcomments->count() }} <font style="color: brown;"> Ntakiravugwa kuri iyi nkuru. Ba uwambere gutanga igitekerezo. </font>
              @elseif($post-> postcomments->count() ==1)
              {{ $post-> postcomments->count() }} </b>  Igitekerezo
            @else
            {{ $post-> postcomments->count() }}<!--  </b> -->  Ibitekerezo
            @endif
          </span> </p>

       <ul class="list-group">
        
            @foreach($post-> postcomments as $comment)
            @if($comment->status ==1) 

           <li class="list-group-item">
              <p class="pull-right"> 
                @if($comment->user->profile_image ==null &&$comment->user->gender==1)
                <img src="/userProfileImage/maleDefault.jpeg" class="img-responsive img-circle" width="30px;" /> 
                 @elseif($comment->user->profile_image ==null && $comment->user->gender==0)
                 <img src="/userProfileImage/femaleDefault.jpeg" class="img-responsive img-circle" width="30px;" /> 
                 
                @else
                <img src="/userProfileImage/{{ $comment->user->profile_image }}" class="img-responsive img-circle" width="30px;" />  
                @endif 

                <small> By :&nbsp;{{ $comment->user->name }}</small> 
              </p>        
                <p>
             <b><i>  {{ $comment->created_at->diffForHumans() }} </i></b> :&nbsp;
               </p>
               {{ $comment->comment }} &nbsp;&nbsp; 
  

          @if(Auth::check())
               <button data-toggle="collapse" data-target="#content{{$comment->id}}" data-parent="#accordion" class="btn btn-sm" style="font-size:15px; cursor: pointer; background-color: #5cb85c; color:white;" ><span class="fa fa-reply" style="color:black;
"></span> Subiza</button >               

               <ul style="list-style: none;">
                <li>
                      <div  id="content{{$comment->id}}" class="panel-collapse collapse">
                        <form method="POST" action="{{url('/storyReply')}}" style="border-right: 3px black; margin-top: 8px;">
                      {{ csrf_field() }}
                          <input type="hidden" name="storycomment_id" value="{{$comment->id}}" class="form-control" />
                       <textarea cols="20" rows="2" name="reply" placeholder="Andika ubutumwa aha (nturenze amagambo 400)........" class="form-control" required></textarea>
                       
                       <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 40%; margin-top:3px;">Ohereza Umusubize</button>
                       </form>

                      </div> </li>
                    </ul>
            @endif

  <!-- Starting of replies on comments   -->
      <ul style="margin-left: 10px; margin-top: 10px;">
        <p> <span class="fa fa-reply"> {{ $comment-> replycomments->count()}}</span></p>

      @foreach($comment-> replycomments as $reply)
      @if($reply->status ==1)
 
          <li class="list-group-item">         
              <div class="media" style="margin-top: 20px;">
    <div class="media-left media-middle">
       @if($reply->user->profile_image ==null && $reply->user->gender==1)
          <img src="/userProfileImage/maleDefault.jpeg" class=" img-circle" width="30px;" /> 
           @elseif($reply->user->profile_image ==null && $reply->user->gender==0)
           <img src="/userProfileImage/femaleDefault.jpeg" class=" img-circle" width="30px;" /> 
           
          @else
          <img src="/userProfileImage/{{ $reply->user->profile_image }}" class=" img-circle" width="30px;" />  
          @endif 
    </div>

    <div class="media-body" >
       <small><i> <span class="fa fa-user-circle" style="font-size: 20px;"></span> {{ $reply->user->name }} {{ $reply->user->sname }} &nbsp;<b><span class="fa fa-clock-o" style="font-size: 15x;"></span></b> <b >{{ $reply->created_at->diffForHumans() }}</b></i></small>
       <p>{{ $reply->reply }} </p>
    </div>
  </div>
      <!-- ++++++++++++++++++++++++++++++++++++++++ -->           
          </li> 


          <!-- +++++++++++++++++++++++++ -->
         @endif
  @endforeach
        <!-- +++++++++++End of Replies looping++++++++++ -->
           </ul>
           </li>
 @else
    <p style="color:brown;"> <span class="fa fa-warning"></span> This Comment is hidden because it is out-of Purpose. In few days it will be deleted after giving an advice to the writter.</p>
  @endif
  <!-- +++++++++++++++++++ -->
 @endforeach
 <!-- ++++++++++++End of comment looping ++++++++ -->
           
    </ul> 

 </div>
        
       <center>

         @if (Auth::guest())
         <a href="{{route('login')}}" class="btn btn-warning" style="margin-bottom: 30px;">Kanda hano ubashe kugira icyo uvuga kuri iyi nkuru</a>
         @endif

       </center>
        

</div> 
</div>
      @if (Auth::check())
         
     <div class="col-md-8 col-md-offset-2">
      <h3> Gira icyo uvuga kuri iyi nkuru</h3>
    <div id="card-block">
        <form method="POST" action="{{ url('/storyComment') }}">
            
        {{ csrf_field() }}
            <div class="form-group">  
           <input type="hidden" name="post_id" value="{{ $post->id }}" class="form-control" />
            </div>
       <div class="form-group">  
           <textarea type="text" name="comment" id="comment" cols="40" rows="5" placeholder="Andika igitekerezo cyawe aha (nturenze amagambo 600)..." class="form-control" title=" Andika igitekerezo,ubutumwa kuri iyi nkuru (Amagambo ntarengwa ni 600)" data-toggle="tooltip" required></textarea>
            </div>
            <div class="col-md-4 col-md-offset-4">
         <div class="form-group" >  
           <button type="submit" class="btn btn-success form-control"  style="margin-bottom: 30px; font-weight: bold; font-size: 16px;">Ohereza Igitekerezo</button>
           <br>
            </div>
            </div>
           
        </form>
    </div>
</div>  
    @endif
       <!-- End of Ajax form  form reply--> 
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
