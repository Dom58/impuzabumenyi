@extends('submain')
@section('title' , '| All National Parks')

@section('cssFiles')
<style type="text/css">

  .figure img{
    width: 100%;
    height: 300px;
    border: 3px solid green;
    /*filter: grayscale(50%);*/
    transition: 1s;
  }
  img:hover {
    border-radius: 6px;
    cursor: zoom-in;
    filter: grayscale(0);
    transform: scale(1.1);
    transition: .8s;
    position: relative;
    z-index: 999 !important;  
  }
  .col-lg-6,.col-sm-12{
    background-color: #94bf8a;
    border-radius: 10px;
  }
</style>
@endsection

@section('informationBody')
<div class="col-md-12" style="background-color: #94bf8a;">
   <h4 style="font-weight: bold; font-size:20px; text-align: center;">Parike Zose: &nbsp; <span class="fa fa-camera"></span> <span class="badge" style="background-color: #76a756; font-size:20px;"> {{ $park_counts->count()}}</span></h4>
  @foreach($parks as $park)
  <div class="col-lg-6 col-md-12  col-sm-12">
          <div class="panel panel-default" style="border: 1px solid gray;">
              <div class="panel-body">
                <div class="content">
                  <div class="figure">
                    <a href="{{ route('parks.show',$park->slug) }}">
                    <img src="/Parks/{{ $park->file_name}}"/>
                    </a>
                  <h4 style="text-align: center;" class="caption" style="position: relative;">{{ $park->name}}</h4>
                  </div>  
                </div>
              </div>
          </div>
        </div>
  @endforeach
</div>
</div>
<br>
  <center> {!! $parks->links() !!}</center>
@endsection