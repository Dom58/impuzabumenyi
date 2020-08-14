@extends('layouts.blog')

@section('title', '| Manage| Imigani Migufi')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4">
        <h2>Imigani Migufi <b style="color: brown;">{{$imiganimigufis->count()}}</b></h2>
      </div>
      <div class="col-md-5" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="s" id="IbikoreshoId" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Shakisha umugani mugufi...">
      </div>
       </div>
      <div class="col-md-2">
        <a href="{{ route('imigani_migufi.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Andika undi mugani mugufi</a>
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
      <th>Name </th>
      <th> Description</th>
      <th> Status </th>
      <th>Created_at</th>
      <th></th>
      <th></th>
      </thead>
      <tbody>
        <?php $no=1; ?> 
        @foreach( $imiganimigufis as $umuganimugufi)
      <tr>
           <th>{{ $no++ }}</th>
           <td><b style="color: brown;">{{ $umuganimugufi->user->username}} </b>&nbsp; {{ $umuganimugufi->user->email }}</td>

           <td>{{ $umuganimugufi->name }} </td>
           <td>{{ substr(strip_tags($umuganimugufi->igisobanuro),0,100) }} {{strlen(strip_tags($umuganimugufi->igisobanuro)) >100 ? "..." : "" }} 
           </td>
           @role('superadmin|admin')
<td>
      <form method="POST" action="{{ url('/ururimi/all/approve_imiganimigu')}}">
      {{ csrf_field()}}

      @if( $umuganimugufi->status == 0) 
      <input <?php if( $umuganimugufi->status == 0)  ?> type="hidden" name="status" value="1">
        <input type="hidden" name="imiganimiguId" value="{{$umuganimugufi->id}}">
        <button class="btn btn-warning btn-sm">UnPublished</button>
      @elseif ($umuganimugufi->status == 1 )
      <input <?php if( $umuganimugufi->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
        <input type="hidden" name="imiganimiguId" value="{{$umuganimugufi->id}}">
         <button  class="btn btn-primary btn-sm">Published</button>
    @endif
   </form>
</td> 
@endrole
          <td>{{ $umuganimugufi->created_at }} <br><br><b>{{ $umuganimugufi->created_at ->diffForHumans() }} </b>
          </td>
<td> 
  <a href="{{ route('imigani_migufi.show',$umuganimugufi->name) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
   @role('superadmin|admin|')
  <a href="{{ route('imigani_migufi.edit' ,$umuganimugufi->id)}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
</td>
@endrole
  
        </tr>
          @endforeach
      </tbody>
    </table>
    <div class="text-center">
    {{ $imiganimigufis->links() }}
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
