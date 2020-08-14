@extends('layouts.blog')

@section('title', '| View User')
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
    <h1>View User Details</h1>
  </div> <!-- end of column -->
  <div class="col-md-2">
    <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary pull-right"><i class="fa fa-user m-r-10"></i> Edit User</a>
  </div>
  <div class="col-md-12">
    <hr>
  </div>
</div>
<div class="row">
  <div class="col-lg-4">
    <div class="panel panel-default">
        <div class="panel-heading">
          <p class="text-center">
           <b> {{$user->username}} </b>'s profile.
          </p>
        </div>
      <div class="panel-body text-center">
        <img  src="/userProfileImage/{{ $user ->profile_image }}" class="profile-img img-circle"  alt="no Image" width="200" height="200" >
        @if ($user->gender == 1)
        <h4>Male</h4>
        @else
        <h4>Female</h4>
        @endif
        <h4>{{$user->sname}}</h4>

        <h4>{{$user->email}}</h4>
        <h4>{{$user->tel}}</h4>
      </div>
  </div>
</div>
<div class="col-lg-6">
  <div class="field">
    <b for="name" >Fullname</b>
    <pre>{{$user->name}}  {{ $user->sname}}</pre>
  </div>

  <div class="field">
    <div class="field">
      <b for="uname" >Username</b>
      <pre>{{$user->username}}</pre>
    </div>
  </div>

  <div class="field">
    <div class="field">
      <b for="email" >Email</b>
      <pre>{{$user->email}}</pre>
    </div>
  </div>

  <div class="field">
    <div class="field">
      <b for="email" >Roles</b>
      <ul>
        {{$user->roles->count() == 0 ? 'This user has not been assigned to any roles yet' : ''}}
        @foreach ($user->roles as $role)
          <li>{{$role->display_name}} ({{$role->description}})</li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
</div>
@endsection
