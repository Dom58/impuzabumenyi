@extends('layouts.blog')

@section('title', '| Manage all Trashed Animals')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4" style="border:2px solid black;">
        <h3><span class="fa fa-trash" style="color:red;"></span> All Trashed Animals <b style="color: brown;">{{$animals->count()}}</b></h3>
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
      <th> Restore </th>
      <th>Trashed_at</th>
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
        <form action="{{ url('animal/all/restoreanimal') }}" method="POST" style="margin-bottom: 5px;">
        {{ csrf_field()}}
        <input type="hidden" name="trashanimal_id" value="{{$animal->id}}">
        <input type="hidden" name="deleted_at" class="form-control">
        <button class="btn btn-warning"><span class="fa fa-signal"></span> Restore</button>
      </form>

      {!! Form::open(['url' =>['animal/all/deleteanimal/'.$animal->id],'method' =>'DELETE','onsubmit'=>'return ConfirmDelete()' ]) !!}
<!-- {{ method_field('DELETE')}} -->
<button type="submit" class="btn btn-danger"> <span class="fa fa-trash"> Delete</span></button>
 {!! Form::close() !!}
      </td> 
@endrole
          <td>{{ $animal ->deleted_at }}
          </td>
  
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

<script type="text/javascript">
  
  function ConfirmDelete(){
    return confirm('Are you Sure, to Delete this Animal?');
  }
</script>
@endsection