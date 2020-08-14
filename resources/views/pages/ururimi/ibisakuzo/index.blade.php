@extends('submain')
@section('title' , '| Ibisakuzo Byose')

@section('cssFiles')
<style type="text/css">

  .figure img{
    width: 100%;
    height: 350px;
    border: 3px solid black;
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
    /*background-color: #ffdd7b;*/
    background-image: url('/background/imigongo.jpeg'); 
    background-attachment: fixed;
    background-size: cover;
    border-radius: 10px;
  }
</style>
@endsection

@section('informationBody')
<div class="col-md-12" style="background-image: url('/background/imigongo.jpeg'); background-attachment: fixed; background-size: cover;">
   <h4 style="background-color: white; font-weight: bold; font-size:20px; text-align: center;">Ibisakuzo byose: &nbsp; <span class="fa fa-camera"></span> <span class="badge" style="background-color: #76a756; font-size:20px;"> {{ $ibisakuzo_counts->count()}}</span></h4>
   <?php $n=1; ?>
  @foreach($ibisakuzos as $igisakuzo)
  <div class="col-lg-4 col-md-6  col-sm-6 col-xs-12" >
          <div class="panel panel-default" style="border: 1px solid gray;">
              <div class="panel-body">
                <p style="text-align: center;">Sakwe Sakwe!</p>
                <div class="content">
                <a href="{{ route('ibisakuzo.show',$igisakuzo->slug)}}">  <h4 style="text-align: center;" class="caption" style="position: relative;"><b>{{ $n++}}.</b> {{ $igisakuzo->name}}</h4> </a>
                 <p> <span class="fa fa-hand-o-right" style="font-size: 20px;"></span> <b style="font-size: 18px;"> {{ $igisakuzo->kice}}</b>  </p>
                </div>
              </div>
          </div>
        </div>
  @endforeach
</div>
</div>
<br>
  <center> {!! $ibisakuzos->links() !!}</center>
@endsection