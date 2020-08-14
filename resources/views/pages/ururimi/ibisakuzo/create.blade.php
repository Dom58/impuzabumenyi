@extends('submain')

@section('title','| Andika Ibisakuzo')

@section('cssFiles')
<style type="text/css">
  .col-md-8
      {
    background-color: #c1fffe;
    border: 3px solid gray;
    border-radius: 15px;
      }
  input[type=file] 
  {
   background-color:#ecffff; 
  }
  label{
    font-size: 16px;
  }

</style>

@endsection

@section('informationBody')
<div class="col-md-8 col-md-offset-1">
      <h2 style="text-align: center;">Andika igisakuzo nuko kicwa </h2>  
        <hr>
       {!! Form::open(array('route' => 'ibisakuzo.store','data-parseley-validate' =>'','files' => true)) !!}

        <label>Sakwe Sakwe</label>
        {{ Form::text('name',null,array('class' =>'form-control','placeholder'=>'Izina ry,igisakuzo...')) }}
        <br>
        <label>Andika Interuro nto kuri iki gisakuzo</label>
        {{ Form::text('slug',null,array('class' =>'form-control','maxlength'=>'100','placeholder'=>'Andika interuro nto kuri iki gisakuzo...(Buri gisakuzo ntikigomba guhuza iyo nteruro cg iryo jambo)','title'=>'Andika aha interuro nto cyangwa ijambo kuri iki gisakuzo, ntamwanya wemerewe  gusigara hagati y,ijambo nirindi,wusimbuze (-).','data-placement'=>'top','data-toggle'=>'tooltip','id'=>'slug')) }}
          <br>
        {{ Form::label('kice',"Uko igisakuzo kicwa:") }}
        {{Form::text('kice',null,array('class' =>'form-control','title'=>'Andika aha uko igisakuzo kicwa...','data-placement'=>'top','data-toggle'=>'tooltip','id'=>'description','placeholder'=>'Andika aha...')) }}
        <div class="col-md-6 col-md-offset-3">
        {{ Form::submit('Ohereza',array('class' =>'btn btn-primary btn-lg btn-block','style' =>'margin-top: 10px; margin-bottom: 20px;')) }}
        </div>
        {!! Form::close() !!}
      </div>
@endsection

  @section('javaScriptFiles')
  
  <script type="text/javascript">
  
  // Hover only display a title
  $(document).ready(function(){
    $('#slug').tooltip();
    $('#description').tooltip();
  });

</script>
@endsection
