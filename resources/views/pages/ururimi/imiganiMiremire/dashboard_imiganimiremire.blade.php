@extends('layouts.blog')

@section('title', '| Manage| Imigani Miremire')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4">
        <h2>Imigani Miremire <b style="color: brown;">{{$imiganimires->count()}}</b></h2>
      </div>
      <div class="col-md-5" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="s" id="IbikoreshoId" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Shakisha Inkuru...">
      </div>
       </div>
      <div class="col-md-2">
        <a href="{{ url('/ururimi/all/imigani_miremire/create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Andika undi mugani muremure</a>
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
      <th>Title </th>
      <th>Body</th>
      <th> Summary</th>
      <th> Status </th>
      <th>Created_at</th>
      <th></th>
      <th></th>
      </thead>

      <tbody>
        <?php $no=1; ?> 
        @foreach( $imiganimires as $umuganimuremure )
      <tr>
           <th>{{ $no++ }}</th>
           <td><b style="color: brown;">{{ $umuganimuremure->user->username}} </b>&nbsp; {{ $umuganimuremure->user->email }}</td>

           <td>{{ $umuganimuremure ->title }} </td>

           <td>{{ substr(strip_tags($umuganimuremure ->body),0,100) }} {{strlen(strip_tags($umuganimuremure ->body)) >100 ? "..." : "" }} 
           </td>
           <td>{{ substr(strip_tags($umuganimuremure ->igisobanuro),0,100) }} {{strlen(strip_tags($umuganimuremure ->igisobanuro)) >100 ? "..." : "" }} 
           </td>
           @role('superadmin|admin')
<td>
      <form method="POST" action="{{ url('/ururimi/all/approve_imiganimire')}}">
      {{ csrf_field()}}

      @if( $umuganimuremure ->status == 0) 
      <input <?php if( $umuganimuremure->status == 0)  ?> type="hidden" name="status" value="1">
        <input type="hidden" name="imiganimireId" value="{{$umuganimuremure ->id}}">
        <button class="btn btn-warning btn-sm">UnPublished</button>
      @elseif ($umuganimuremure ->status == 1 )
      <input <?php if( $umuganimuremure->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
        <input type="hidden" name="imiganimireId" value="{{$umuganimuremure ->id}}">
         <button  class="btn btn-primary btn-sm">Published</button>
    @endif
   </form>
</td> 
@endrole
          <td>{{ $umuganimuremure ->created_at }} <br><br><b>{{ $umuganimuremure ->created_at ->diffForHumans() }} </b>
          </td>
<td> 
  <a href="{{ route('imigani_miremire.show',$umuganimuremure->title) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
   @role('superadmin|admin|')
  <a href="{{ route('imigani_miremire.edit' ,$umuganimuremure ->id)}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
</td>
@endrole
  
        </tr>
          @endforeach
      </tbody>
    </table>
    <div class="text-center">
    {{ $imiganimires->links() }}
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
