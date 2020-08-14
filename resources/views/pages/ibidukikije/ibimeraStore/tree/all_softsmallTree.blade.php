@extends('submain')
@section('title' , '| Amoko yi ibimera bifite uruti rworoshye buba mu Rwanda')

@section('cssFiles')
<style type="text/css">

  .figure img{
    width: 100%;
    height: 250px !important;
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
  .col-lg-4,.col-md-4,.col-sm-6,.col-xs-12{
    background-color: #aca869;
    border-radius: 10px;
  }
</style>
@endsection

@section('informationBody')
<div class="col-md-12" style="background-color: #aca869">
   <h4 style="font-weight: bold; font-size:20px; text-align: center;">Amoko y'ibiti / ibimera bifite uruti rworoshye buboneka mu Rwanda: &nbsp; <span class="fa fa-camera"></span> <span class="badge" style="background-color: #76a756; font-size:20px;"> {{ $all_softtrees->count()}}</span></h4>
  @foreach($strongtrees as $strongtree)
  <div class="col-lg-4 col-md-4  col-sm-6 col-xs-12">
          <div class="panel panel-default" style="border: 1px solid gray;">
              <div class="panel-body">
                <div class="content">
                  <div class="figure">
                    <a href="{{ route('tree.show',$strongtree->slug) }}">
                    <img src="/ibidukikije_Tree/{{ $strongtree->file_name}}"/>
                    </a>
                  <h4 style="text-align: center;" class="caption" style="position: relative;">{{ $strongtree->name}}</h4>
                  </div>  
                </div>
              </div>
          </div>
        </div>
  @endforeach
</div>
</div>
<br>
  <center> {!! $strongtrees->links() !!}</center>
@endsection