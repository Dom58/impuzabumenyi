@extends('layouts.blog')

@section('title', '| Edit user')

@section('stylesheets')
<style type="text/css">
  .profile-img {
    max-width: 257px;
  }
</style>
@endsection

@section('content')
    <div class="row">
      <div class="col-md-10">
        <h1>Edit User</h1>
      </div>
    </div>
    <hr>
    @role('superadmin')
    <div class="row">
    <div class="col-md-12">
    <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <div class="row">
        <div class="col-md-5">
          <div class="panel panel-default">
            <div class="panel-heading">Edit <b>{{$user->username}}</b>'s Profile</div>
              <div class="panel-body text-center">
                <img class="profile-img" id="uploadedimage" src="userProfileImage/{{$user->profile_image}}" alt="no Image">
                <p>
                  {{ Form::label('profile_image', 'Change Profile Image:', ['class' => 'form-spacing-top']) }}
                  {{ Form::file('profile_image', ['id' => 'jimage']) }}
                </p>
                <p>
                    <span id="imageerror" style="font-weight: bold; color: red"></span>
                </p>
              </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="name">Gender</label>
            <select name="gender" id="gender" class="form-control">
              <option value="1">Male</option>
              <option value="0">Female</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Full Name:</label>
            <p class="control">
              <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
            </p>
          </div>
          <div class="form-group">
            <label for="sname">Second Name:</label>
            <p class="control">
              <input type="text" class="form-control" name="sname" id="sname" value="{{$user->sname}}">
            </p>
          </div>
          <div class="form-group">
            <label for="tel">Telephone:</label>
            <p class="control">
              <input type="text" class="form-control" name="tel" id="tel" value="{{$user->tel}}">
            </p>
          </div>
          <div class="form-group">
            <label for="username">Username:</label>
            <p class="control">
              <input type="text" class="form-control" name="username" id="username" value="{{ $user->username }}">
            </p>
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <p class="control">
              <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
            </p>
          </div>
        </div> <!-- end of .column -->
      </div>

      <div class="row">
        <div class="col-md-5">
          <div class="panel panel-default">
          <div class="panel-body form-group">
            <label for="password">Password</label>
            <b-radio-group v-model="password_options">
              <div class="form-group">
                <b-radio name="password_options" value="keep">Do Not Change Password</b-radio>
              </div>
              <div class="form-group">
                <b-radio name="password_options" value="auto">Auto-Generate New Password</b-radio>
              </div>
              <div class="form-group">
                <b-radio name="password_options" value="manual">Manually Set New Password</b-radio>
                <p class="control">
                  <input type="text" class="form-control" name="password" id="password" v-if="password_options == 'manual'" placeholder="Manually give a password to this user">
                </p>
              </div>
            </b-radio-group>
          </div>
          </div>
        </div> <!-- end of .column -->
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body">
            <label for="roles">Roles:</label>
            <input type="hidden" name="roles" :value="rolesSelected" />
            <b-checkbox-group v-model="rolesSelected">
              @foreach ($roles as $role)
                <div class="form-group">
                  <b-checkbox value="{{$role->id}}">{{$role->display_name}}</b-checkbox>
                </div>
              @endforeach
            </b-checkbox-group>
        </div>
      </div>
    </div>
      <div class="row">
        <div class="col">
          <hr />
          <button class="btn btn-primary pull-right" style="width: 250px;">Update User</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endrole
@endsection

@section('scripts')
  <script>

    var app = new Vue({
      el: '#myapp',
      data: {
        password_options: 'keep',
        rolesSelected: {!! $user->roles->pluck('id') !!}
      }
    });

  </script>


  <!-- Preview of image uploaded -->
  <script>
         $(document).ready(function() {
             document.getElementById("jimage").onchange = function () {
                 var reader = new FileReader();

                 reader.onload = function (e) {
                     if (e.total > 250000) {
                         $('#imageerror').text('Image too large');
                         $jimage = $("#jimage");
                         $jimage.val("");
                         $jimage.wrap('<form>').closest('form').get(0).reset();
                         $jimage.unwrap();
                         $('#uploadedimage').removeAttr('src');
                         return;
                     }
                     $('#imageerror').text('');
                     document.getElementById("uploadedimage").src = e.target.result;
                 };
                 reader.readAsDataURL(this.files[0]);
             };
         });
  </script>
@endsection
