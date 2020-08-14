@extends('submain')

@section('title','| Tanga ikiganiro | Ibiganiro Byose')

@section('cssFiles')
<style type="text/css">
body{
  background-image: url('/background/2.png');
}
  .col-md-10{
    background-color: white;
  }
  .fa-reply{
    color: green;
  }
  .fa-reply:hover{
    color: blue;
    transition: .6s;
  }
  .accordion {
    background-color: #719ebd;
    font-size: 13px;
  }
</style>

@endsection
@section('leftTwocolomn')
<div class="col-md-8" style="margin-right: 30px; margin-bottom: 20px; border: 1px solid gray; background-color: white;">
	<h3>Soma kandi uganire ku ibitekerezo  <span class="badge" style="background-color: indigo;">{{ $allchats->count() }}</span> byatanzwe n'abandi</h3>
	<hr>
  @foreach($chats as $chat)
	<div class="col-lg-10 col-md-10  col-sm-10 col-md-offset-1">
          <div class="panel panel-default" style="border: 3px solid #0c2105;">
              <div class="panel-body">
                <div class="content">
                  <p style="font-style: italic; font-weight: bold;"><center><b style="font-size: 16px;"> {{ $chat->title }} </b></center> <br> <b class="pull-right"><span class="fa fa-calendar"></span> {{ date('d - m - Y',strtotime($chat ->created_at)) }} saa  {{ date('g:ia',strtotime($chat ->created_at)) }} &nbsp; <span class="fa fa-user-circle " style="color: blue;"> {{ $chat->user->name }}</span> </b></p>
                    
                    <br>
                    @if(empty($chat->file_name))
                    <p class="title" style="color: brown; font-weight: bold; border: 1px solid red;"><span class="fa fa-warning"></span> Iyi Nkuru nta Foto ifite!</p>
                    @else
                    <p> <img src="/chatImage/{{$chat->file_name}}" class="figure img-responsive" height="100px;"></p>
                    @endif
                      <p> <span class="fa fa-hand-o-right"></span> {!! $chat->body !!}
                       <br>
                      <font  data-target="#chat{{$chat->id}}" data-parent="#accordion" data-toggle="modal" class="accordion btn btn-success btn-sm">Kanda Utange igitekerezo kuri iyi nkuru</font> 
                      <br>
                    </p>
       <!-- +++++++++Comment+++++++++++ -->
      <div class="well">
     <center> 
      <h4><b> Ibyavuzwe kuri iyi nkuru</b>  </h4> </center>

      <p style="font-size: 16px;"> 
            <span class="fa fa-comments-o">
            
            @if($chat-> chatcomments->count() ==0)
              {{ $chat-> chatcomments->count() }} 
              <font style="color: brown;"> 
                <b>Ntakiravugwa kuri iyi nkuru yo hejuru. Ba uwambere gutanga igitekerezo. </b>
              </font>
              @elseif($chat-> chatcomments->count() ==1)
             <b> {{ $chat-> chatcomments->count() }} 
             Igitekerezo </b>
            @else
           <b> {{ $chat-> chatcomments->count() }}</b> Ibitekerezo
            @endif
          </span> 
        </p>
        <ul class="list-group">
           @foreach($chat-> chatcomments as $comment)
            @if($comment->status ==1) 
            <li class="list-group-item">
              <p class="pull-right"> 

                @if($comment->user->profile_image ==null && $comment->user->gender==1)
                <img src="/userProfileImage/maleDefault.jpeg" class="img-responsive img-circle" width="30px;" /> 

                 @elseif($comment->user->profile_image ==null && $comment->user->gender==0)
                 <img src="/userProfileImage/femaleDefault.jpeg" class="img-responsive img-circle" width="30px;" /> 
                 
                @else
                <img src="/userProfileImage/{{ $comment->user->profile_image }}" class="img-responsive img-circle" width="30px;" />  
                @endif 
                <small> <span class="fa fa-user"></span> {{ $comment->user->name }}</small> 
              </p>

              <p>
             <b><i>  {{ $comment->created_at->diffForHumans() }} </i></b> :&nbsp;
             <br>
             {{ $comment->comment }}&nbsp;&nbsp;
             <span class="fa fa-reply" style="font-size: 17px;"></span>
               </p>


            </li>
          @endif
        @endforeach
        </ul> 
 </div>
        <!-- +++++++++++++++++++ -->
                    <!-- ++++++++++Collape++++++++++ -->
                      <ul style="list-style: none;">
                <li>
                      <div  id="chat{{$chat->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="true" data-backdrop="static"  style="width:100%; margin-left: 1%; margin-top: 20%; ">

                        <div class="modal-dialog">
                          <div class="modal-content">
                        <div class="modal-header" style="background-color: #e4fcfc">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: red;" ><b>&times Funga</b> 
                              </button>

                              <h3 class="modal-title" id="myModalLabel">Andika Igitekerezo Cyawe.
                              </h3>
                            </div>

                        <div class="modal-body" style=" ">
                        <form method="POST" action="{{url('/chat/forum/chatcomment')}}" style="border-right: 3px black; margin-top: 8px;">
                      {{ csrf_field() }}
                          <input type="hidden" name="chat_id" value="{{$chat->id}}" class="form-control" />
                       <textarea cols="40" rows="4" name="comment" placeholder="Andika ubutumwa aha (nturenze amagambo 400)........" class="form-control" required></textarea>
                       
                       <button type="submit" class="btn btn-info btn-lg" style="margin-left: 20%; margin-top:3px;">Ohereza Igitekerezo</button>
                       </form>
                     </div>
                   </div>
                 </div>

                      </div> </li>
                    </ul>
                    <!-- ++++++++++End Comment Collapse++++++++++ -->
                </div>
              </div>
          </div>
        </div>
        <br>
        @endforeach
        <center><p>{{ $chats->links() }}</p></center>
        <!-- ++++++++ -->
