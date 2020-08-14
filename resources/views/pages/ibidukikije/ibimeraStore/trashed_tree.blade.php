@extends('layouts.blog')

@section('title', '| Manage all Trashed Trees')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4" style="border:2px solid black;">
        <h3><span class="fa fa-trash" style="color:red;"></span> All Trashed Trees <b style="color: brown;">{{$trees->count()}}</b></h3>

      </div>
      <div class="col-md-5" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="s" id="treeId" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Search Tree...">
      </div>
       </div>
      <div class="col-md-2">
        <a href="{{route('tree.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Create New Tree</a>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
    </div>
<!-- +++++++++++++++++++++++++ End of Head ++++++++++++++++++++++++++++++++++++ -->
<div class="row">
      <div class="col-md-12">
        <div >
        <table class="table" id="TreeTable">  
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
        @foreach( $trees as $tree )
      <tr>
           <th>{{ $no++ }}</th>
           <td><b style="color: brown;">{{ $tree->user->username}} </b>&nbsp; {{ $tree->user->email }}</td>
           <td> <img src="/ibidukikije_Tree/{{$tree->file_name}}" width="50px;"></td>

           <td>{{ $tree ->name }} </td>
           <td>{{ $tree ->treecategory->name }} </td>
           <td>{{ $tree ->slug }} </td>

           <td>{{ substr(strip_tags($tree ->description),0,100) }} {{strlen(strip_tags($tree ->description)) >100 ? "..." : "" }} 
           </td>
           @role('superadmin|admin')
      <td>
        <form action="{{ url('tree/all/restoretree') }}" method="POST" style="margin-bottom: 5px;">
        {{ csrf_field()}}
        <input type="hidden" name="trashtree_id" value="{{$tree->id}}">
        <input type="hidden" name="deleted_at" class="form-control">
        <button class="btn btn-warning"><span class="fa fa-signal"></span> Restore</button>
      </form>

      {!! Form::open(['url' =>['tree/all/deletetree/'.$tree->id],'method' =>'DELETE','onsubmit'=>'return ConfirmDelete()' ]) !!}
<!-- {{ method_field('DELETE')}} -->
<button type="submit" class="btn btn-danger"> <span class="fa fa-trash"> Delete</span></button>
 {!! Form::close() !!}
      </td> 
@endrole
          <td>{{ $tree ->deleted_at }}
          </td>
  
        </tr>
          @endforeach
      </tbody>
    </table>
    <div class="text-center">
    {{ $trees->links() }}
     </div>
  </div>
</div>
</div>
  @endsection
         @section('scripts')
    <script>
$(document).ready(function(){
  $("#treeId").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#TreeTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script type="text/javascript">
  
  function ConfirmDelete(){
    return confirm('Are you Sure, to Delete this tree?');
  }
</script>
@endsection