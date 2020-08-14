@extends('layouts.blog')

@section('title', '| Manage Posts')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4">
        <h1>Manage Publicity</h1>
      </div>
      <div class="col-md-5" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="s" id="PubInput" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Shakisha Inkuru...">
      </div>
       </div>
      <div class="col-md-2">
        <a href="{{route('pubs.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Create New Publicity</a>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
    </div>
<!-- +++++++++++++++++++++++++ End of Head ++++++++++++++++++++++++++++++++++++ -->
<div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
        <table class="table" id="PubTable">  
          <thead>
    <th>#</th>
      <th>Created_by </th>
      <th>File/ Image </th>
      <th>Side </th>
      <th>Publicity Links</th>
      <th>Description </th>
      <th> Status </th>
      <th>Created_at</th>
      <th></th>
      <th></th>
      </thead>

      <tbody>
        <?php $no=1; ?>
        @foreach( $pubs as $pub )
      <tr>
           <th>{{ $no++ }}</th>
           <td><b style="color: brown;">{{ $pub->user->username}} </b>&nbsp; {{ $pub->user->email }}</td>
           <td><img src=" /publicity/{{ $pub ->file_name }} "  width="150" height="100"> </td>
           <td>
        @if( $pub ->side == 1) 
            <b >Top Side</b>

            @elseif ($pub ->side == 2 )
             <b >Right Side</b>

              @elseif ($pub ->side == 3 )
             <b >Bottom Side</b>

              @elseif ($pub ->side == 4 )
             <b >Left Side</b>

              @elseif ($pub ->side == 5 )
             <b >Center Side</b>

            @else 
        <b> Unknown Side</b>
            @endif
</td>

           <td>{{ $pub ->pub_link }} </td>
           <!-- <td>{{ $pub ->status }} </td> -->
           <td>{{ substr(strip_tags($pub ->description),0,100) }} {{strlen(strip_tags($pub ->description)) >100 ? "..." : "" }} 
           </td>
           @role('superadmin|admin')
<td>
      <form method="POST" action="{{ url('/manage/pubApprove')}}">
      {{ csrf_field()}}

      @if( $pub ->status == 0) 
      <input <?php if( $pub->status == 0)  ?> type="hidden" name="status" value="1">
        <input type="hidden" name="pubId" value="{{$pub ->id}}">
        <button class="btn btn-warning btn-sm">UnPublished</button>
      @elseif ($pub ->status == 1 )
      <input <?php if( $pub->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
        <input type="hidden" name="pubId" value="{{$pub ->id}}">
         <button  class="btn btn-primary btn-sm">Published</button>
    @endif
   </form>
</td> 
@endrole
          <td>{{ $pub ->created_at }} <br><br><b>{{ $pub ->created_at ->diffForHumans() }} </b>
          </td>
<td> 
  <a href="{{ route('pubs.show',$pub->id) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
   @role('superadmin|admin|')
  <a href="{{ route('pubs.edit' ,$pub ->id )}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
</td>
@endrole
  
        </tr>
          @endforeach
      </tbody>
    </table>
    <div class="text-center">
    {{ $pubs->links() }}
     </div>
  </div>
</div>
</div>
  @endsection
         @section('scripts')
    <script>
$(document).ready(function(){
  $("#PubInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#PubTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection
