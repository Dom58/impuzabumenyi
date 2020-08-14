@extends('submain')
@section('title' , '| Ubwoko bwamafi buba mu Rwanda')

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
    background-color: #8fb1a4;
    border-radius: 10px;
  }
</style>
@endsection

@section('informationBody')
<div class="col-md-12" style="background-color: #8fb1a4">
   <h4 style="font-weight: bold; font-size:20px; text-align: center;"><pre>Ubwoko bw'amafi buboneka mu Rwanda: &nbsp; <span class="fa fa-camera"></span> <span class="badge" style="background-color: #76a756; font-size:20px;"> {{ $all_fishes->count()}}</span> </pre></h4>
  @foreach($fishes as $fish)
  <div class="col-lg-3 col-md-4  col-sm-6 col-xs-12">
          <div class="panel panel-default" style="border: 1px solid gray; box-shadow: 3px 10px #42545a;">
              <div class="panel-body">
                <div class="content">
                  <div class="figure">
                    <a href="{{ route('animal.show',$fish->slug) }}">
                    <img src="/ibidukikije_Animal/{{ $fish->file_name}}"/>
                    </a>
                  <h4 style="text-align: center;" class="caption" style="position: relative;">{{ $fish->name}}</h4>
                  </div>  
                </div>
              </div>
          </div>
        </div>
  @endforeach
</div>
</div>
<br>
  <center> {!! $fishes->links() !!}</center>
@endsection