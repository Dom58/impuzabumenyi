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
<div class="col-md-8 col-md-offset-2" style="background-image: url('/background/2.png');">
      <h1>Create a Stuff and Depatment</h1>  
        <hr>
       {!! Form::open(array('route' => 'management.store','data-parseley-validate' =>'','files' => true)) !!}
          

          <div class="panel-body text-center">
                <img class="profile-img" id="uploadedimage" src="" alt="no Image" width="200" height="200">
                <p>
                 {{ Form::label('image', 'Photo', ['class' => 'form-spacing-top']) }}
                 <p style="color: brown;"><span class="fa fa-warning" style="color:red;"></span> (Attach an image which less or equal to 700Kb)</p>
                 {{ Form::file('image', ['id' => 'jimage']) }}
                </p>
                <p>
                    <span id="imageerror" style="font-weight: bold; color: red"></span>
                </p>
          </div>
		 

          <br>

        {{ Form::label('fullname','Fullname:') }}
        {{ Form::text('fullname',null,array('class' =>'form-control','required' =>'','placeholder'=>'Enter a Stuff Full Name')) }}

 		<br>
          {{ Form::label('dapartment','Department:') }}
          <select name="department_id" class="form-control">
              @foreach($departments as $department)
              <option value="{{ $department->id}}">{{ $department->name }}</option>
              @endforeach

          </select>
          
          <br>
          
        {{ Form::label('background',"Staff BackGround:") }}
        {{Form::textarea('background',null,array('class' =>'form-control')) }}
        {{ Form::submit('Submit',array('class' =>'btn btn-primary btn-lg btn-block','style' =>'margin-top: 10px; margin-bottom: 20px;' )) }}
        
        {!! Form::close() !!}
      </div>
@endsection

  @section('javaScriptFiles')
<script src="/js/tinymce/tinymce.min.js"> 
</script>
  <script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea",height:200,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
    relative_urls: false,

    style_formats_autohide: true,
   style_formats_merge: true,
   
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>

<!-- Preview of image uploaded -->
  <script>
         $(document).ready(function() {
             document.getElementById("jimage").onchange = function () {
                 var reader = new FileReader();

                 reader.onload = function (e) {
                     if (e.total > 700000) {
                         $('#imageerror').text('Image too large');
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
