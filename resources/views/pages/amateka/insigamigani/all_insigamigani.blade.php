@extends('submain')
@section('title' , '| Insigamigani')

@section('cssFiles')
<style type="text/css">

  .col-lg-6,.col-md-6,.col-sm-12,.col-xs-12{
    background-color: white;
    border-radius: 10px;
  }

</style>
@endsection

@section('informationBody')
<div class="col-md-12" style="background-color: white">
   <h4 style="font-weight: bold; font-size:20px; text-align: center;"><pre>Insigamigani <span class="badge">{{$insigamigani_counts->count()}}</span> </pre></h4>
   <?php $n=1; ?>
  @foreach($insigamigani as $insigamugani)
  <div class="col-lg-6 col-md-6  col-sm-12 col-xs-12">
          <div class="panel panel-default" style="border: 1px solid gray; box-shadow: 5px 5px  #d8c3c3;">
              <div class="panel-body">
                <div class="content">
                  <p style="text-align: center;">{{ $n++}}. Insigamigani yitwa" <b>{{ $insigamugani->name}}</b> "</p>
                  <!-- <div class="line"></div> -->
                 <p>{{ substr(strip_tags($insigamugani ->body),0,500) }} {{strlen(strip_tags($insigamugani ->body)) >500 ? "..." : "" }}<br>
                  <a href="{{route('insigamigani.show',$insigamugani->slug)}}" class="btn btn-info btn-sm">Soma insigamigani yose</a>
                 </p>
                </div>
              </div>
          </div>
        </div>
  @endforeach
</div>
</div>
<br>
  <center> {!! $insigamigani->links() !!}</center>
@endsection