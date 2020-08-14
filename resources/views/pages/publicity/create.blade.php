@extends('submain')

@section('title','| Create a Saint')

@section('cssFiles')
<style type="text/css">
  .col-md-10{
    background-color: white;
  }
</style>

@endsection

@section('informationBody')
<div class="col-md-10 col-md-offset-1" style="background-image: url('/background/2.png');">
      <h2 style="text-align: center; ">Post a Publicity</h2>  
        <hr>
       {!! Form::open(array('route' => 'pubs.store','data-parseley-validate' =>'','files' => true)) !!}
          
        <div class="panel-body text-center" style="background-color: white; margin-bottom: 25px;">
                <img class="profile-img " id="uploadedimage" src="" alt="no Image" width="100%" height="50%"  style="border: 3px solid black;">
                <p>
                 {{ Form::label('image', 'Publicity File', ['class' => 'form-spacing-top']) }}
                 <p style="color: brown;"><span class="fa fa-warning" style="color:red;"></span> (Attach an file which less or equal to 10Mb)</p>
                 {{ Form::file('image', ['id' => 'jimage','class'=>'form-control']) }}
                </p>
                <p>
                    <span id="imageerror" style="font-weight: bold; color: red"></span>
                </p>
          </div>
          
          {{ Form::label('orientation','Select the Orientation :') }}

          <select name="side" class="form-control" style="background-color: #efcfcf; margin-bottom: 20px;" required>
            <option value=" ">   Choose a publicity side...</option>
          	<option value="1">   Top Side</option>
          	<option value="2">   Right Side </option>
          	<option value="3">   Bottom Side</option>
          	<option value="5">   Center Side</option>
          </select>

         {{ Form::label('pub_link',"Publicity link:") }}
        {{Form::url('pub_link',null,array('class' =>'form-control','style' =>'margin-bottom: 25px;','placeholder'=>'Type a link if any, E.g: https://wwww.example.com')) }}


        {{ Form::label('description',"Description:") }}
        {{Form::textarea('description',null,array('class' =>'form-control')) }}

        <div class="col-md-6 col-md-offset-3"> 
        {{ Form::submit('Ohereza',array('class' =>'btn btn-primary btn-lg btn-block','style' =>'margin-top: 20px; margin-bottom: 25px;' )) }}
        </div>
        {!! Form::close() !!}
      </div>
@endsection

  @section('javaScriptFiles')
<script src="/js/tinymce/tinymce.min.js"> 
</script>
  <script>  
      tinymce.init({
    selector: "textarea",theme: "modern",height: 300,
   
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   //this give the ability to attach a caption to image or video
   image_caption: true,
   image_advtab: true ,

//visual block will give yoy the power to distinct between different tags
   visualblocks_default_state: true,

// if there is any style (predifined or or user_defined) is repeating this with hide or merge the repeating ones
   style_formats_autohide: true,
   style_formats_merge: true,
 });
</script>

<!-- Preview of image uploaded -->
  <script>
         $(document).ready(function() {
             document.getElementById("jimage").onchange = function () {
                 var reader = new FileReader();

                 reader.onload = function (e) {
                     if (e.total > 10000000) {
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
