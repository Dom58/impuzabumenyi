@extends('submain')
@section('title' , '| View Your Image')

@section('cssFiles')
<style type="text/css">
  .col-md-7{
    background-color: whitesmoke;
  }
</style>
@endsection
@section('leftTwocolomn')
    <div class="col-md-7">
       <a href="{{route('gallery.index')}}" class="btn btn-info btn-sm pull-left" style="margin-top: 5px;"><span class="fa fa-arrow-circle-left" style="font-size: 30px;"></span></a>
      <center>
        <h3>Iyi Ifoto yasizweho na <b style="color: brown;"> <i>{{ $gallery->user->name }} {{ $gallery->user->sname}}</i></b></h3>
       <p><b>Taliki ya</b>  <i><span class="fa fa-calendar"></span> <em> {{ date('d/ m/ Y',strtotime($gallery ->created_at)) }} saa  <b>{{ date('g:ia',strtotime($gallery ->created_at)) }} </b></i> </p>
        <p style="margin-top: 10px; color: white; background-color: #183911; text-align: center; margin-bottom: 20px; padding: 5px; font-size: 15px;">{!! $gallery ->description !!}
          <small class="pull-right" style="background-color: black; margin-right: 15px; font-size: 15px; font-weight: bold; border-radius: 8px;text-align: center;"><b>Ikiciro: </b> <span class="fa fa-tag"></span> <i> {{ $gallery->category->name}}</i></small>
        </p>
        
        <h3 style="background-color: #abe4e6cc;">{{ $gallery ->title }}
      </h3>
      </center>
<img class="thumbnail" src="/gallery_Image/{{$gallery->file_name }}" class="img-responsive" width="100%" />

    </div>
  @endsection

  @section('informationBody')

    <div class="col-md-4" style="background-color:#ffffff; margin-bottom:10px; margin-left: 8px; border-radius: 10px">
      <h3 style="text-align: center;">Ibyavuzwe kuri iyi foto </h3>
      <p style="font-size: 17px;"> <span class="fa fa-comments-o"> <b>
            @if($gallery-> gallerycomments->count() ==0)
              {{ $gallery-> gallerycomments->count() }} <font style="color: brown;"> Ntakiravugwa kuri iyi photo. Ba uwambere gutanga igitekerezo. </font>
              @elseif($gallery-> gallerycomments->count() ==1)
              {{ $gallery-> gallerycomments->count() }} </b>  Igitekerezo
            @else
            {{ $gallery-> gallerycomments->count() }} </b>  Ibitekerezo
            @endif
          </span> </p>

       <ul class="list-group">
        
            @foreach($gallery-> gallerycomments as $comment)
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
               <p data-toggle="collapse" data-target="#content{{$comment->id}}" data-parent="#accordion" class="btn btn-sm" style="font-size:11px; cursor: pointer; background-color: #5cb85c; color:white;" ><span class="fa fa-reply" style="color:black;
"></span> musubize</p >               

               <ul style="list-style: none;">
                <li>
                      <div  id="content{{$comment->id}}" class="panel-collapse collapse">
                        <form method="POST" action="{{url('gallery/commentReply')}}" style="border-right: 3px black; margin-top: 8px;">
                      {{ csrf_field() }}
                          <input type="hidden" name="gallerycomment_id" value="{{$comment->id}}" class="form-control" />
                       <textarea cols="20" rows="2" name="reply" placeholder="Andika ubutumwa aha (nturenze amagambo 200)........" class="form-control" required></textarea>
                       
                       <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 30%; margin-top:3px;">Ohereza Umusubize</button>
                       </form>

                      </div> </li>
                    </ul>
            @endif

  <!-- Starting of replies on comments   -->
  <ul style="margin-left: 2px; margin-top: 4px;">
        <p> <span class="fa fa-reply"> {{ $comment-> replygalleries->count()}}</span></p>

      @foreach($comment-> replygalleries as $reply)
      @if($reply->status ==1)
 
          <li class="" style="list-style: none;">         
              <div class="media" style="margin-top: 20px;">
    <div class="media-left media-top">
       @if($reply->user->profile_image ==null && $reply->user->gender==1)
          <img src="/userProfileImage/maleDefault.jpeg" class=" img-circle" width="30px;" /> 
           @elseif($reply->user->profile_image ==null && $reply->user->gender==0)
           <img src="/userProfileImage/femaleDefault.jpeg" class=" img-circle" width="30px;" /> 
           
          @else
          <img src="/userProfileImage/{{ $reply->user->profile_image }}" class=" img-circle" width="30px;" />  
          @endif 
    </div>

    <div class="media-body" >
       <small><i> <span class="fa fa-user-circle" style="font-size: 13px;"></span> {{ $reply->user->name }} {{ $reply->user->sname }} &nbsp;<b><span class="fa fa-clock-o" style="font-size: 15x;"></span></b> <b >{{ $reply->created_at->diffForHumans() }}</b></i></small>
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
      <hr>

      @if(Auth::check())
      <div class="well">
      <h4>Tanga ibitekerezo kuri iyi foto.</h4>
      {!! Form::open(array('url' => 'gallery/photo-comment','data-parseley-validate' =>'','files' => true)) !!}
      
      <input type="hidden" name="gallery_id" value="{{ $gallery->id }}" class="form-control" readonly="true">
      {{ Form::label('comment','Andika Igitekerezo :') }}
         {{ Form::textarea('comment',null,array('class' =>'form-control','maxlength'=>'255','placeholder'=>'Andika igitekerezo aha...nturenze inyuguti 300','rows'=>'5','cols'=>'40')) }}
         <br>
         <div class="form-group"> 
          {{ Form::submit('Ohereza ',array('class' =>'btn btn-success btn-lg btn-block','style' =>'margin-top: 20px','style' =>'margin-bottom: 20px')) }}
          </div>
  {!! Form::close() !!}
  @endif
  </div>
    </div>
@endsection