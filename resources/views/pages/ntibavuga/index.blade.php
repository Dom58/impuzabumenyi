@extends('submain')
@section('title' , '| Ntibavuga| Bavuga')

@section('cssFiles')
<style type="text/css">
  .btn-primary{
    background-color: #175f1c;
    transition: 2s;
  }
</style>
@endsection
@section('leftTwocolomn')
<div class="col-md-3" style="background-color: whitesmoke; margin-right: 10px; border-radius: 10px; box-shadow: 5px 10px gray; ">
  <form action="{{ url('/ntibavuga/bavuga/seachResult')}}" method="get" style="margin-top: 10px; ">
    {{ csrf_field()}}
    <label><b>Hitamo ibindi byiciro,muri iki gice cya Ntibavuga Bavuga</b></label>
    <select name="search" class="form-control" style="background-color: #afd0a4; margin-bottom: 20px; font-weight: bold;">
            <option value="">Hitamo ikiciro...</option>
            @foreach($categories as $category)
            <option value="{{ $category->id}}"> {{ $category->name}} </option>
            @endforeach
          </select>
          <center>
          <button type="submit" class="btn btn-primary"><i class="fa fa-search" style="font-size: 18px;"></i> Kanda Winjiremo</button>
          </center>
  </form>
  <hr>
</div>
@endsection
@section('informationBody')
<div class="col-md-8" style="border: 3px solid gray; border-radius: 10px;">
  <table class="table">
    <center><h3>Ku Inka </h3></center>
    <tr>
    <th>#</th>
    <th>Ntibavuga</th>
    <th>Bavuga</th>
  </tr>
  <tbody>
    <?php $n=1; ?>
    @foreach($ntibavugas as $ntibavuga)
    @if($ntibavuga->ntibavugacategory_id ==1)
    <tr>
      <td style="width: 30px;">{{ $n++ }}</td>
      <td> {{$ntibavuga->ntibavuga }} </td>
      <td> {{ $ntibavuga->bavuga}} </td>
    </tr>
    @endif
    @endforeach
  </tbody>
  </table>
  <hr>
  <table class="table">
    <center><h3>Ku Umwami </h3></center>
    <tr>
    <th>#</th>
    <th>Ntibavuga</th>
    <th>Bavuga</th>
  </tr>
  <tbody>
    <?php $n=1; ?>
    @foreach($ntibavugas as $ntibavuga)
    @if($ntibavuga->ntibavugacategory_id ==6)
    <tr>
      <td style="width: 30px;">{{ $n++ }}</td>
      <td> {{$ntibavuga->ntibavuga }} </td>
      <td> {{ $ntibavuga->bavuga}} </td>
    </tr>
    @endif
    @endforeach
  </tbody>
  </table>
  <hr>
  <center>{{ $ntibavugas->links()}}</center>
</div>

@endsection