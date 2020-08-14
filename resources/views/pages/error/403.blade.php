@extends('submain')

@section('title','| All Saints')

@section('cssFiles')
<style type="text/css">
	.col-md-8{
		border-radius: 10px;
	}
	/*input[type]{
		background-color: #171616;
		text-align: center;
		height: 40px;
		font-weight: bold;
		color: white;
		border-radius: 10px;
	}*/
</style>
@endsection

@section('informationBody')

<div id="saint" class="col-md-8 col-md-offset-2" style="background-color: white; border: 5px solid red; ">
<!-- <marquee behavior="alternate" direction="left" scrollamount="2"> --> <h3 style="color: brown; text-align: center;"><span class="fa fa-warning" style="color: red;"></span> {{ $myerror }} </h3>
<!-- </marquee>  -->
  </div>
@endsection

 @section('javaScriptFiles')
 @endsection