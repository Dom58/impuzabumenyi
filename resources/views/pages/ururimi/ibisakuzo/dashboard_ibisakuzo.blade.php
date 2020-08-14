@extends('layouts.blog')

@section('title', '| Manage Sakwe |Sakwe')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4">
        <h2>Manage Sakwe Sakwe <b style="color: brown;">{{$ibisakuzos->count()}}</b></h2>
      </div>
      <div class="col-md-5" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="s" id="IbikoreshoId" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Shakisha Inkuru...">
      </div>
       </div>
      <div class="col-md-2">
        <a href="{{route('ibisakuzo.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Andika ikindi Gisakuzo</a>
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
      <th>Sakwe Sakwe </th>
      <th> Igisubizo </th>
      <th>Slug</th>
      <th> Status </th>
      <th>Created_at</th>
      <th></th>
      <th></th>
      </thead>

      <tbody>
        <?php $no=1; ?>
        @foreach( $ibisakuzos as $ibisakuzo )
      <tr>
           <th>{{ $no++ }}</th>
           <td><b style="color: brown;">{{ $ibisakuzo->user->username}} </b>&nbsp; {{ $ibisakuzo->user->email }}</td>

           <td>{{ $ibisakuzo ->name }} </td>
           <td>{{ substr(strip_tags($ibisakuzo ->kice),0,100) }} {{strlen(strip_tags($ibisakuzo ->kice)) >100 ? "..." : "" }} 
           </td>
           <td>{{ $ibisakuzo ->slug }} </td>
           @role('superadmin|admin')
<td>
      <form method="POST" action="{{ url('ururimi/all/approve_sakwe_sakwe')}}">
      {{ csrf_field()}}

      @if( $ibisakuzo ->status == 0) 
      <input <?php if( $ibisakuzo->status == 0)  ?> type="hidden" name="status" value="1">
        <input type="hidden" name="igisakuzoId" value="{{$ibisakuzo ->id}}">
        <button class="btn btn-warning btn-sm">UnPublished</button>
      @elseif ($ibisakuzo ->status == 1 )
      <input <?php if( $ibisakuzo->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
        <input type="hidden" name="igisakuzoId" value="{{$ibisakuzo ->id}}">
         <button  class="btn btn-primary btn-sm">Published</button>
    @endif
   </form>
</td> 
@endrole
          <td>{{ $ibisakuzo ->created_at }} <br><br><b>{{ $ibisakuzo ->created_at ->diffForHumans() }} </b>
          </td>
<td> 
  <a href="{{ route('ibisakuzo.show',$ibisakuzo->slug) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
   @role('superadmin|admin|')
  <a href="{{ route('ibisakuzo.edit' ,$ibisakuzo ->id)}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
</td>
@endrole
  
        </tr>
          @endforeach
      </tbody>
    </table>
    <div class="text-center">
    {{ $ibisakuzos->links() }}
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
