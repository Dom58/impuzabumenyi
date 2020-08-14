@extends('layouts.blog')

@section('content')
    <div class="row">
      <div class="col-md-10">
        <h1 class="title">View Permission Details</h1>
      </div> <!-- end of column -->

      <div class="col-md-2">
        <a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-edit m-r-10"></i> Edit Permission</a>
      </div>
    </div>
    <hr class="m-t-0">

    <form action="{{route('permissions.update', $permission->id)}}" method="POST">
      {{csrf_field()}}
      {{method_field('PUT')}}

      <div class="form-group">
        <label for="display_name" class="label">Name (Display Name)</label>
        <p class="control">
          <input type="text" class="form-control" name="display_name" id="display_name" value="{{$permission->display_name}}">
        </p>
      </div>

      <div class="form-group">
        <label for="name" class="label">Slug <small>(Cannot be changed)</small></label>
        <p class="control">
          <input type="text" class="form-control" name="name" id="name" value="{{$permission->name}}" disabled>
        </p>
      </div>

      <div class="form-group">
        <label for="description" class="label">Description</label>
        <p class="control">
          <input type="text" class="form-control" name="description" id="description" placeholder="Describe what this permission does" value="{{$permission->description}}">
        </p>
      </div>

      <button class="btn btn-primary">Save Changes</button>
    </form>
@endsection