</div>
@endsection

@section('informationBody')
<div class="col-md-3" style=" background-color: whitesmoke; border: 3px solid #cecece; border-radius: 8px; box-shadow: -5px 15px 5px 5px #282727;">
	 <h4><b>Andika inkuru /Igitekerezo </b></h4>  
        <hr>
       {!! Form::open(array('route' => 'tuganire.store','data-parseley-validate' =>'','files' => true)) !!}
          
        <label>Umutwe w'Igitekerezo</label>
        {{ Form::text('title',null,array('class' =>'form-control','required' =>'','maxlength'=>'100','placeholder'=>'Andika Umutwe wi inkuru...','title'=>'Andika Umutwe wi nkuru. Icyitondendwa: Uyu mutwe uba udasa niyizindi nkuru zanditswe.','data-placement'=>'top','data-toggle'=>'tooltip','id'=>'title')) }}
        <br>
          
          {{ Form::label('body',"Andika igitekerezo/ Icyifuzo:") }}
        {{Form::textarea('body',null,array('class' =>'form-control','rows'=>'5','cols'=>'40','title'=>'Andika igitekerezo,Ikibazo,ikifuzo cyangwa inkuru wateguye neza,uyisangize abandi.','data-placement'=>'top','data-toggle'=>'tooltip','id'=>'body','placeholder'=>'Andika aha...' )) }}

        <div class="panel-body text-center" style="background-color: #ebf7e6; margin-bottom: 15px; margin-top: 10px;">
                <img class="profile-img " id="uploadedimage" src="" alt="no Image" width="100%" height="50%"  style="border: 3px solid black;">
                <p>
                 {{ Form::label('image', 'Ifoto ( W400 x H300 )', ['class' => 'form-spacing-top']) }}
                 <p style="color: brown;"><span class="fa fa-warning" style="color:red;"></span> (Washyiraho ifoto y'inkuru ubaye uyifite, nturenze ifoto ya 1Mbs)</p>
                 {{ Form::file('image', ['id' => 'jimage','class'=>'form-control']) }}
                </p>
                <p>
                    <span id="imageerror" style="font-weight: bold; color: red"></span>
                </p>
          </div>

        <div class="col-md-6 col-md-offset-3">
        {{ Form::submit('Ohereza',array('class' =>'btn btn-primary btn-lg btn-block','style' =>'margin-top: 5px; margin-bottom: 20px;')) }}
        </div>
        {!! Form::close() !!}
</div>
@endsection



  @section('javaScriptFiles')
  <script type="text/javascript">
  
  $(document).ready(function(){
  	$('#title').tooltip();
    $('#body').tooltip();
  });

</script>

 <script>
         $(document).ready(function() {
             document.getElementById("jimage").onchange = function () {
                 var reader = new FileReader();

                 reader.onload = function (e) {
                     if (e.total > 1000000) {
                         $('#imageerror').text('File is too large');
                         $jimage = $("#jimage");
                         $jimage.val("");
                         $jimage.wrap('<form>').closest('form').get(0).reset();
                         $jimage.unwrap();
                         $('#uploadedimage').removeAttr('src');
                         return;
                     }
                     $('#imageerror').text('');
                     document.getElementById("uploadedimage").src = e.target.result;
                 };
                 reader.readAsDataURL(this.files[0]);
             };
         });
  </script>
@endsection
