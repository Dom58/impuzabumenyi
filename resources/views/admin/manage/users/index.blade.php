@extends('layouts.blog')

@section('title', '| Manage all Users')

@section('content')
    <div class="row">
      <div class="col-md-4">
        <h1>Manage Users</h1>
      </div>
        <div class="col-md-5">
          <input type="text"  name="search" id="WorkerInput" class="form-control" placeholder="search a User in table....">
        </div>
      <div class="col-md-3">
        <a href="{{route('users.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-user-plus m-r-10"></i> Create New User</a>
      </div>
      <div class="col-md-12">
  			<hr>
  		</div>
    </div>
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

<div class="row">
      <div class="col-md-12"  style="background-color: #e2f4f7; margin-bottom: 20px;">
        <h1><span class="fa fa-trash-o"></span> Trash Users</h1>
        <div class="table-responsive">
          <table class="table table-responsive" id="WorkerTable">
            <thead>
              <tr>
                <th>No</th>
              <th>Pic</th>
              <th>Name</th>
              <th>Second Name</th>
              <th>Username</th>
              <th>Gender</th>
              <th>Tel</th>
              <th>Email</th>

              <th>Date Created</th>
              <th></th>
              <th></th>
              </tr>
            </thead>
            <tbody>
               <?php $no=1; ?>
            @foreach ($users as $user)
            @if($user->hasRole('trashjob') )
              <tr>
                <td>{{ $no++ }}</td>
                <td><img src="{{ asset('userProfileImage/'. $user ->profile_image) }}" class="profile-img img-circle"  alt="no Image" width="60" height="60" class="img-circle" alt="profileImage">
                </td>

                <td>{{$user->name}}</td>
                <td>{{$user->sname}}</td>
                <td>{{$user->username}}</td>

                 <td>
                  @if($user->gender ==1)
                  <b>M </b>
                 
                 @else
                 <b>F </b>
               @endif
                 </td>
                <td>{{$user->tel}}</td>

                <td>{{$user->email}}</td>

                
                <td>{{$user->created_at->toFormattedDateString()}}</td>
                <td>
                  <a href="{{route('users.show', $user->id)}}" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></a>
                </td>
                <td>
                  <a href="{{route('users.edit', $user->id)}}" class="btn btn-success btn-sm"><span class="fa fa-edit"></span></a>
                </td>
              </tr>
              @endif
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
          <hr>
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-responsive" id="WorkerTable">
            <thead>
              <tr>
                <th>No</th>
              <th>Pic</th>
              <th>Name</th>
              <th>Second Name</th>
              <th>Username</th>
              <th>Gender</th>
              <th>Tel</th>
              <th>Email</th>

              <th>Super Admin</th>
              <th>Admin</th>
              <th>Editor</th>
              <th>Author</th>

              <th>Date Created</th>
              <th></th>
              <th></th>
              </tr>
            </thead>
            <tbody>
               <?php $no=1; ?>
            @foreach ($users as $user)
            @if($user->hasRole('superadmin')|| $user->hasRole('admin')||$user->hasRole('editor')||$user->hasRole('author') )
              <tr>
                <td>{{ $no++ }}</td>
                <td><img src="{{ asset('userProfileImage/'. $user ->profile_image) }}" class="profile-img img-circle"  alt="no Image" width="60" height="60" class="img-circle" alt="profileImage">
                </td>

                <td>{{$user->name}}</td>
                <td>{{$user->sname}}</td>
                <td>{{$user->username}}</td>

                 <td>
                  @if($user->gender ==1)
                  <b>M </b>
                 
                 @else
                 <b>F </b>
               @endif
                 </td>
                <td>{{$user->tel}}</td>

                <td>{{$user->email}}</td>
                   <td><input type="checkbox" {{ $user->hasRole('superadmin') ?'checked' : '' }} name="role_superadmin" ></td>
                  <td><input type="checkbox" {{ $user->hasRole('admin') ?'checked' : '' }} name="role_admin"></td>
                  <td><input type="checkbox" {{ $user->hasRole('editor') ?'checked' : '' }} name="role_editor" ></td>
                  <td><input type="checkbox" {{ $user->hasRole('author') ?'checked' : '' }} name="role_author" ></td>
                  
                <td>{{$user->created_at->toFormattedDateString()}}</td>
                <td>
                  <a href="{{route('users.show', $user->id)}}" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></a>
                </td>
                <td>
                  <a href="{{route('users.edit', $user->id)}}" class="btn btn-success btn-sm"><span class="fa fa-edit"></span></a>
                </td>
              </tr>
              @endif
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
          <hr>
      <div class="col-md-12">
        <div class="table-responsive">
          <h1>Other Web Users</h1>
          <!-- ++++++++++++++++++++Has any Role++++++++++ -->
          <table class="table" id="WorkerTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Pic</th>
              <th>Name</th>
              <th>Second Name</th>
              <th>Username</th>
              <th>Gender</th>
              <th>Tel</th>
              <th>Email</th>

              <th>Super Admin</th>
              <th>Admin</th>
              <th>Editor</th>
              <th>Author</th>

              <th>Date Created</th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <?php $no=1; ?>
            @foreach ($users as $user)
              <tr>
                <td>{{ $no++ }}</td>
                <td><img src="{{ asset('userProfileImage/'. $user ->profile_image) }}" class="profile-img img-circle"  alt="no Image" width="60" height="60" class="img-circle" alt="profileImage">
                </td>

                <td>{{$user->name}}</td>
                <td>{{$user->sname}}</td>
                <td>{{$user->username}}</td>

                 <td>
                  @if($user->gender ==1)
                  <b>M </b>
                 
                 @else
                 <b>F </b>
               @endif
                 </td>
                <td>{{$user->tel}}</td>

                <td>{{$user->email}}</td>
                   <td><input type="checkbox" {{ $user->hasRole('superadmin') ?'checked' : '' }} name="role_superadmin" ></td>
                  <td><input type="checkbox" {{ $user->hasRole('admin') ?'checked' : '' }} name="role_admin"></td>
                  <td><input type="checkbox" {{ $user->hasRole('editor') ?'checked' : '' }} name="role_editor" ></td>
                  <td><input type="checkbox" {{ $user->hasRole('author') ?'checked' : '' }} name="role_author" ></td>
                  
                <td>{{$user->created_at->toFormattedDateString()}}</td>
                <td>
                  <a href="{{route('users.show', $user->id)}}" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></a>
                </td>
                <td>
                  <a href="{{route('users.edit', $user->id)}}" class="btn btn-success btn-sm"><span class="fa fa-edit"></span></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <!-- +++++++++++++++++++++++++++End++++++++++++ -->
        </div>
      </div>
    </div> <!-- end of row -->
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    {{$users->links()}}
@endsection
@section('scripts')
    <script>
$(document).ready(function(){
  $("#WorkerInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#WorkerTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection
