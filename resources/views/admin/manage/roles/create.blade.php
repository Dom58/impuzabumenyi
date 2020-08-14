@extends('layouts.blog')

@section('title', '| Create a Role')

@section('content')
    <div class="row">
      <div class="col-md-10">
        <h1 class="title">Create New Role</h1>
      </div>
    </div>
    <hr>
    <form action="{{route('roles.store')}}" method="POST">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title">Role Details:</h1>
                  <div class="form-group">
                    <p class="control">
                      <label for="display_name">Name (Human Readable)</label>
                      <input type="text" class="form-control" name="display_name" value="{{old('display_name')}}" id="display_name">
                    </p>
                  </div>
                  <div class="form-group">
                    <p class="control">
                      <label for="name">Slug (Can not be changed)</label>
                      <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
                    </p>
                  </div>
                  <div class="form-group">
                    <p class="control">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" value="{{old('description')}}" id="description" name="description">
                    </p>
                  </div>
                  <input type="hidden" :value="permissionsSelected" name="permissions">
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-10">

              <div class="media-content">
                <div class="content">
                  <h2 class="title">Permissions:</h1>
                  <b-checkbox-group v-model="permissionsSelected">
                    @foreach ($permissions as $permission)
                      <div class="form-group">
                        <b-checkbox :custom-value="{{$permission->id}}">{{$permission->display_name}} <em>({{$permission->description}})</em></b-checkbox>
                      </div>
                    @endforeach
                  </ul>
                </div>
              </div>


          <button class="btn btn-primary">Create New Role</button>
        </div>
      </div>
    </form>
  </div>
@endsection


@section('scripts')
  <script>

  var app = new Vue({
    el: '#app',
    data: {
      permissionsSelected: []
    }
  });

  </script>
@endsection
