@extends('submain')

@section('title','| Result Found')

@section('cssFiles')
  <style type="text/css">
    body
    {
  background-image: url('/background/2.png');
      }
      .btn-primary{
    background-color: #175f1c;
    transition: 2s;
  }
  </style>
@endsection

@section('leftTwocolomn') 
        <div class="col-md-8" style="background-color: white; border: 3px solid #0c2105; margin-bottom: 30px;">
          <center>
            <h3 style="color: black; ">Ikiciro washakishaga:
        <b style="background-color: #f5f59c;">
            	@if($ntibavuga_search ==1)
            	Inka
            	@elseif($ntibavuga_search ==2)
            	Igisabo
            	@elseif($ntibavuga_search ==3)
            	Amata
            	@elseif($ntibavuga_search ==4)
            	Ingobyi
            	@elseif($ntibavuga_search ==5)
            	Isekuru
            	@elseif($ntibavuga_search ==6)
            	Umwami
            	@else
            	Ibindi birenzeho
            	@endif
            </h3>
        </b>
            <h3 style="color: black; font-weight: bold; ">Igisubizo Kibashije Kuboneka</h3>
          </center>
          <hr>
          <table class="table">
    <center><h3><b style="color: brown;">
            	@if($ntibavuga_search ==1)
            	Inka
            	@elseif($ntibavuga_search ==2)
            	Igisabo
            	@elseif($ntibavuga_search ==3)
            	Amata
            	@elseif($ntibavuga_search ==4)
            	Ingobyi
            	@elseif($ntibavuga_search ==5)
            	Isekuru
            	@elseif($ntibavuga_search ==6)
            	Umwami
            	@else
            	Ibindi birenzeho
            	@endif
            </h3>
        </b> </h3></center>
    <tr>
    <th>#</th>
    <th>Ntibavuga</th>
    <th>Bavuga</th>
  </tr>
  <tbody>
    <?php $n=1; ?>
    @foreach($ntibavuga_searches as $ntibavuga)
    <tr>
      <td style="width: 30px;">{{ $n++ }}</td>
      <td> {{$ntibavuga->ntibavuga }} </td>
      <td> {{ $ntibavuga->bavuga}} </td>
    </tr>
    @endforeach
  </tbody>
  </table>
      </div>   
@endsection

@section('informationBody')
<div class="col-md-3" style="background-color: whitesmoke; margin-left:10px; border-radius: 10px; box-shadow: 5px 10px gray;">
 <form action="{{ url('/ntibavuga/bavuga/seachResult')}}" method="get" style="margin-top: 10px;">
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

