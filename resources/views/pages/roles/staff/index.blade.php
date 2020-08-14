@extends('layouts.blog')

@section('title', '| Manage all Users')

@section('content')
    <div class="row">
      <div class="col-md-9">
        <h1>Manage the Staffs and Departement</h1>
      </div>

      <div class="col-md-2">
        @role('superadmin')
        <a href="{{route('management.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-user-plus m-r-10"></i> Create new Staff </a>
        @endrole
      </div>
      <div class="col-md-12">
  			<hr>
  		</div>
    </div>
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Image</th>
              <th>Full Name</th>
              <th>Department</th>

              <th>Background</th>
              @role('superadmin')
              <th>Status</th>
              <th>Created at</th>
              @endrole
              <th></th>
            </tr>
          </thead>

          <tbody>
            <?php $no=1; ?>
            @foreach ($staffs as $staff)
              <tr>
                <td>{{ $no++ }}</td>
                <td><img src="/ndumukristuStaff/{{ $staff->file_name}}" class="img-circle" alt="profileImage" style="width: 50px; margin-right: 2px;"></td>
                <td>{{$staff->fullname}}</td>
                <td>{{$staff->department->name}}</td>

                 <td>{!! $staff->background !!}</td>
          @role('superadmin')
         <td>
              <form method="POST" action="{{ url('/theAuthorities/toggle-approve') }}">
              {{ csrf_field()}}

              @if( $staff ->status == 0) 
              <input <?php if( $staff->status == 0)  ?> type="hidden" name="status" value="1">
                <input type="hidden" name="staffId" value="{{$staff ->id}}">
                <button class="btn btn-warning btn-sm">UnApproved</button>
              @elseif ($staff ->status == 1 )
              <input <?php if( $staff->status == 1) {echo "checked";} ?> type="hidden" name="status" value="0">
                <input type="hidden" name="staffId" value="{{$staff ->id}}">
                 <button  class="btn btn-primary btn-sm">Approved</button>
            @endif
           </form>
    </td>


                <td>{{ $staff->created_at->toFormattedDateString()}}</td>
                <td>
                  <a href="{{route('management.show', $staff->id)}}" class="btn btn-primary btn-sm">View</a>
                  <a href="{{route('management.edit', $staff->id)}}" class="btn btn-primary btn-sm">Edit</a>
                </td>
                @endrole
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
      </div>
    </div> <!-- end of .card -->
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

@endsection
