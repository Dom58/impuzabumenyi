@extends('layouts.blog')

@section('title', '| Dashboard')

@section('stylesheets')
  <style>
    {!! Charts::assets() !!}
  </style>
@endsection

@section('content')
  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
    </div>
    <div class="panel">
      <div class="panel-body">
          <div class="row">
            <div class="col-md-3">
              <div class="metric">
                <span class="icon"><i class="lnr lnr-users"></i></span>
                <p>
                  <span class="number">{{$totalusers}}</span>
                  <span class="title">Users</span>
                </p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="metric">
                <span class="icon"><i class="lnr lnr-pencil"></i></span>
                <p>
                  <span class="number">{{$totalposts}}</span>
                  <span class="title">Posts</span>
                </p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="metric">
                <span class="icon"><i class="fa fa-comment"></i></span>
                <p>
                  <span class="number">{{$totalcomments}}</span>
                  <span class="title">Comments</span>
                </p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="metric">
                <span class="icon"><i class="fa fa-tasks fa-5x"></i></span>
                <p>
                  <span class="number">{{$totalcategories}}</span>
                  <span class="title">Categories</span>
                </p>
              </div>
            </div>
          </div>
      </div>
       {!! $chart->render() !!}
    </div>

    <div class="row">
      <div class="col-md-9">
        {!! $chart->render() !!}
      </div>
      <div class="col-md-3">
      </div>
    </div>


@endsection
