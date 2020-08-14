@extends('submain')

@section('title','| Edit Animal')

@section('cssFiles')
<style type="text/css">
  .col-md-8{
    background-color: white;
  }
</style>

@endsection

@section('informationBody')
<div class="col-md-8 col-md-offset-2">
        
        <h2>Edit <b>"{{ $animal->name}}"</b> Animal </h2> 
        <div class="line"></div>
     @role('superadmin|admin|editor')
        {!! Form::model($animal, ['route' =>['animal.update', $animal ->id],'method' => 'PUT','files' => true]) !!}

        <div class="panel panel-default">
            <div class="panel-heading">Image</div>
              <div class="panel-body text-center">
                <img class="img-responsive" id="uploadedimage" src="{{ asset('ibidukikije_Animal/'.$animal->file_name)}}" alt="no Image">
                <p>
                  {{ Form::label('image', 'Animal Image:', ['class' => 'form-spacing-top']) }}
                  {{ Form::file('image', ['id' => 'jimage']) }}
                </p>
                <p>
                    <span id="imageerror" style="font-weight: bold; color: red"></span>
                </p>
              </div>
          </div>

	{{ Form::label('name','Animal name:') }}
        {{ Form::text('name',null,array('class' =>'form-control','maxlength'=>'255','placeholder'=>'Edit Parish if any....')) }}
<br>
	{{ Form::label('name','Animal cateory:') }}
       <select name="animalcategory_id" class="form-control" style="background-color:#bcdeb4;">
       	@foreach($categories as $category)
       	<option value="{{ $category->id}}" @if( $animal->animalcategory_id == $category->id ) selected @endif>{{ $category->name}}</option>
       	@endforeach
          </select>
           <br>

            {{ Form::label('slug','Slug:') }}
        {{ Form::text('slug',null,array('class' =>'form-control','maxlength'=>'255','placeholder'=>'Edit Parish if any....')) }}
          
           <br>
          <label>Publish an Animal :</label>
        <select name="status" class="form-control" style="background-color: smokewhite; color: brown;" >
          <option value="0" @if( $animal->status == 0) selected @endif > Unpublish</option>
           <option value="1" @if( $animal->status == 1) selected @endif > Publish</option>
           <option value="2" @if( $animal->status == 2) selected @endif > Hacked</option>
        </select>
       
        <br>
      
        {{ Form::label('description','Animal Description:') }}
        {{Form::textarea('description',null,array('class' =>'form-control')) }}
                        <div class="well">
                    <div class="row">
             <div class="col-md-6">
        {{ Form::submit('Save Changes',array('class' =>'btn btn-success btn-lg btn-block','style' =>'margin-top: 20px')) }}  
                        </div>
      {!! Form::close() !!}
             @endrole   

             @role('superadmin|admin')
                 {!! Form::open(['route' =>['animal.destroy',$animal ->id],'method' =>'DELETE','onsubmit'=>'return Confirmhide()']) !!}
                        <div class="col-md-4">
                {!! Form::submit('Trash/Hide Animal',['class' =>'btn btn-warning btn-lg btn-block','style' =>'margin-top: 20px' ]) !!}
                             </div>
                {!! Form::close() !!}
            @endrole    
          
           <!-- @role('superadmin|admin')
                 {!! Form::open(['route' =>['animal.destroy',$animal ->id],'method' =>'DELETE','onsubmit'=>'return ConfirmDelete()']) !!}
                        <div class="col-md-4">
                {!! Form::submit('Delete Animal',['class' =>'btn btn-danger btn-lg btn-block','style' =>'margin-top: 20px' ]) !!}
                             </div>
                {!! Form::close() !!}
            @endrole -->

                    </div>
            </div>
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

<script type="text/javascript">
  function ConfirmDelete(){
    return confirm('Are you Sure, Deleting this Animal?');
  }
</script>
<script type="text/javascript">
  function Confirmhide(){
    return confirm('Are you Sure, To hide this Animal?');
  }
</script>
  @endsection
