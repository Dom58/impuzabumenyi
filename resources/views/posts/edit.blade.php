@include('subPages.header.header')
<?php  $titleTag =htmlspecialchars( $post->title); ?>
@section('title', "|  $titleTag " )
<!-- css file -->
<style>
   .col-md-6>.bodyPost>h3>p{
        color: black;
    }
    </style>
<!-- javascript file -->
<script src="/js/tinymce/tinymce.min.js">
    
</script>
  
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
    <body>
 
        @include('subPages.navigation.navigation')
        
  <!--- ................Messages will be displayed in this area  ...below top navigation........................ -->
        
        
        
        <div class="container">
            @include('subPages.notificationMessage.message')

        </div>
            <div class="row">
              <div class="col-md-8 col-md-offset-2" style="background-color: white;);">
        
        <h2>Edit Story</h2> <hr>
                @role('superadmin|admin|editor')    
        {!! Form::model($post, ['route' =>['posts.update', $post ->id],'method' => 'PUT','files'=>true]) !!}
        {{ Form::label('title','Title :') }}
        {{ Form::text('title',null,array('class' =>'form-control','required' =>'','maxlength'=>'100','placeholder'=>'Andika Umutwe wi inkuru')) }}
          
          {{ Form::label('slugs','Slug :',['style'=>'margin-top:20px']) }}
          {{ Form::text('slug',null, array('class' =>'form-control','required' =>'','minlength'=>'5', 'maxlength'=>'255','placeholder'=>'Andika ijambo ryi ibanze kuri iyi nkuru' ))}}

          <!-- {{ Form::label('image','Image :',['style'=>'margin-top:20px']) }}
          {{ Form::file('image', array('class' =>'form-control'))}} -->
          
         {{ Form::label('status','Publish a Post :',['style'=>'margin-top:20px']) }}
        <select name="status" class="form-control" style="background-color: smokewhite; color: brown;" >
           <option value="0" @if( $post->status == 0) selected @endif > Unpublish</option>
           <option value="1" @if( $post->status == 1) selected @endif > Publish</option>
           <option value="2" @if( $post->status == 2) selected @endif > Hacked</option>
        </select>
       
        <br>
          
        {{ Form::label('body',"Create a Story :") }}
        {{Form::textarea('body',null,array('class' =>'form-control')) }}

        
                        <div class="well">
                    <div class="row">
             <div class="col-md-6">
        {{ Form::submit('Save Changes',array('class' =>'btn btn-success btn-lg btn-block','style' =>'margin-top: 20px')) }}  
                        </div>
            
                    {!! Form::close() !!}
              @endrole
              @role('superadmin|admin')
                 {!! Form::open(['route' =>['posts.destroy',$post ->id],'method' =>'DELETE','onsubmit'=>'return ConfirmDelete()' ]) !!}
                        <div class="col-md-4">
                {!! Form::submit('Delete Post',['class' =>'btn btn-danger btn-lg btn-block','style' =>'margin-top: 20px' ]) !!}
                             </div>
                {!! Form::close() !!}
                @endrole
                       
                    </div>
            </div>
                    </div>
            </div>
                    
            @include('subPages.footer.footer')
        
 <!--        navigation y'ibumoso hasi-->
      @include('subPages.javaScript.js')
        @yield('javaScriptFiles')
  <script type="text/javascript">
  
  function ConfirmDelete(){
    return confirm('Are you Sure, Deleting this Post?');
  }
</script>
    </body> 
</html>
