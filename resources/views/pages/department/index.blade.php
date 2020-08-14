@extends('layouts.blog')
@section('title', '| Manage Roles')
@section('content')
    <div class="row">
      <div class="col-md-8">
        <h1 class="title">Manage Department</h1>
      </div>

      <div class="col-md-4">
        <div class="well">
        <button class="btn btn-info pull-right" data-toggle="collapse" data-target="#content"><i class="fa fa-pencil m-r-10"></i> Create New Department</button>
        <br>
  <div class="collapse" id="content">
  
  <form method="POST" action="{{ route('department.store')}}" style="border-right: 3px black;">
    {{ csrf_field() }}
<br>
<p></p>
<label>Department Name :</label>
 <input type="text" name="name" class="form-control" placeholder="Type department name" />
<br>
 <label>Department Description :</label>
 <input type="text" name="description" class="form-control" placeholder="Type Department description" style=" margin-top: 5px;" />
 <button type="submit" class="btn btn-success form-control" style=" margin-top: 5px;">Save Department</button>
 </form>

 </div>
</div>

      </div>
    </div>
    <hr class="m-t-0">

    <div class="row">
      @foreach ($departments as $department)
        <div class="col-lg-4">
          <div class="panel panel-default">
              <div class="panel-body">
                <div class="content">
                  <h3 class="title">{{ $department->name}}</h3>
                
                  <p>
                    {{$department->description}}
                  </p>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <a href="{{ route('department.show', $department->id)}}" class="btn btn-primary fullwidth">Details</a>
                  </div>
                  <div class="col-md-3">
                    <a href="{{ route('department.edit', $department->id)}}" class="btn btn-default fullwidth">Edit</a>
                  </div>
                </div>
              </div>
          </div>
        </div>
      @endforeach
    </div>
@endsection
