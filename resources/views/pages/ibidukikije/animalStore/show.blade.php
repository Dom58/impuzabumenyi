@extends('submain')
<?php  $titleTag =htmlspecialchars( $animal ->name); ?>
@section('title' , "| $titleTag ")

@section('cssFiles')
<style type="text/css">
  .col-md-7{
    background-color: whitesmoke;
  }
</style>
@endsection
@section('leftTwocolomn')
    <div class="col-md-7">
      <center>
        <h3 style="font-weight: bold;">{{ $animal ->name }}</h3>
      </center>
      <a href="/ibidukikije_Animal/{{$animal->file_name }}">
        <img class="thumbnail" src="/ibidukikije_Animal/{{$animal->file_name }}" class="img-responsive" width="100%" />
        </a>
<p style="font-weight: bold;"> Soma ubumenyi burambuye " {{ $animal->name}} "</p>
        <p>{!! $animal ->description !!}
          <small class="badge pull-right" style="margin-right: 15px; font-size: 15px; font-weight: bold; border-radius: 8px;text-align: center;"><b>Ikiciro: </b> <span class="fa fa-tag"></span> <i> {{ $animal ->animalcategory->name }}</i></small>
        </p>
        <br>
        <div class="line"></div>
        <div class="well" style="background-color: #a4d8e8;">
         <p style="font-weight: bold;">Soma ibindi byiciro by'inyamaswa: </p>
         <p style="margin-bottom: 20px;">
         @foreach($categories as $category)
         @if($category->name =='Inyamabere')
         <a href="{{ url('/animal/all/all_mammalia')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"> {{$category->name}}</a>

         @elseif($category->name =='Inyoni')
         <a href="{{ url('/animal/all/all_birds')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"> {{$category->name}}</a>

          @elseif($category->name =='Amafi')
         <a href="{{ url('/animal/all/all_fishes')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"> {{$category->name}}</a>

          @elseif($category->name =='Ibikururanda')
         <a href="{{ url('/animal/all/all_reptiles')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"> {{$category->name}}</a>

          @elseif($category->name =='Inigwahabiri')
         <a href="{{ url('/animal/all/all_insects')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"> {{$category->name}}</a>
         @endif
         @endforeach
         <!-- data-trigger="focus"
         data-trigger="static"
         data-trigger="hover" -->

         <button class="btn btn-warning " title="TUMWE MU DUKOKO" data-toggle="popover" id="udukoko" data-placement="top" data-trigger="focus" data-content=" 
              <p><a href='#' class='btn btn-info'> Udukoko dutera indwara </a></p>
              <p><a href='#' class='btn btn-info btn-sm'> Udukoko dukenerwa ku buzima </a></p>
              " data-html="true"  style="margin-bottom: 5px;"> <span class="fa fa-plus" style="font-size: 20px;"></span></button>
<!-- <br>
                
              <form class="collapse list-unstyled " id="form">
                <input type="text" name="search">
                <button>Search</button>
              </form> <b data-target="#form" data-toggle="collapse" aria-expanded="false"> <span class="fa fa-search"></span> </b> -->

<!-- <button class="btn btn-warning " title="TUMWE MU DUKOKO" data-toggle="popover" id="udukoko" data-placement="top" data-trigger="focus" data-content=" 
              @foreach($categories as $post) 
              <p><a href='#' class='btn btn-info'> {{ $post ->name }} </a></p>
              @endforeach" data-html="true"  style="margin-bottom: 5px;"> <span class="fa fa-plus" style="font-size: 20px;"></span></button> -->
       </p>
       </div>
       <br>
    </div>

  @endsection
  <!-- @section('informationBody')
  @endsection -->

@section('javaScriptFiles')
<script type="text/javascript">
  // Hover only display a title
  $(document).ready(function(){

  $('#udukoko').popover();
  });

</script>
@endsection