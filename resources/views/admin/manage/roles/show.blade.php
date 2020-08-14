@extends('layouts.blog')
@section('title', '| View Role')
@section('content')
    <div class="row">
      <div class="col-md-10">
        <h1 class="title">{{$role->display_name}}<small class="m-l-25"><em>({{$role->name}})</em></small></h1>
        <h5>{{$role->description}}</h5>
      </div>
      <div class="col-md-2">
        <a href="{{route('roles.edit', $role->id)}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-user-plus m-r-10"></i> Edit this Role</a>
      </div>
    </div>
    <hr>

    <div class="row">
      <div class="col-md-6">
        <div class="box">
          <article class="media">
            <div class="media-content">
              <div class="content">
                <h2 class="title">Permissions:</h1>
                <ul>
                  @foreach ($role->permissions as $r)
                    <li>{{$r->display_name}} <em class="m-l-15">({{$r->description}})</em></li>
                  @endforeach
                </ul>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
@endsection
