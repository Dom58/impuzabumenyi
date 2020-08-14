@extends('layouts.blog')

@section('title', '| Manage all Kings')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4" style="border:2px solid black;">
        <h3>Manage All Kings <b style="color: brown;">{{$kings->count()}}</b></h3>
      </div>
      <div class="col-md-5" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="s" id="AbamiId" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Shakisha Umwami...">
      </div>
       </div>
      <div class="col-md-2">
        <a href="{{route('abami.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Create New King</a>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
    </div>
<!-- +++++++++++++++++++++++++ End of Head ++++++++++++++++++++++++++++++++++++ -->
<div class="row">
      <div class="col-md-12">
        <div >
        <table class="table" id="AbamiTable">  
          <thead>
    <th>#</th>
      <th>Created_by </th>
      <th>Image</th>
      <th>Name </th>
      <th> History </th>
      <th> Status </th>
      <th>Created_at</th>
      <th></th>
      <th></th>
      </thead>
      <tbody>
        <?php $no=1; ?>
        @foreach( $kings as $king )
      <tr>
           <th>{{ $no++ }}</th>
           <td><b style="color: brown;">{{ $king->user->username}} </b>&nbsp; {{ $king->user->email }}</td>
           <td> 
            @if($king->file_name ===null)
            <b style="color: brown;">No Image Found</b>
            @else
            <img src="/kings/{{$king->file_name}}" width="50px" height="60px">
            @endif
          </td>

           <td>{{ $king ->name }} </td>
           <td>{{ substr(strip_tags($king ->history),0,100) }} {{strlen(strip_tags($king ->history)) >100 ? "..." : "" }} 
           </td>
           @role('superadmin|admin')
<td>
      <form method="POST" action="{{ url('/amateka/all/approve_king')}}">
      {{ csrf_field()}}

      @if( $king ->status == 0) 
      <input <?php if( $king->status == 0)  ?> type="hidden" name="status" value="1">
        <input type="hidden" name="kingId" value="{{$king ->id}}">
        <button class="btn btn-warning btn-sm">UnPublished</button>
      @elseif ($king ->status == 1 )
      <input <?php if( $king->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
        <input type="hidden" name="kingId" value="{{$king ->id}}">
         <button  class="btn btn-primary btn-sm">Published</button>
    @endif
   </form>
</td> 
@endrole
          <td>{{ $king ->created_at }} <br><br><b>{{ $king ->created_at ->diffForHumans() }} </b>
          </td>
<td> 
  <a href="{{ route('abami.show',$king->name) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
   @role('superadmin|admin|')
  <a href="{{ route('abami.edit' ,$king ->id)}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
</td>
@endrole
  
        </tr>
          @endforeach
      </tbody>
    </table>
    <div class="text-center">
    {{ $kings->links() }}
     </div>
  </div>
</div>
</div>
  @endsection
         @section('scripts')
    <script>
$(document).ready(function(){
  $("#AbamiId").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#AbamiTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection
