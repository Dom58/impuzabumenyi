@extends('submain')
@section('title' , '| Imigani miremire yose')

@section('cssFiles')
<style type="text/css">
.btn-sm{
  background-color: #2f4829;
  transition: .9s;
}
</style>
@endsection

@section('informationBody')
<div class="col-md-12">
   <h4 style="font-weight: bold; font-size:20px; text-align: center;">Imigani Miremire Yose:  <span class="badge" style="background-color: #76a756; font-size:20px;"> {{ $imiganimire_counts->count()}}</span></h4>
   <?php $n=1; ?>
  @foreach($imiganimires as $imiganimire)
  <div class="col-lg-6 col-md-6  col-sm-12 col-xs-12">
          <div class="panel panel-default" style="border: 1px solid gray;">
              <div class="panel-body">
                <p style="text-align: center;">Soma umugani witwa: <b> "{{ $imiganimire->title}}" </b></p>
                <div class="content">
                <h4 style="text-align: center;" class="caption" style="position: relative;"><b>{{ $n++}}.</b> {{ $imiganimire->title}}</h4>

                 <p>  {{ substr(strip_tags($imiganimire ->body),0,500) }} {{strlen(strip_tags($imiganimire ->body)) >500 ? "..." : "" }}<a href="{{ route('imigani_miremire.show',$imiganimire->title)}}" class=" btn-primary"> soma ibirenzeho</a></p>
                 <p><a href="{{ route('imigani_miremire.show',$imiganimire->title)}}" class="btn btn-success btn-sm"> Kanda ubone icyo uyu mugani usobanura</a> </p>
                </div>
              </div>
          </div>
        </div>
  @endforeach
</div>
</div>
<br>
  <center> {!! $imiganimires->links() !!}</center>
@endsection