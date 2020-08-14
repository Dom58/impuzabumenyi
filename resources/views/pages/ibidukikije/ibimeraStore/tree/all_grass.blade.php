@extends('submain')
@section('title' , '| Ubwoko bwibikururanda buba mu Rwanda')

@section('cssFiles')
<style type="text/css">

  .figure img{
    width: 100%;
    height: 150px !important;
    border: 3px solid #aca869;
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
    background-color: #aca869;
    border-radius: 10px;
  }
</style>
@endsection

@section('informationBody')
<div class="col-md-12" style="background-color: #aca869">
   <h4 style="font-weight: bold; font-size:20px; text-align: center;">Ubwoko bw'ibikururanda buboneka mu Rwanda: &nbsp; <span class="fa fa-camera"></span> <span class="badge" style="background-color: #76a756; font-size:20px;"> {{ $all_grasses->count()}}</span></h4>
  @foreach($grasses as $grasse)
  <div class="col-lg-3 col-md-4  col-sm-6 col-xs-12">
          <div class="panel panel-default" style="border: 1px solid gray;">
              <div class="panel-body">
                <div class="content">
                  <div class="figure">
                    <a href="{{ route('tree.show',$grasse->slug) }}">
                    <img src="/ibidukikije_Tree/{{ $grasse->file_name}}"/>
                    </a>
                  <h4 style="text-align: center;" class="caption" style="position: relative;">{{ $grasse->name}}</h4>
                  </div>  
                </div>
              </div>
          </div>
        </div>
  @endforeach
</div>
</div>
<br>
  <center> {!! $grasses->links() !!}</center>
@endsection