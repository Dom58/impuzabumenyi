
@extends('submain')

@section('title','| Change Staff profile')
@section('cssFiles')
<style type="text/css">
  .profile-img {
    max-width: 257px;
  }
.form-group>label{
  color: white;
  font-size: 16px;
}

</style>
@endsection

@section('informationBody')

      <div class="col-md-12" style="text-align: center;">
        <h3>Edit Staff Profile <b><span class="fa fa-user"></span> {{ $staff->fullname}}</b> </h3>
      </div>
      @role('superadmin')
    <div class="row" >
    <div class="col-md-8 col-md-offset-2"  style="border: 3px solid white; border-radius: 20px; " >
    {!! Form::model($staff, ['route' =>['management.update', $staff ->id],'method' => 'PUT']) !!} 
      <div class="row" >
        <div class="col-md-5">
          <div class="panel panel-default">
            <div class="panel-heading">Edit Staff Picture</div>
              <div class="panel-body text-center">
                <img class="profile-img" id="uploadedimage" src="{{ asset('ndumukristuStaff/'.$staff->file_name)}}" alt="no Image">
                <p>
                  {{ Form::label('image', 'Staff Picture', ['class' => 'form-spacing-top']) }}
                  {{ Form::file('image', ['id' => 'jimage']) }}
                </p>
                <p>
                    <span id="imageerror" style="font-weight: bold; color: red"></span>
                </p>
              </div>
          </div>
        </div>
        <div class="col-md-6" >
       <p style="color: brown; font-weight: bold; font-size: 15px;">   Akamenyetso <b style="color: red; font-size: 20px;">*</b> kerekana ko udashobora kubika izina ryafashwe nabandi,nibyiza urekeyeho iririho!!</p>
          <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
            <label for="fullname">Full Name:</label>
            <p class="control">
              <input type="text" class="form-control" name="fullname" id="name" value="{{$staff->fullname}}">
            </p>
          </div>
          <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
            <label for="department"> Department: </label>
            <p class="control">

              <select name="department_id" class="form-control">
                  @foreach($departments as $department)
                  <option value="{{$department->id}}">{{ $department->name }}</option>
                  @endforeach

              </select>
              
            </p>
          </div>

          <div class="form-group{{ $errors->has('background') ? ' has-error' : '' }}">
           {{ Form::label('background',"Staff background:") }}
           {{Form::textarea('background',null,array('class' =>'form-control')) }}
          </div>

          
        </div> <!-- end of .column -->

        <div class="col-md-9" style="margin-bottom: 20px;">
          <button class="btn btn-success pull-right btn-lg" >Save Changes</button>
          
        <a href="{{url('/theAuthorities/management')}}" class="btn btn-info btn-lg" ><span class="fa fa-arrow-circle-left" style="font-size: 30px;"></span></a>
      </div>
      </div>

        <!-- end of .column -->
      
    {!! Form::close() !!}
  </div>
</div>
@endrole
@endsection


@section('javaScriptFiles')
 <!--  -->


  <!-- Preview of image uploaded -->
  <script>
         $(document).ready(function() {
             document.getElementById("jimage").onchange = function () {
                 var reader = new FileReader();

                 reader.onload = function (e) {
                     if (e.total > 500000) {
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

  <script src="/js/tinymce/tinymce.min.js"> </script>
  
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
@endsection
