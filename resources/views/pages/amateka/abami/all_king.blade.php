@extends('submain')
@section('title' , '| Abami bayoboye u Rwanda')

@section('cssFiles')
<style type="text/css">

  .figure img{
    width: 100%;
    height: 150px !important;
    border: 3px solid #94bf8a;
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
    background-color: white;
    border-radius: 10px;
  }
  .abami{
    background-color: #5bc0de;
    font-style: italic;
  }
</style>
@endsection

@section('informationBody')
<div class="col-md-12" style="background-color: white">
   <h4 style="font-weight: bold; font-size:20px; text-align: center;">Abami bayoboye u Rwanda Bose</h4>
  @foreach($abamis as $king)
  <div class="col-lg-3 col-md-4  col-sm-6 col-xs-12">
          <div class="panel panel-default" style="border: 1px solid gray; box-shadow: 3px 10px #564f4f;">
              <div class="panel-body">
                <div class="content">
                  <p style="font-weight: bold;">{{ $king->name}}</p>
                  <a href="{{route('abami.show',$king->name)}}" class="btn btn-default btn-sm abami">Soma amateka amwerekeyeho</a> 
                </div>
              </div>
          </div>
        </div>
  @endforeach
</div>
</div>
<br>
  <center> {!! $abamis->links() !!}</center>
@endsection