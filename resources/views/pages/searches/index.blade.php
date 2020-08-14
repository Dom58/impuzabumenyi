@extends('submain')

@section('title','| Result Found')

@section('cssFiles')
  <style type="text/css">
    body
    {
  background-image: url('/background/2.png');
      }
  </style>
@endsection

@section('leftTwocolomn') 
        <div class="col-md-7" style="background-color: white; border: 3px solid #0c2105; margin-bottom: 30px;">
          <center>
            <h3 style="color: black; ">Ijambo washakishaga:<b style="background-color: #f5f59c;">{{$post_search }}</b>
            </h3>
            <h3 style="color: black; font-weight: bold; ">Igisubizo Kibashije Kuboneka</h3>
          </center>
          <hr>
          <center></center>
        
            
             <!-- +++++++++++++++++++++inkuru search++++++++++++++++++++++++++ -->
          
          
          @foreach($post_searches as $post_search)
              @if($post_search->status==1)
          <div class="divider" style="margin-top: 20px; margin-left: 8px;">
          
          <h4><b>{{ $post_search ->title }} </b></h4>
        <p><img src=" /postsImage/{{ $post_search ->file_name }} "  width="150" height="100"></p>
        <h5 style="color: gray; font-style: italic; font-size: 13px;">Inkuru yanditswe: {{ date('d - m - Y',strtotime($post_search->created_at)) }} na: <b><span class="fa fa-user-circle"></span> {{ $post_search->user->name}} {{ $post_search->user->sname}} </b></h5>
        <p>{!! $post_search ->body !!} </p>
        <p class="pull-right" style="background-color: gray; color: white; border-radius: 6px; margin-bottom: 20px; margin-top: 1px;">Ikiciro: <b> {{$post_search->category->name }} </b></p>
      </div>
        <hr>
        @endif
            @endforeach
            
         
</div>
@endsection

@section('informationBody')
<div class="col-md-4" style="margin-left: 10px; background-color: white;">
 <p style="font-weight: bold; font-style: italic; color: brown;"> Ibijyanye niki gice(uru ruhande) turacyabinoza neza!!! </p>
</div>
@endsection

