@extends('layouts.blog')

@section('title', '| Comments| Replies Analysis')

@section('stylesheets')
<style type="text/css">
  
 #circle {
   background: #25844d;
   border-radius: 50%;
   text-align: center;
   height: 250px;
   width: 350px;
 }
 #circleTwo {
   background: #3a3a65;
   border-radius: 50%;
   text-align: center;
   height: 250px;
   width: 250px;
 }
 #circleThree {
   background: #b10513;
   border-radius: 50%;
   text-align: center;
   height: 250px;
   width: 250px;
 }
 h2>a{
  color: white;
 }
 h2>a:hover{
  color: black;
 }
  h3>a{
  color: white;
 }
 h3>a:hover{
  color: black;
   text-decoration: none;
 }
/*+++++++++++++++++++ 2 ++++++++++++++++++++++*/
</style>   
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->
  @section('content')

  <h1>Gallery Dashboard Comments/ Replies</h1>
  <hr>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="well">
     <h2>Gallery Comments/ Replies</h2>
      <div id="circle">
        <h2 style="text-align: center; color: white; font-weight: bold; font-family: cursive;">{{ $gallerycommentall->count() }}</h2>
          <h2 style="text-align: center; color: white; font-weight: bold;"><a href="#storycomment"> Comments </a></h2>
          <hr>
          <h2 style="text-align: center; color: white; font-weight: bold; font-family: cursive;">{{ $galleryreplycommentall->count() }}</h2>
          <h3 style="text-align: center; color: white; font-weight: bold;"><a href="#replycomment">Replies</a></h3>
      </div>
  </div>
</div>
</div>
<hr>

<div class="row">
  <div class="col-md-12" id="storycomment" style="margin-top: 5px;">
    <h2 style="text-align: center;"> Gallery Comments</h2>
    <table class="table">
      <thead>
        <th>#</th>
        <th>User Commented</th>
        <th style="color: brown;">Gallery Title</th>
        <th>Image Gallery</th>
        <th>Comments</th>
        <th>Created_at</th>
        <th>Status</th>
        <th></th>
      </thead>
      <tbody>
        <?php $no=1; ?>
        @foreach($gallerycomments as $comment)
        <tr>
        <td>{{ $comment->id }}</td>
        <td> <b>{{ $comment->user->username }}</b><br> {{ $comment->user->email }}</td>

          <td> 
            @if(empty($comment->gallery->id))
           <b style="color: red;"><span class="fa fa-warning"></span>Gallery was deleted</b>
         @else
        <b style="color: brown;">{{ $comment->gallery->title }} </b>
        @endif
      </td>
        <td>
          @if(empty($comment->gallery->id))
           <b style="color: red;"><span class="fa fa-warning"></span>Gallery Image was deleted</b>
         @else
          <a href="{{route('gallery.show',$comment->gallery->file_name)}}" target="_blank"> <img src="/gallery_Image/{{ $comment->gallery->file_name }} "  width="80" height="60" alt="no Picture"> </a>
          @endif
        </td>
        
        <td> {{ $comment->comment }} </span></td>
        <td><b> {{ $comment->created_at->diffForHumans() }}</b>
        </td>
         <td>
          <form method="POST" action="{{ url('/gallery/comment-approve') }}">
              {{ csrf_field()}}

              @if( $comment ->status == 0) 
              <input <?php if( $comment->status == 0)  ?> type="hidden" name="status" value="1">
                <input type="hidden" name="commentId" value="{{ $comment->id}}">
                <button class="btn btn-warning btn-sm">UnApproved</button>
              @elseif ($comment ->status == 1 )
              <input <?php if( $comment->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
                <input type="hidden" name="commentId" value="{{$comment ->id}}">
                 <button  class="btn btn-primary btn-sm">Approved</button>
            @endif
           </form>
           </td>
           @role('superadmin|admin')
           <td> {!! Form::open(['url' =>['gallery/destroycomment/'.$comment ->id],'method' =>'DELETE','onsubmit'=>'return ConfirmDeleteComment()' ]) !!}
          <button type="submit" class="btn btn-danger"> <span class="fa fa-trash"></span></button>
          {!! Form::close() !!}
        </td>
        @endrole
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  <hr>
  {!! $gallerycomments->links() !!}
  <hr>

<div class="col-md-12" id="replycomment"> 
<h2 style="text-align: center;">Gallery Comments Replies</h2>
    <table class="table">
           <thead>
        <th>#</th>
        <th>User Replyied</th>
        <th>Comment Body </th>
        <th>Replies </th>
        <th>Created_at</th>
        <th>Status</th>
        <th></th>
      </thead>
      <tbody>
        <?php $no=1; ?>
        @foreach($galleryreplycomments as $reply)
        
        <tr>
          <th>{{ $no++ }}</th>
          <td><p style="color: brown;">{{ $reply->user->username }}<br>{{ $reply->user->email }} </p></td>
          <td> 
            @if(empty($reply->gallerycomment->id) )
           <b style="color: red;"><span class="fa fa-warning"></span> Its Comment was deleted</b>

            @else
            {{ $reply->gallerycomment->comment }}
            @endif
          </td>
          <td>{{ $reply->reply }} </td>
          <td><b>{{ $reply->created_at->diffForHumans() }}</b></td>
          <td>
            <form method="POST" action="{{ url('/gallery/reply-approve') }}">
              {{ csrf_field()}}

              @if( $reply ->status == 0) 
              <input <?php if( $reply->status == 0)  ?> type="hidden" name="status" value="1">
                <input type="hidden" name="replyId" value="{{ $reply->id}}">
                <button class="btn btn-warning btn-sm">UnApproved</button>
              @elseif ($reply ->status == 1 )
              <input <?php if( $reply->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
                <input type="hidden" name="replyId" value="{{ $reply ->id}}">
                 <button  class="btn btn-primary btn-sm">Approved</button>
            @endif
           </form>
          </td>
          @role('superadmin|admin')
          <td>
             {!! Form::open(['url' =>['gallery/destroyreply/'.$reply ->id],'method' =>'DELETE','onsubmit'=>'return ConfirmDelete()' ]) !!}
          <button type="submit" class="btn btn-danger"> <span class="fa fa-trash"></span></button>
          {!! Form::close() !!}
          </td>
          @endrole
      </tr>
      @endforeach
      </tbody>
    </table>
    <hr>
    {!! $galleryreplycomments->links() !!}
    <hr>
    <!-- +++++++++++++++++++++End of Reply Table++++++ -->
  </div>
</div>
  @endsection
@section('scripts')
<script type="text/javascript">
  function ConfirmDeleteComment(){
    return confirm('Are you Sure, To Delete this Comment?');
  }
  function ConfirmDelete(){
    return confirm('Are you Sure, To Delete this Reply?');
  }
</script>
@endsection