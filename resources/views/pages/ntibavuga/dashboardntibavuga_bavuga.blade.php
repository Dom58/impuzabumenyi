@extends('layouts.blog')

@section('title', '| Manage Ntibavuga | Bavuga')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4">
        <h2>Manage Ntibavuga Bavuga <b>{{$ntibavugas->count()}}</b></h2>
      </div>
      <div class="col-md-5" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="s" id="NtibavugaInput" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Shakisha Inkuru...">
      </div>
       </div>
      <div class="col-md-2">
        <a href="{{route('ntibavuga.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Create New Ntibavuga Bavuga</a>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
    </div>
<!-- +++++++++++++++++++++++++ End of Head ++++++++++++++++++++++++++++++++++++ -->
<div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
        <table class="table" id="NtibavugaTable">  
          <thead>
    <th>#</th>
      <th>Created_by </th>
      <th>Category </th>
      <th>Ntibavuga</th>
      <th>Bavuga </th>
      <th> description </th>
      <th> Status </th>
      <th>Created_at</th>
      <th></th>
      <th></th>
      </thead>

      <tbody>
        <?php $no=1; ?>
        @foreach( $ntibavugas as $ntibavuga )
      <tr>
           <th>{{ $no++ }}</th>
           <td><b style="color: brown;">{{ $ntibavuga->user->username}} </b>&nbsp; {{ $ntibavuga->user->email }}</td>
           <td> {{ $ntibavuga ->ntibavugacategory->name }}</td>

           <td>{{ $ntibavuga ->ntibavuga }} </td>
           <td>{{ $ntibavuga ->bavuga }} </td>

           <td>{{ substr(strip_tags($ntibavuga ->igisobanuro),0,100) }} {{strlen(strip_tags($ntibavuga ->igisobanuro)) >100 ? "..." : "" }} 
           </td>
           @role('superadmin|admin')
<td>
      <form method="POST" action="{{ url('/ntibavuga/bavuga/postntibavuga')}}">
      {{ csrf_field()}}

      @if( $ntibavuga ->status == 0) 
      <input <?php if( $ntibavuga->status == 0)  ?> type="hidden" name="status" value="1">
        <input type="hidden" name="ntibavugaId" value="{{$ntibavuga ->id}}">
        <button class="btn btn-warning btn-sm">UnPublished</button>
      @elseif ($ntibavuga ->status == 1 )
      <input <?php if( $ntibavuga->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
        <input type="hidden" name="ntibavugaId" value="{{$ntibavuga ->id}}">
         <button  class="btn btn-primary btn-sm">Published</button>
    @endif
   </form>
</td> 
@endrole
          <td>{{ $ntibavuga ->created_at }} <br><br><b>{{ $ntibavuga ->created_at ->diffForHumans() }} </b>
          </td>
<td> 
  <a href="{{ route('ntibavuga.show',$ntibavuga->id) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
   @role('superadmin|admin|')
  <a href="{{ route('ntibavuga.edit' ,$ntibavuga ->id )}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
</td>
@endrole
  
        </tr>
          @endforeach
      </tbody>
    </table>
    <div class="text-center">
    {{ $ntibavugas->links() }}
     </div>
  </div>
</div>
</div>
  @endsection
         @section('scripts')
    <script>
$(document).ready(function(){
  $("#NtibavugaInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#NtibavugaTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection
