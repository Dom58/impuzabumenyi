@extends('submain')

@section('title','| Create an Image Gallery')

@section('cssFiles')
<style type="text/css">
  .col-md-8
      {
    background-color: #c1fffe;
    border: 3px solid black;
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
      <h2 style="text-align: center;">Add an Image Gallery</h2>  
        <hr>
       {!! Form::open(array('route' => 'gallery.store','data-parseley-validate' =>'','files' => true)) !!}
          
          <div class="panel-body text-center" style="background-color: white; margin-bottom: 25px;">
                <img class="profile-img " id="uploadedimage" src="" alt="no Image" width="100%" height="50%"  style="border: 3px solid black;">
                <p>
                 {{ Form::label('image', 'Gallery Picture', ['class' => 'form-spacing-top']) }}
                 <p style="color: brown;"><span class="fa fa-warning" style="color:red;"></span> (Attach an image which less or equal to 1.5Mbs)</p>
                 {{ Form::file('image', ['id' => 'jimage','class'=>'form-control']) }}
                </p>
                <p>
                    <span id="imageerror" style="font-weight: bold; color: red"></span>
                </p>
          </div>

        {{ Form::label('title','Title or Name of this picture:') }}
        {{ Form::text('title',null,array('class' =>'form-control','maxlength'=>'27','placeholder'=>' Enter a name or title of This Picture...(N.B: Not more than 27 characters)')) }}
          <br>
           {{ Form::label('category','Select an Image Category:') }}
          <select name="category_id" class="form-control" required>
            <option value="">Choose your image Category...</option>
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{ $category->name}}</option>
          @endforeach
        </select>
          <br>
        {{ Form::label('description',"Image Description:") }}
        {{Form::textarea('description',null,array('class' =>'form-control','rows'=>'5','cols'=>'40','maxlength'=>'400')) }}
        <div class="col-md-6 col-md-offset-3">
        {{ Form::submit('Save Image',array('class' =>'btn btn-primary btn-lg btn-block','style' =>'margin-top: 10px; margin-bottom: 20px;','maxlength'=>'100' )) }}
        </div>
        {!! Form::close() !!}
      </div>
@endsection

  @section('javaScriptFiles')
<script>
         $(document).ready(function() {
             document.getElementById("jimage").onchange = function () {
                 var reader = new FileReader();

                 reader.onload = function (e) {
                     if (e.total > 1500000) {
                         $('#imageerror').text('File is too large');
                         $jimage = $("#jimage");
                         $jimage.val("");
                         $jimage.wrap('<form>').closest('form').get(0).reset();
                         $jimage.unwrap();
                         $('#uploadedimage').removeAttr('src');
                         return;
                     }
                     $('#imageerror').text('');
                     document.getElementById("uploadedimage").src = e.target.result;
                 };
                 reader.readAsDataURL(this.files[0]);
             };
         });
  </script>
@endsection
