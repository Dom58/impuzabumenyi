@extends('submain')
<?php  $titleTag =htmlspecialchars( $tree ->name); ?>
@section('title' , "| $titleTag ")

@section('cssFiles')
<style type="text/css">
  .col-md-7{
    background-color:#cfefc7;
  }
  #urubobi{
    background-color:#46b8da;
    transition: .7s;
  }
</style>
@endsection
@section('leftTwocolomn')
    <div class="col-md-7">
      <center>
        <h3 style="font-weight: bold;">{{ $tree ->name }}</h3>
      </center>
      <a href="/ibidukikije_Tree/{{$tree->file_name }}">
        <img class="thumbnail" src="/ibidukikije_Tree/{{$tree->file_name }}" class="img-responsive" width="100%" />
        </a>
<p style="font-weight: bold;">Soma ubumenyi burambuye bwi " {{ $tree->name}} "</p>
        <p>{!! $tree ->description !!}
          <small class="badge pull-right" style="margin-right: 15px; font-size: 15px; font-weight: bold; border-radius: 8px;text-align: center;"><b>Ikiciro: </b> <span class="fa fa-tag"></span> <i> {{ $tree ->treecategory->name }}</i></small>
        </p>
        <br>
        <div class="line"></div>
        <div class="well" style="background-color: #fdfffd;">
         <p style="font-weight: bold;">Soma ibindi byiciro by'ibimera/ ibiti: </p>
         <p style="margin-bottom: 20px;">
         @foreach($categories as $category)
         @if($category->name =='Ibiti bifite uruti rukomeye')
         <a href="{{url('tree/all/all_bigTrees')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"> {{$category->name}}</a>

         @elseif($category->name =='Ibiti bifite uruti rworoshye')
         <a href="{{url('tree/all/all_smallTrees')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"> {{$category->name}}</a>

          @elseif($category->name =='Ibyatsi')
         <a href="{{url('tree/all/all_grasses')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"> {{$category->name}}</a>
         @endif
         @endforeach
         <!-- data-trigger="focus"
         data-trigger="static"
         data-trigger="hover" -->

         <button class="btn btn-success " title="IBIMERA BITO CYANE" data-toggle="popover" id="urubobi" data-placement="top" data-trigger="focus" data-content=" 
              <p><a href='#' class='btn btn-info'>Ibimera biba mu mazi </a></p>
              <p><a href='#' class='btn btn-info btn-sm'> Urubobi </a></p>
              " data-html="true"  style="margin-bottom: 5px;"> <span class="fa fa-plus" style="font-size: 20px;"></span></button>
<!-- <br>
                
              <form class="collapse list-unstyled " id="form">
                <input type="text" name="search">
                <button>Search</button>
              </form> <b data-target="#form" data-toggle="collapse" aria-expanded="false"> <span class="fa fa-search"></span> </b> -->

<!-- <button class="btn btn-warning " title="TUMWE MU DUKOKO" data-toggle="popover" id="urubobi" data-placement="top" data-trigger="focus" data-content=" 
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

  $('#urubobi').popover();
  });

</script>
@endsection