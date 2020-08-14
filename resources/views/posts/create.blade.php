@extends('submain')
@section('title','| Create a Post')

@section('cssFiles')
<style type="text/css">
  /*.col-md-9{
    background-color: white;*/
  }
</style>


@endsection
  @section('informationBody')

      <div class="col-md-8 col-md-offset-2" style="background-color: #eaffed;">
          <h1>Andika inkuru hano</h1>  
        <hr>
       {!! Form::open(array('route' => 'posts.store','data-parseley-validate' =>'','files' => true)) !!}
          
        {{ Form::label('title','Umutwe wi inkuru:') }}
        {{ Form::text('title',null,array('class' =>'form-control','required' =>'','maxlength'=>'100','placeholder'=>'Andika Umutwe wi inkuru')) }}
        <br>
        {{ Form::label('category_id','Ikiciro/Category :') }}
        <select name="category_id" class="form-control">

          @foreach($categories as $category)
          <option value="{{$category->id}}">{{ $category->name}}</option>
          @endforeach

        </select>
          <br>
          {{ Form::label('slugs','Ijambo ryibanze/Slug:') }}
          {{ Form::text('slug',null, array('class' =>'form-control','required' =>'','minlength'=>'5', 'maxlength'=>'255','placeholder'=>'Andika ijambo ryi ibanze kuri iyi nkuru' ))}}
          
          <br>
          <div class="panel-body text-center" style="background-color: white; margin-bottom: 25px;">
                <img class="profile-img " id="uploadedimage" src="" alt="no Image" width="100%" height="50%"  style="border: 3px solid black;">
                <p>
                 {{ Form::label('image', 'Post File ( W250 x H300 )', ['class' => 'form-spacing-top']) }}
                 <p style="color: brown;"><span class="fa fa-warning" style="color:red;"></span> (Attach an image which less or equal to 1Mbyte)</p>
                 {{ Form::file('image', ['id' => 'jimage','class'=>'form-control']) }}
                </p>
                <p>
                    <span id="imageerror" style="font-weight: bold; color: red"></span>
                </p>
          </div>
          <br>
          
          
        {{ Form::label('body',"Andika inkuru:") }}
        {{Form::textarea('body',null,array('class' =>'form-control')) }}
        <div class="col-md-6 col-md-offset-3">
        {{ Form::submit('Ohereza inkuru',array('class' =>'btn btn-primary btn-lg btn-block','style' =>'margin-top: 20px; margin-bottom: 20px;')) }}
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
                     if (e.total > 1000000) {
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