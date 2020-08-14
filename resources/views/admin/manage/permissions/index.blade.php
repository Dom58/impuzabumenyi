@extends('layouts.blog')

@section('title', '| All permissions')

@section('content')
    <div class="row">
      <div class="col-md-9">
        <h1 class="title">Manage Permissions</h1>
      </div>
      <div class="col-md-2">
        <a href="{{route('permissions.create')}}" class="btn btn-primary btn-h1-spacing">
          <i class="fa fa-user-plus m-r-10"></i> Create New Permission</a>
      </div>
    </div>
    <hr>

    <div class="card">
      <div class="card-content">
        <table class="table is-narrow">
          <thead>
            <tr>
              <th>Name</th>
              <th>Slug</th>
              <th>Description</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @foreach ($permissions as $permission)
              <tr>
                <th>{{$permission->display_name}}</th>
                <td>{{$permission->name}}</td>
                <td>{{$permission->description}}</td>
                <td class="has-text-right">
                  <a class="btn btn-primary btn-sm" href="{{route('permissions.show', $permission->id)}}">View</a>
                  <a class="btn btn-primary btn-sm" href="{{route('permissions.edit', $permission->id)}}">Edit</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div> <!-- end of .card -->
@endsection
