@extends('layouts.blog')
@section('title', '| Manage post Categories')
@section('content')
    <div class="row">
      <div class="col-md-8">
        <h1 class="title">Manage Categories</h1>
      </div>

      <div class="col-md-4">
        <div class="well">
        <button class="btn btn-info pull-right" data-toggle="collapse" data-target="#content"><i class="fa fa-pencil m-r-10"></i> Create New Category</button>
        <br>
  <div class="collapse" id="content">
  
  <form method="POST" action="{{ route('category.store')}}" style="border-right: 3px black;">
    {{ csrf_field() }}
<br>
<p></p>
<label>Category name :</label>
 <input type="text" name="name" class="form-control" placeholder="Type category name" />
<br>
 <label>Category Description :</label>
 <input type="text" name="description" class="form-control" placeholder="Type brief description" style=" margin-top: 5px;" />
 <button type="submit" class="btn btn-success form-control" style=" margin-top: 5px;">Save</button>
 </form>

 </div>
</div>

      </div>
    </div>
    <hr class="m-t-0">

    <div class="row">
      @foreach ($categories as $category)
        <div class="col-lg-4">
          <div class="panel panel-default">
              <div class="panel-body">
                <div class="content">
                  <h3 class="title">{{ $category->name}}</h3>
                
                  <p>
                    {{$category->description}}
                  </p>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <a href="{{ route('category.show', $category->id)}}" class="btn btn-primary fullwidth">Details</a>
                  </div>
                  <div class="col-md-3">
                    <a href="{{ route('category.edit', $category->id)}}" class="btn btn-default fullwidth">Edit</a>
                  </div>
                </div>
              </div>
          </div>
        </div>
      @endforeach
    </div>
@endsection
