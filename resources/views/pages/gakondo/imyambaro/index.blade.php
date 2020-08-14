@extends('submain')
@section('title' , '| Imyambaro Gakondo')

@section('cssFiles')
<style type="text/css">

  .figure img{
    width: 100%;
    height: 250px;
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
    background-color: #efd9ad;
    border-radius: 10px;
  }
</style>
@endsection

@section('informationBody')
<div class="col-md-12" style="background-color: #efd9ad;">
   <h4 style="font-weight: bold; font-size:20px; text-align: center;">Imyambaro Yose: &nbsp; <span class="fa fa-camera"></span> <span class="badge" style="background-color: #76a756; font-size:20px;"> {{ $gakondo_counts->count()}}</span></h4>
  @foreach($gakondos as $gallery)
  <div class="col-lg-4 col-md-6  col-sm-6">
          <div class="panel panel-default" style="border: 1px solid gray;">
              <div class="panel-body">
                <div class="content">
                  <div class="figure">
                    <a href="{{ route('imyambaro.show',$gallery->slug) }}">
                    <img src="/imyambaroGakondo/{{ $gallery->file_name}}"/>
                    </a>
                  <h4 style="text-align: center;" class="caption" style="position: relative;">{{ $gallery->name}}</h4>
                  </div>  
                </div>
              </div>
          </div>
        </div>
  @endforeach
</div>
</div>
<br>
  <center> {!! $gakondos->links() !!}</center>
@endsection