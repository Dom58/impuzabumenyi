@extends('layouts.blog')

@section('title', '| Manage all Trashed Chats')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4" style="border:2px solid black;">
        <h3><span class="fa fa-trash" style="color:red;"></span> All Trashed Chats <b style="color: brown;">{{$chats->count()}}</b></h3>
      </div>
      <div class="col-md-7" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="s" id="chatId" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Search a trached chat...">
      </div>
       </div>
      <div class="col-md-12">
        <hr>
      </div>
    </div>
<!-- +++++++++++++++++++++++++ End of Head ++++++++++++++++++++++++++++++++++++ -->
<div class="row">
      <div class="col-md-12">
        <div >
        <table class="table" id="chatTable">  
          <thead>
    <th>#</th>
      <th>Created_by </th>
      <th>Image</th>
      <th>Title </th>
      <th> Body </th>
      <th> Restore </th>
      <th>Trashed_at</th>
      <th></th>
      </thead>
      <tbody>
        <?php $no=1; ?>
        @foreach( $chats as $chat )
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

           <td>{{ $chat ->title}} </td>
           <td>{{ substr(strip_tags($chat ->body),0,1000) }} {{strlen(strip_tags($chat ->body)) >1000 ? "..." : "" }} 
           </td>
           @role('superadmin|admin')
      <td>
        <form action="{{ url('chat/forum/restorechat') }}" method="POST" style="margin-bottom: 5px;">
        {{ csrf_field()}}
        <input type="hidden" name="trashchat_id" value="{{$chat->id}}">
        <input type="hidden" name="deleted_at" class="form-control">
        <button class="btn btn-warning"><span class="fa fa-signal"></span> Restore</button>
      </form>

      {!! Form::open(['url' =>['chat/forum/deletechat/'.$chat->id],'method' =>'DELETE','onsubmit'=>'return ConfirmDelete()' ]) !!}
<!-- {{ method_field('DELETE')}} -->
<button type="submit" class="btn btn-danger"> <span class="fa fa-trash"> Delete</span></button>
 {!! Form::close() !!}
      </td> 
@endrole
          <td>
            {{ $chat ->deleted_at }}
          </td>
  
        </tr>
          @endforeach
      </tbody>
    </table>
    <div class="text-center">
    {{ $chats->links() }}
     </div>
  </div>
</div>
</div>
  @endsection
         @section('scripts')
    <script>
$(document).ready(function(){
  $("#chatId").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#chatTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script type="text/javascript">
  
  function ConfirmDelete(){
    return confirm('Are you Sure, to Delete this Chat?');
  }
</script>
@endsection