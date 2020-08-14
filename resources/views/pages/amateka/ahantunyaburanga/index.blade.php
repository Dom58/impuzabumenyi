@extends('submain')
@section('title' , '| Ahantu Nyaburanga')

@section('cssFiles')
<style type="text/css">

  .figure img{
    width: 100%;
    height: 260px;
    border: 3px solid #ff9235;
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
  .col-lg-3,.col-md-4,.col-sm-6,.col-xs-12{
   background-color: #e1bf6e;
    border-radius: 20px;
  }
</style>
@endsection

@section('informationBody')
<div class="col-md-12" style=" background-color: #e1bf6e;">
   <h4 style="font-weight: bold; font-size:20px; text-align: center;">Amafoto Yose y'ahantu nyaburanga: &nbsp; <span class="fa fa-camera"></span> <span class="badge" style="background-color:indigo; font-size:20px;"> {{ $ahantunyaburanga_counts->count()}}</span></h4>
  @foreach($ahantunyaburangas as  $ahantunyaburanga)
  <div class="col-lg-4 col-md-6  col-sm-6">
          <div class="panel panel-default" style="border: 1px solid gray;">
              <div class="panel-body">
                <div class="content">
                  <div class="figure">
                    <a href="{{ route('ahantu_nyaburanga.show', $ahantunyaburanga->name) }}">
                    <img src="/Ahantunyaburanga/{{  $ahantunyaburanga->file_name}}"/>
                    </a>
                  <h4 style="text-align: center;" class="caption" style="position: relative;">{{  $ahantunyaburanga->name}}</h4>
                  </div>  
                </div>
              </div>
          </div>
        </div>
  @endforeach
</div>
</div>
<br>
  <center> {!! $ahantunyaburangas->links() !!}</center>
@endsection