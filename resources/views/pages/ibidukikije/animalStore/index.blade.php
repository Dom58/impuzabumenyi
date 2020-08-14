@extends('layouts.blog')

@section('title', '| Manage all Animals')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4" style="border:2px solid black;">
        <h3>Manage All animals <b style="color: brown;">{{$animals->count()}}</b></h3>
        <hr>
        <h3><a href="{{ url('animal/all/trashed_animals')}}"><span class="fa fa-trash" style="color:red;"></span> Trashed Animals <b style="color: brown;">{{$trashedanimals->count()}}</b></a></h3>
      </div>
      <div class="col-md-5" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="s" id="AnimalId" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Shakisha Inyamaswa...">
      </div>
       </div>
      <div class="col-md-2">
        <a href="{{route('animal.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Create New Animal</a>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
    </div>
<!-- +++++++++++++++++++++++++ End of Head ++++++++++++++++++++++++++++++++++++ -->
<div class="row">
      <div class="col-md-12">
        <div >
        <table class="table" id="AnimalTable">  
          <thead>
    <th>#</th>
      <th>Created_by </th>
      <th>Image</th>
      <th>Name </th>
      <th>Category</th>
      <th>Slug</th>
      <th> description </th>
      <th> Status </th>
      <th>Created_at</th>
      <th></th>
      <th></th>
      </thead>
      <tbody>
        <?php $no=1; ?>
        @foreach( $animals as $animal )
      <tr>
           <th>{{ $no++ }}</th>
           <td><b style="color: brown;">{{ $animal->user->username}} </b>&nbsp; {{ $animal->user->email }}</td>
           <td> <img src="/ibidukikije_Animal/{{$animal->file_name}}" width="50px;"></td>

           <td>{{ $animal ->name }} </td>
           <td>{{ $animal ->animalcategory->name }} </td>
           <td>{{ $animal ->slug }} </td>

           <td>{{ substr(strip_tags($animal ->description),0,100) }} {{strlen(strip_tags($animal ->description)) >100 ? "..." : "" }} 
           </td>
           @role('superadmin|admin')
<td>
      <form method="POST" action="{{ url('/animal/all/approve_animal')}}">
      {{ csrf_field()}}

      @if( $animal ->status == 0) 
      <input <?php if( $animal->status == 0)  ?> type="hidden" name="status" value="1">
        <input type="hidden" name="animalId" value="{{$animal ->id}}">
        <button class="btn btn-warning btn-sm">UnPublished</button>
      @elseif ($animal ->status == 1 )
      <input <?php if( $animal->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
        <input type="hidden" name="animalId" value="{{$animal ->id}}">
         <button  class="btn btn-primary btn-sm">Published</button>
    @endif
   </form>
       <!-- Hide an Animal -->
    @role('superadmin|admin')
         {!! Form::open(['route' =>['animal.destroy',$animal ->id],'method' =>'DELETE','onsubmit'=>'return Confirmhide()']) !!}
            
        {!! Form::submit('Hide Animal',['class' =>'btn btn-warning btn-sm btn-block','style' =>'margin-top: 5px' ]) !!}
        {!! Form::close() !!}
    @endrole

</td> 
@endrole
          <td>{{ $animal ->created_at }} <br><br><b>{{ $animal ->created_at ->diffForHumans() }} </b>
          </td>
<td> 
  <a href="{{ route('animal.show',$animal->slug) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
   @role('superadmin|admin|')
  <a href="{{ route('animal.edit' ,$animal ->id)}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
</td>
@endrole
  
        </tr>
          @endforeach
      </tbody>
    </table>
    <div class="text-center">
    {{ $animals->links() }}
     </div>
  </div>
</div>
</div>
  @endsection
         @section('scripts')
    <script>
$(document).ready(function(){
  $("#AnimalId").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#AnimalTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection
