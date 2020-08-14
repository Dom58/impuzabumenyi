@extends('layouts.blog')

@section('title', '| Manage Chats')

@section('stylesheets')
<style>

  body{
    background-color:black;
  }
</style>
@endsection

@section('content')
<div class="row">
      <div class="col-md-4" style="border:2px solid white; border-radius: 8px;">
     <h2 style=" color: white;">The Chats</h2>
     @role('superadmin|admin|editor')
 <h3> <a href="{{ url('chat/forum/chatcomment_statistic')}}" style=" color: green;" target="_blank"><span class="fa fa-eye"></span> Chats Comments Dashboard </a> <b style="color: brown;"><span class="fa fa-comments"></span>{{$comments->count()}}</b></h3>
<hr>
 <h3><a href="{{ url('chat/forum/trashed_chats')}}"><span class="fa fa-trash" style="color:red;"></span> Trashed Chats <b style="color: brown;">{{$trashedchats->count()}}</b></a>
 </h3>
 @endrole
      </div>
      <div class="col-md-5" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="history" id="HistoryInput" class="form-control" value="{{ isset($search) ? $search : ''}}" placeholder="Seach a Chating message...">
      </div>
       </div>
      <div class="col-md-2">
        <a href="{{route('tuganire.index')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Create a Chat Story</a>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
    </div>
<!-- +++++++++++++++++++++++++++++++++++++++ -->
<div class="row">
<div class="col-md-12" style="background-color: #352222;">
            <center>
          <h3 style=" color: white;">{{ $chats->count() }} Chats</h3>
        </center>

<div id="history">
        <table class="table"  id="HistoryTable" style="background-color: #e6e9cd; color: #557b71;">  
          <thead>
    <th>#</th>
       <th>Username & Email </th>
      <th>Image</th>
      <th>Title</th>
      <th>body</th>
      <th>Status</th>
      <th>created_at</th>
      
      <th></th>
      </thead>

      <tbody>
        <?php $no=1 ?>
        @foreach( $allchats as $chat )
      <tr>
           <th>{{ $no++ }}</th>
           <td><b style="color: brown;">{{ $chat->user->username}} </b>&nbsp; {{ $chat->user->email }}</td>
           <td>
            @if(empty($chat ->file_name))
                <b style="color: brown;">No Image Specified</b>
            @else
            <img src="/chatImage/{{ $chat ->file_name }} " width="100" height="100" class="img-circle"/>
            @endif 
          </td>
           <td>{{ $chat ->title }} </td>
           <td>{{ substr(strip_tags($chat ->body),0,100) }} {{strlen(strip_tags($chat ->body)) >100 ? "..." : "" }} 
           </td>
    @role('superadmin|admin|editor')
<td>
<form method="POST" action="{{ url('chat/forum/chat_approval') }}">
      {{ csrf_field()}}

      @if( $chat ->status == 0) 
      <input <?php if( $chat->status == 0)  ?> type="hidden" name="status" value="1">
        <input type="hidden" name="chatId" value="{{$chat ->id}}">
        <button class="btn btn-warning btn-sm">UnPublished</button>
      @elseif ($chat ->status == 1 )
      <input <?php if( $chat->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
        <input type="hidden" name="chatId" value="{{$chat ->id}}">
         <button  class="btn btn-primary btn-sm">Published</button>
    @endif
   </form>

     @role('superadmin|admin')
             {!! Form::open(['route' =>['tuganire.destroy',$chat ->id],'method' =>'DELETE','onsubmit'=>'return ConfirmDelete()']) !!}
            {!! Form::submit('Trash sms',['class' =>'btn btn-danger btn-block','style' =>'margin-top: 10px' ]) !!}
            {!! Form::close() !!}
          @endrole
</td>
@endrole
      <td><b>{{ $chat ->created_at ->diffForHumans() }} </b></td>
<td> 
  <a href="{{ route('tuganire.show',$chat->id) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
  @role('superadmin|admin|editor')
  <a href="{{route('tuganire.edit' ,$chat ->id )}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
@endrole
</td>
      </tr>
          @endforeach
      </tbody>

    </table>
    <center> {!! $allchats ->links(); !!}</center>
  </div>
    </div>
  </div>
@endsection
@section('scripts')
<script type="text/javascript">
  
  function ConfirmDelete(){
    return confirm('Are you Sure, to Trash this Chat?');
  }
</script>

<script>
$(document).ready(function(){
  $("#HistoryInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#HistoryTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  @endsection

     
  