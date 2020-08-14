@extends('submain')

@section('title','| Andika Umugani Mugufi')

@section('cssFiles')
<style type="text/css">
  .col-md-8
      {
    background-color: #c1fffe;
    border: 3px solid black;
    border-radius: 15px;
      }

  label{
    font-size: 16px;
  }

</style>

@endsection

@section('informationBody')
<div class="col-md-8 col-md-offset-1" style="background-color: #eaffe6;">
      <h2 style="text-align: center;">Andika umugani Mugufi</h2>  
        <div class="line"></div>
       {!! Form::open(array('route' => 'imigani_migufi.store','data-parseley-validate' =>'','files' => true)) !!}

        <label>Izina ry'umugani</label>
        {{ Form::text('name',null,array('class' =>'form-control','placeholder'=>'Izina ry,umugani...')) }}
        <br>

        {{ Form::label('igisobanuro',"Igisonanuro cyuyu mugani:") }}
        {{Form::textarea('igisobanuro',null,array('class' =>'form-control','placeholder'=>'Sobanura uyu mugani aha...')) }}
        <div class="col-md-6 col-md-offset-3">
        {{ Form::submit('Bika Umugani',array('class' =>'btn btn-primary btn-lg btn-block','style' =>'margin-top: 10px; margin-bottom: 20px;')) }}
        </div>
        {!! Form::close() !!}
      </div>
@endsection

  @section('javaScriptFiles')
<script src="/js/tinymce/tinymce.min.js">
</script>
<!--{{--  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>  --}}-->
  <script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code |caption",
   image_caption: true,
   video_caption: true,
   image_advtab: true ,
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
