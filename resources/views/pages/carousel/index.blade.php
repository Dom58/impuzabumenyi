@extends('layouts.blog')

@section('title', '| Manage | Crousels')

@section('stylesheets')
<style>

  body{
    background-color:black;
  }
</style>
@endsection

@section('content')
<div class="row">
      <div class="col-md-4">
     <h2 style=" color: white;">The Carousels</h2>
      </div>
      <div class="col-md-5" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="history" id="HistoryInput" class="form-control" value="{{ isset($search) ? $search : ''}}" placeholder="Seach an Carousel...">
      </div>
       </div>
      <div class="col-md-2">
        <a href="{{route('carousels.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Create a Carousel Image</a>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
    </div>
<!-- +++++++++++++++++++++++++++++++++++++++ -->
<div class="row">
<div class="col-md-12" style="background-color: #352222;">
            <center>
          <h3 style=" color: white;">{{ $carouselalls->count() }} Carousels</h3>
        </center>

<div id="history">
        <table class="table"  id="HistoryTable" style="background-color: #e6e9cd; color: #557b71;">  
          <thead>
    <th>#</th>
       <th>Username & Email </th>
      <th>Image</th>
      <th>position</th>
      <th>body</th>
      <th>Status</th>
      <th>created_at</th>
      
      <th></th>
      </thead>

      <tbody>
        <?php $no=1 ?>
        @foreach( $carousels as $carousel )
      <tr>
           <th>{{ $no++ }}</th>
           <td><b style="color: brown;">{{ $carousel->user->username}} </b>&nbsp; {{ $carousel->user->email }}</td>
           <td><img src="/carouselimages/{{ $carousel ->file_name }} " width="100" height="100" class="img-circle"/> </td>
           <td>{{ $carousel ->position }} </td>
           <td>{{ substr(strip_tags($carousel ->body),0,190) }} {{strlen(strip_tags($carousel ->body)) >190 ? "..." : "" }} 
           </td>
    @role('superadmin|admin|editor')
<td>
<form method="POST" action="{{ url('manage/carousel_approval') }}">
      {{ csrf_field()}}

      @if( $carousel ->status == 0) 
      <input <?php if( $carousel->status == 0)  ?> type="hidden" name="status" value="1">
        <input type="hidden" name="carouselId" value="{{$carousel ->id}}">
        <button class="btn btn-warning btn-sm">UnPublished</button>
      @elseif ($carousel ->status == 1 )
      <input <?php if( $carousel->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
        <input type="hidden" name="carouselId" value="{{$carousel ->id}}">
         <button  class="btn btn-primary btn-sm">Published</button>
    @endif
   </form>
</td>
@endrole
      <td><b>{{ $carousel ->created_at ->diffForHumans() }} </b></td>
<td> 
  <a href="{{ route('carousels.show',$carousel->id) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
  @role('superadmin|admin|editor')
  <a href="{{route('carousels.edit' ,$carousel ->id )}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
@endrole
          @role('superadmin|admin')
             {!! Form::open(['route' =>['carousels.destroy',$carousel ->id],'method' =>'DELETE','onsubmit'=>'return ConfirmDelete()']) !!}
            {!! Form::submit('Delete',['class' =>'btn btn-danger btn-block','style' =>'margin-top: 20px' ]) !!}
            {!! Form::close() !!}
          @endrole

</td>
      </tr>
          @endforeach
      </tbody>

    </table>
    <center> {!! $carousels ->links(); !!}</center>
  </div>
    </div>
  </div>
@endsection
@section('scripts')
<script type="text/javascript">
  
  function ConfirmDelete(){
    return confirm('Are you Sure, to Delete this Carousel?');
  }
</script>

<script>
$(document).ready(function(){
  $("#HistoryInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#HistoryTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  @endsection

     
  