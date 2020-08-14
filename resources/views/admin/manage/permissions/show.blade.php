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
    <hr>

    <div class="row">
      <div class="col-md-10">
        <div class="box">
          <article class="media">
            <div class="media-content">
              <div class="content">
                <p>
                  <strong>{{$permission->display_name}}</strong> <small>{{$permission->name}}</small>
                  <br>
                  {{$permission->description}}
                </p>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
@endsection
