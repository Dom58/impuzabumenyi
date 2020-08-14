@extends('layouts.blog')

@section('title', '| Manage| Rwanda Traditional Materials')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4">
        <h2>Manage Ibikoresho Gakondo <b style="color: brown;">{{$gakondos->count()}}</b></h2>
      </div>
      <div class="col-md-5" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="s" id="IbikoreshoId" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Shakisha Inkuru...">
      </div>
       </div>
      <div class="col-md-2">
        <a href="{{route('ibikoresho.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Create New Ibikoresho Gakondo</a>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
    </div>
<!-- +++++++++++++++++++++++++ End of Head ++++++++++++++++++++++++++++++++++++ -->
<div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
        <table class="table" id="IbikoreshoTable">  
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
        @foreach( $gakondos as $gakondo )
      <tr>
           <th>{{ $no++ }}</th>
           <td><b style="color: brown;">{{ $gakondo->user->username}} </b>&nbsp; {{ $gakondo->user->email }}</td>
           <td> <img src="/ibikoreshoGakondo/{{$gakondo->file_name}}" width="50px;"></td>

           <td>{{ $gakondo ->name }} </td>
           <td>{{ $gakondo ->slug }} </td>

           <td>{{ substr(strip_tags($gakondo ->description),0,100) }} {{strlen(strip_tags($gakondo ->description)) >100 ? "..." : "" }} 
           </td>
           @role('superadmin|admin')
<td>
      <form method="POST" action="{{ url('/gakondo/all/approve_ibikoresho')}}">
      {{ csrf_field()}}

      @if( $gakondo ->status == 0) 
      <input <?php if( $gakondo->status == 0)  ?> type="hidden" name="status" value="1">
        <input type="hidden" name="ibikoreshoId" value="{{$gakondo ->id}}">
        <button class="btn btn-warning btn-sm">UnPublished</button>
      @elseif ($gakondo ->status == 1 )
      <input <?php if( $gakondo->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
        <input type="hidden" name="ibikoreshoId" value="{{$gakondo ->id}}">
         <button  class="btn btn-primary btn-sm">Published</button>
    @endif
   </form>
</td> 
@endrole
          <td>{{ $gakondo ->created_at }} <br><br><b>{{ $gakondo ->created_at ->diffForHumans() }} </b>
          </td>
<td> 
  <a href="{{ route('ibikoresho.show',$gakondo->slug) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
   @role('superadmin|admin|')
  <a href="{{ route('ibikoresho.edit' ,$gakondo ->id)}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
</td>
@endrole
  
        </tr>
          @endforeach
      </tbody>
    </table>
    <div class="text-center">
    {{ $gakondos->links() }}
     </div>
  </div>
</div>
</div>
  @endsection
         @section('scripts')
    <script>
$(document).ready(function(){
  $("#IbikoreshoId").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#IbikoreshoTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection
