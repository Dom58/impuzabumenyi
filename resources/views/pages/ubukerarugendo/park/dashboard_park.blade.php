@extends('layouts.blog')

@section('title', '| Manage Rwanda Main Parks')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4">
        <h2>Manage National Parks <b style="color: brown;">{{$parks->count()}}</b></h2>
      </div>
      <div class="col-md-5" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="s" id="parkId" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Shakisha Inkuru...">
      </div>
       </div>
      <div class="col-md-2">
        <a href="{{route('parks.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Create New Park</a>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
    </div>
<!-- +++++++++++++++++++++++++ End of Head ++++++++++++++++++++++++++++++++++++ -->
<div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
        <table class="table" id="parkTable">  
          <thead>
    <th>#</th>
      <th>Created_by </th>
      <th>Image</th>
      <th>Name </th>
      <th>Slug</th>
      <th> description </th>
      <th> Status </th>
      <th>Created_at</th>
      <th></th>
      <th></th>
      </thead>

      <tbody>
        <?php $no=1; ?>
        @foreach( $parks as $park )
      <tr>
           <th>{{ $no++ }}</th>
           <td><b style="color: brown;">{{ $park->user->username}} </b>&nbsp; {{ $park->user->email }}</td>
           <td> <img src="/Parks/{{$park->file_name}}" width="100px;" class="img-responsive"></td>

           <td>{{ $park ->name }} </td>
           <td>{{ $park ->slug }} </td>

           <td>{{ substr(strip_tags($park ->description),0,100) }} {{strlen(strip_tags($park ->description)) >100 ? "..." : "" }} 
           </td>
           @role('superadmin|admin')
<td>
      <form method="POST" action="{{ url('/all/rwandan/approve_park')}}">
      {{ csrf_field()}}

      @if( $park ->status == 0) 
      <input <?php if( $park->status == 0)  ?> type="hidden" name="status" value="1">
        <input type="hidden" name="parkId" value="{{$park ->id}}">
        <button class="btn btn-warning btn-sm">UnPublished</button>
      @elseif ($park ->status == 1 )
      <input <?php if( $park->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
        <input type="hidden" name="parkId" value="{{$park ->id}}">
         <button  class="btn btn-primary btn-sm">Published</button>
    @endif
   </form>
</td> 
@endrole
          <td>{{ $park ->created_at }} <br><br><b>{{ $park ->created_at ->diffForHumans() }} </b>
          </td>
<td> 
  <a href="{{ route('parks.show',$park->slug) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
   @role('superadmin|admin|')
  <a href="{{ route('parks.edit' ,$park ->id)}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
</td>
@endrole
  
        </tr>
          @endforeach
      </tbody>
    </table>
    <div class="text-center">
    {{ $parks->links() }}
     </div>
  </div>
</div>
</div>
  @endsection
         @section('scripts')
    <script>
$(document).ready(function(){
  $("#parkId").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#parkTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection
