@extends('mainPage')
      
  @section('title','| contact')

@section('cssFiles')
<style>
 .col-md-8{
  background-color: #d0e8db;
  border-radius: 20px;

 }
input[type="number"]{
  /*width: 200px;*/
  border-radius: 50px;
}
              input:invalid+span:after{
                content: 'invalid Number';
                padding-left: 5px;
                font-weight: bold;
                color:red;
}
input:valid+span:after{
  content: '';
  padding-left: 5px;
  color:green;
}

  </style>
  <!-- ++++++++++++++++++++++++Form Validation ++++++++++ -->

@endsection
  @section('informationBody')

      <div class="col-md-8 col-md-offset-2">
    <center><h2>Tanga Igitekerezo </h2>  </center>
        
       {!! Form::open(array('route' => 'mycontact.store','data-parseley-validate' =>'','id'=>'myform','files' => true)) !!}
        {{ Form::label('name','Amazina Yawe:') }}
        {{ Form::text('name',null,array('class' =>'form-control','placeholder' =>'Andika Amazina yawe ','max'=>'30')) }}
           <br>
          {{ Form::label('email','Imeli yawe:') }}
          {{ Form::email('email',null,array('class' =>'form-control','placeholder' =>'Andika Imeli yawe aha... ')) }}
           <br>
           <div class="row">
             <div class="col-md-12">
                {{ Form::label('tel','Nimero za telefone Yawe:') }}
              {{ Form::number('tel',null, array('class' =>'form-control','min'=>'10','maxlength'=>'13','placeholder' =>'Andika numero ya telephone Urugero:0780822222 cg +250780822222' ))}}
              <span class="validity"></span>
             </div>
           </div>
         
           <br>
          {{ Form::label('sms','Andika ubutumwa bwawe, Igitekerezo :') }}
        {{Form::textarea('sms',null,array('class' =>'form-control','maxlength'=>'300','placeholder' =>'Andika ubutumwa aha (Ubutumwa ntiburenga inyuguti 300)....')) }}
        <div class="col-md-6 col-md-offset-3">
        {{ Form::submit('Ohereza Ubutumwa',array('class' =>'btn btn-primary btn-lg btn-block','style' =>'margin-top: 20px; margin-bottom:20px;')) }}
        </div>
        {!! Form::close() !!} 
            
     </div>
         @endsection

         @section('javaScriptFiles')
         
         @endsection


     
  