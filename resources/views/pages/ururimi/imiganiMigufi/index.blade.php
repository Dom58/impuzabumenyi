@extends('submain')
@section('title' , '| Imigani migufi yose')

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
   <h4 style="font-weight: bold; font-size:20px; text-align: center;">Imigani migufi Yose:  <span class="badge" style="background-color: #76a756; font-size:20px;"> {{ $imiganimigufi_counts->count()}}</span></h4>
   <div class="col-md-10 col-md-offset-1">
   <h4 style="font-weight: bold; font-size:16px; text-align: center;">
     <input type="text" name="imiganiMigufi" id="imiganiMigufi" class="form-control" style="background-color:#d1f9c7; min-height: 40px; text-align: center;">
     <span class="fa fa-search" style="float: left; margin-left: 5px; margin-top: -30px; position: relative; color: gray;"></span>
   </h4>
 </div>

   <?php $n=1; ?>
<table class="table" id="imiganiMigufiTable" style="background-color: whitesmoke; border-radius: 15px;">
  <tr>
    <th>Izina ry'umugani mugufi</th>
    <th>Kanda ahakurikira ubone igisobanuro</th>
  </tr>
  <tbody>
    <?php $n=1; ?>
    @foreach($imiganimigufis as $imiganimigufi)
    <tr>
      <td>
       <b> {{$n++}}.</b> {{ $imiganimigufi->name}}
      </td>
      <td>
        <a href="{{ route('imigani_migufi.show',$imiganimigufi->name) }}" class="btn btn-success btn-sm"><span class="fa fa-hand-o-left" style="font-size: 20px;"></span>= Soma igisobanuro cy'uyu mugani</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
<br>
  <center> {!! $imiganimigufis->links() !!}</center>
@endsection

@section('javaScriptFiles')
<script>
$(document).ready(function(){
  $("#imiganiMigufi").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#imiganiMigufiTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection