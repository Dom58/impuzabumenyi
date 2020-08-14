@extends('layouts.blog')

@section('title', '| Manage | Create Album Photos')

@section('stylesheets')
<style>

  body{
    background-color:black;
  }
</style>
@endsection
@section('content')
<div class="row">
      <div class="col-md-5">
 <h2 style=" color: white;"> Manage Galllery</h2>
 @role('superadmin|admin|editor')
 <h3> <a href="{{ url('gallery/gallery_statistic')}}" style=" color: green;" target="_blank"><span class="fa fa-eye"></span> Galllery Comments Dashboard</a> </h3>
 @endrole
      </div>
      <div class="col-md-4" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="saint" id="SaintInput" class="form-control" value="{{ isset($search) ? $search : ''}}" placeholder="Search a Saint...">
      </div>
       </div>
      <div class="col-md-2">
        <a href="{{route('gallery.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Create New Gallery</a>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
    </div>
<!-- +++++++++++++++++++++++++++ -->
<div class="row">
<div class="col-md-12" style="background-color: #352222;">
<center><h3 style=" color: white;">{{ $galleries->count() }} Photos</h3></center>

<div id="saint">
        <table class="table" style="background-color:white;" id="SaintTable">  
          <thead>
    <th>#</th>
      <th>Username & Email </th>
      <th>Category </th>
      <th>Image</th>
      <th> Title </th>
      <th> Description </th>
      @role('superadmin|admin|editor')
      <th> Status </th>
      @endrole
      <th>Created_at</th>
      <th></th>
      <th></th>
      <th></th>
      </thead>

      <tbody>
      	<?php $n=1; ?>
        @foreach( $galleries as $gallery )

      <tr>
           <th>{{ $n++ }}</th>
           <td><b style="color: brown;">{{ $gallery->user->username}} </b>&nbsp; {{ $gallery->user->email }}</td>
           <td><b>{{ $gallery ->category->name }}</b> </td>
           <td><img src=" /gallery_Image/{{ $gallery ->file_name }} "  width="80" height="60"> </td>
          
           <td>{{ $gallery ->title }} </td>
           <td>{{ substr(strip_tags($gallery ->description),0,100) }} {{strlen(strip_tags($gallery ->description)) >100 ? "..." : "" }} </td>

            @role('superadmin|admin|editor')
<td>
        <form method="POST" action="{{ url('gallery/toggle-approve') }}">
              {{ csrf_field()}}

              @if( $gallery ->status == 0) 
              <input <?php if( $gallery->status == 0)  ?> type="hidden" name="status" value="1" />
                <input type="hidden" name="photoId" value="{{ $gallery ->id }}" />
                <button class="btn btn-warning btn-sm">UnPublished</button>
              @elseif ($gallery ->status == 1 )
              <input <?php if( $gallery->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
                <input type="hidden" name="photoId" value="{{ $gallery ->id}}">
                 <button  class="btn btn-primary btn-sm">Published</button>
            @endif
        </form>
</td>
@endrole
          <td>{{ $gallery ->created_at }}</td>
<td> 
  <a href="{{ route('gallery.show',$gallery->file_name) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
   @role('superadmin|admin|editor')
  <a href="{{route('gallery.edit' ,$gallery ->id )}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
 @endrole</td>

        </tr>
          @endforeach
      </tbody>
    </table>
    <center> {!! $galleries ->links(); !!}</center>
  </div>
    </div>
  </div>
@endsection
@section('scripts')
<script type="text/javascript">
  
  function ConfirmDelete(){
    return confirm('Are you Sure, Deleting this Message?');
  }
</script>

    <script>
$(document).ready(function(){
  $("#SaintInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#SaintTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  @endsection