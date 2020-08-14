@extends('layouts.blog')

@section('title', '| Manage all Trees')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4" style="border:2px solid gray;">
        <h3>Manage All trees <b style="color: brown;">{{$trees->count()}}</b></h3>
        <hr>
        <h3><a href="{{ url('tree/all/trashed_trees')}}"><span class="fa fa-trash" style="color:red;"></span> Trashed Trees <b style="color: brown;">{{$trashedtrees->count()}}</b></a></h3>
      </div>
      <div class="col-md-5" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="s" id="TreeId" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Shakisha Ikimera...">
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
      <th> Status </th>
      <th>Created_at</th>
      <th></th>
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
      <form method="POST" action="{{ url('/tree/all/approve_tree')}}">
      {{ csrf_field()}}

      @if( $tree ->status == 0) 
      <input <?php if( $tree->status == 0)  ?> type="hidden" name="status" value="1">
        <input type="hidden" name="treeId" value="{{$tree ->id}}">
        <button class="btn btn-warning btn-sm">UnPublished</button>
      @elseif ($tree ->status == 1 )
      <input <?php if( $tree->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
        <input type="hidden" name="treeId" value="{{$tree ->id}}">
         <button  class="btn btn-primary btn-sm">Published</button>
    @endif
   </form>

      <!-- Hide an Animal -->
    @role('superadmin|admin')
         {!! Form::open(['route' =>['tree.destroy',$tree ->id],'method' =>'DELETE','onsubmit'=>'return Confirmhide()']) !!}
            
        {!! Form::submit('Hide Tree',['class' =>'btn btn-warning btn-sm btn-block','style' =>'margin-top: 5px' ]) !!}
        {!! Form::close() !!}
    @endrole
</td> 
@endrole
          <td>{{ $tree ->created_at }} <br><br><b>{{ $tree ->created_at ->diffForHumans() }} </b>
          </td>
<td> 
  <a href="{{ route('tree.show',$tree->slug) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
   @role('superadmin|admin|')
  <a href="{{ route('tree.edit' ,$tree ->id)}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
</td>
@endrole
  
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
  $("#TreeId").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#TreeTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection
