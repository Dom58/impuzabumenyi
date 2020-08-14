@extends('layouts.blog')

@section('title', '| Manage The Announcements')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4">
        <h1>Manage Announcement</h1>
      </div>
      <div class="col-md-5" style="margin-top: 22px;">
      <div class="form-group">
        <input type="text" name="s" id="NewsInput" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Search a News...">
      </div>
       </div>
      <div class="col-md-2">
        <a href="{{route('news.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Create a New Announcement</a>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
    </div>
<!-- +++++++++++++++++++++++++ End of Head ++++++++++++++++++++++++++++++++++++ -->
<div class="row">
      <div class="col-md-12">
        <div class="table">
        <table class="table" id="NewsTable">  
          <thead>
    <th>#</th>
      <th>Created_by </th>
      <th>News Type </th>
      <th>organisation</th>
      <th>News Links</th>
      <th> Status </th>
      <th>Description </th>
      <th>Created_at</th>
      <th></th>
      <th></th>
      </thead>

      <tbody>
        <?php $no=1; ?>
        @foreach( $itangazos as $itangazo )
      <tr>
           <th>{{ $no++ }}</th>
           <td><b style="color: brown;">{{ $itangazo->user->username}} </b>&nbsp; {{ $itangazo->user->email }}</td>
           <td>
        @if( $itangazo ->news_type == 1) 
            <b >Amatangazo muri za Paruwase Zitandukanye</b>

            @elseif ($itangazo ->news_type == 2 )
             <b >Amatangazo Rusange</b>

              @elseif ($itangazo ->news_type == 3 )
             <b >Amatangazo Amenyesha</b>

            @else 
        <b> Unknown Type</b>
            @endif
</td>
<td>{{ $itangazo ->organisation }} </td>

           <td>{{ $itangazo ->pub_link }} </td>
           
            @role('superadmin|admin')
<td>
      <form method="POST" action="{{ url('/manage/itangazoApprove')}}">
      {{ csrf_field()}}

      @if( $itangazo ->status == 0) 
      <input <?php if( $itangazo->status == 0)  ?> type="hidden" name="status" value="1">
        <input type="hidden" name="itangazoId" value="{{$itangazo ->id}}">
        <button class="btn btn-warning btn-sm">UnPublished</button>
      @elseif ($itangazo ->status == 1 )
      <input <?php if( $itangazo->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
        <input type="hidden" name="itangazoId" value="{{ $itangazo ->id}}">
         <button  class="btn btn-primary btn-sm">Published</button>
    @endif
   </form>
</td> 
@endrole
        
           <td>{{ substr(strip_tags($itangazo ->description),0,100) }} {{strlen(strip_tags($itangazo ->description)) >100 ? "..." : "" }} 
           </td>
            <td>{{ $itangazo ->created_at }} <br><br><b>{{ $itangazo ->created_at ->diffForHumans() }} </b>
          </td>
<td> 
  <a href="{{ route('news.show',$itangazo->id) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
   @role('superadmin|admin|')
  <a href="{{ route('news.edit' ,$itangazo ->id )}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
</td>
@endrole
  
        </tr>
          @endforeach
      </tbody>
    </table>
    <div class="text-center">
    {{ $itangazos->links() }}
     </div>
  </div>
</div>
</div>
  @endsection
  @section('scripts')
    <script>
$(document).ready(function(){
  $("#NewsInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#NewsTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection
