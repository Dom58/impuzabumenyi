@extends('submain')

@section('title','| Create Ntibavuga|Bavuga')

@section('cssFiles')
<style type="text/css">
  .col-md-10{
    background-color: white;
  }
</style>

@endsection

@section('informationBody')
<div class="col-md-10 col-md-offset-1" style="">
      <h2 style="text-align: center; ">Andika Ntibavuga bavuga</h2>  
        <hr>
       {!! Form::open(array('route' => 'ntibavuga.store','data-parseley-validate' =>'','files' => true)) !!}
          
          {{ Form::label('ntibavugacategory_id','Hitamo Ikiciro cya Ntibavuga Bavuga:') }}
          <select name="ntibavugacategory_id" class="form-control" style="background-color: #afd0a4; margin-bottom: 20px; font-weight: bold;" required>
            <option value="">   Hitamo ikiciro...</option>
            @foreach($categories as $category)
            <option value=" {{$category->id}} "> {{ $category->name}} </option>
            @endforeach
          </select>

         {{ Form::label('ntibavuga',"Ntibavuga:") }}
        {{Form::text('ntibavuga',null,array('class' =>'form-control','style' =>'margin-bottom: 25px;','placeholder'=>'Andika aha Ntibavuga...')) }}

        {{ Form::label('bavuga',"Bavuga:") }}
        {{Form::text('bavuga',null,array('class' =>'form-control','style' =>'margin-bottom: 25px;','placeholder'=>'Andika aha Bavuga...')) }}

        {{ Form::label('igisobanuro',"Igisobanuro:") }}
        {{Form::textarea('igisobanuro',null,array('class' =>'form-control','cols'=>'40','rows'=>'5')) }}

        <div class="col-md-4 col-md-offset-4"> 
        {{ Form::submit('OHEREZA',array('class' =>'btn btn-primary btn-lg btn-block','style' =>'margin-top: 20px; margin-bottom: 25px;' )) }}
        </div>
        {!! Form::close() !!}
      </div>
@endsection

  @section('javaScriptFiles')
<!-- <script src="/js/tinymce/tinymce.min.js"> </script> -->
@endsection
