@extends('submain')
<?php  $titleTag =htmlspecialchars( $king ->name); ?>
@section('title' , "| $titleTag ")

@section('cssFiles')
<style type="text/css">
  .col-md-7{
    background-color: #f5f1c2;
  }
</style>
@endsection
@section('leftTwocolomn')
    <div class="col-md-7">
      <center>
        <h3 style="font-weight: bold;">{{ $king ->name }}</h3>
      </center>
      @if($king->file_name ===null)
 <pre><b style="color: brown;">Nta foto yuyu mwami yabonetse! </b></pre>
      @else
      <a href="/kings/{{$king->file_name }}">
        <img class="thumbnail" src="/kings/{{$king->file_name }}" class="img-responsive" width="100%" />
        </a>
        @endif
      <p style="font-weight: bold;"> Soma Amateka Arambuye ya" {{ $king->name}} "
      </p>
      <div class="line"></div>
        <p>{!! $king ->history !!}
          
        </p>
        <br>
        <div class="line"></div>
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