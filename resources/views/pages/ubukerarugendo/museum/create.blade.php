@extends('submain')

@section('title','| Insert Rwandan Museum')

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
      <h2 style="text-align: center;">Dusangize ifoto y'inzu ndangamurage</h2>  
        <hr>
       {!! Form::open(array('route' => 'museums.store','data-parseley-validate' =>'','files' => true)) !!}
          
          <div class="panel-body text-center" style="background-color: white; margin-bottom: 25px;">
                <img class="profile-img " id="uploadedimage" src="" alt="no Image" width="100%" height="50%"  style="border: 3px solid black;">
                <p>
                 {{ Form::label('image', 'Ifoto', ['class' => 'form-spacing-top']) }}
                 <p style="color: brown;"><span class="fa fa-warning" style="color:red;"></span> (Ongeraho ifoto,ntirenga 2Mbs)</p>
                 {{ Form::file('image', ['id' => 'jimage','class'=>'form-control']) }}
                </p>
                <p>
                    <span id="imageerror" style="font-weight: bold; color: red"></span>
                </p>
          </div>

        <label>Izina ry'inzu ndangamurage</label>
        {{ Form::text('name',null,array('class' =>'form-control','maxlength'=>'50','placeholder'=>'Andika izina rya parike...')) }}
        <br>
        <label>Andika Interuro nto kuri iyi nzu ndangamurage(Slug)</label>
        {{ Form::text('slug',null,array('class' =>'form-control','maxlength'=>'100','placeholder'=>'Andika interuro nto kuri uyi nzu...','title'=>'Andika aha interuro nto kuri uyi nzu ndangamurage, ntamwanya wemerewe  gusigara hagati y,ijambo nirindi,wusimbuze (-).','data-placement'=>'top','data-toggle'=>'tooltip','id'=>'slug')) }}
          <br>
        {{ Form::label('description',"Andika byinshi kuri iyi nzu:") }}
        {{Form::textarea('description',null,array('class' =>'form-control','title'=>'Andika aha amateka,amakuru arambuye kuri iyi nzu ndangamurage','data-placement'=>'top','data-toggle'=>'tooltip','id'=>'description','placeholder'=>'Andika aha ibijyanye niyi nzu ndangamurage...')) }}
        <div class="col-md-6 col-md-offset-3">
        {{ Form::submit('Bika Umurage',array('class' =>'btn btn-primary btn-lg btn-block','style' =>'margin-top: 10px; margin-bottom: 20px;')) }}
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
  <script type="text/javascript">
  
  // Hover only display a title
  $(document).ready(function(){
    $('#slug').tooltip();
    $('#description').tooltip();
  });

</script>
@endsection
