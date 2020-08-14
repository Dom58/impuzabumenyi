@extends('layouts.blog')

@section('title', '| Manage all Insigamigani')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4" style="border:2px solid black;">
        <h3>Manage All Insigamigani <b style="color: brown;">{{$insigamigani_counts->count()}}</b></h3>
      </div>
      <div class="col-md-5" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="s" id="insigamiganiId" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Shakisha Insigamigani...">
      </div>
       </div>
      <div class="col-md-2">
        <a href="{{route('insigamigani.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Andika Indi Nsigamugani</a>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
    </div>
<!-- +++++++++++++++++++++++++ End of Head ++++++++++++++++++++++++++++++++++++ -->
<div class="row">
      <div class="col-md-12">
        <div >
        <table class="table" id="insigamiganiTable">  
          <thead>
    <th>#</th>
      <th>Created_by </th>
      <th>Name </th>
      <th>Slug </th>
      <th> Body </th>
      <th> Status </th>
      <th>Created_at</th>
      <th></th>
      <th></th>
      </thead>
      <tbody>
        <?php $no=1; ?>
        @foreach( $insigamiganis as $insigamugani )
      <tr>
           <th>{{ $no++ }}</th>
           <td><b style="color: brown;">{{ $insigamugani->user->username}} </b>&nbsp; {{ $insigamugani->user->email }}</td>
           <td> 
            {{ $insigamugani->name }}
          </td>

           <td>{{ $insigamugani ->slug }} </td>
           <td>{{ substr(strip_tags($insigamugani ->body),0,100) }} {{strlen(strip_tags($insigamugani ->body)) >100 ? "..." : "" }} 
           </td>
           @role('superadmin|admin')
<td>
      <form method="POST" action="{{ url('/amateka/all/approve_insigamigani')}}">
      {{ csrf_field()}}

      @if( $insigamugani ->status == 0) 
      <input <?php if( $insigamugani->status == 0)  ?> type="hidden" name="status" value="1">
        <input type="hidden" name="insigamuganiId" value="{{$insigamugani ->id}}">
        <button class="btn btn-warning btn-sm">UnPublished</button>
      @elseif ($insigamugani ->status == 1 )
      <input <?php if( $insigamugani->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
        <input type="hidden" name="insigamuganiId" value="{{$insigamugani ->id}}">
         <button  class="btn btn-primary btn-sm">Published</button>
    @endif
   </form>
</td> 
@endrole
          <td>{{ $insigamugani ->created_at }} <br><br><b>{{ $insigamugani ->created_at ->diffForHumans() }} </b>
          </td>
<td> 
  <a href="{{ route('insigamigani.show',$insigamugani->slug) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
   @role('superadmin|admin|')
  <a href="{{ route('insigamigani.edit' ,$insigamugani ->id)}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
</td>
@endrole
  
        </tr>
          @endforeach
      </tbody>

    </table>
    <div class="text-center">
    {{ $insigamiganis->links() }}
     </div>
  </div>
</div>
</div>
  @endsection
         @section('scripts')
    <script>
$(document).ready(function(){
  $("#insigamiganiId").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#insigamiganiTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection
