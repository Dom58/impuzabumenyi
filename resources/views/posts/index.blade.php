@extends('layouts.blog')

@section('title', '| Manage Posts')

@section('stylesheets')
<script src="/js/tinymce/tinymce.min.js"></script>
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
@endsection
<!-- ++++++++++++++++++++++++++End stylesheet section ++++++++++++++++++++++ -->

  @section('content')

<div class="row">
      <div class="col-md-4">
        <h1>Manage Posts</h1>
      </div>
      <div class="col-md-5" style="margin-top: 22px;">
         <form  action="{{ route('posts.index') }}" method="get" class="form-inline">
      <div class="form-group">
        <input type="text" name="s" value="" class="form-control" value="{{ isset($s) ? $s : ''}}" placeholder="Shakisha Inkuru...">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success"><span class="fa fa-search"></span></button> 
      </div>
    </form>
       </div>
      <div class="col-md-2">
        <a href="{{route('posts.create')}}" class="btn btn-primary btn-h1-spacing"><i class="fa fa-pencil"></i> Create New Post</a>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
    </div>
<!-- +++++++++++++++++++++++++ End of Head ++++++++++++++++++++++++++++++++++++ -->
<div class="row">
      <div class="col-md-12">
        <div class="table">
        <table class="table">  
          <thead>
    <th>#</th>
      <th>Created_by </th>
      <th>Image </th>
      <th> Slug </th>
      <th> Title </th>
      
      <th>Body </th>
      <th> Status </th>
      <th>Created_at</th>
      <th></th>
      <th></th>
      <th></th>
      </thead>

      <tbody>
        <?php $no=1; ?>
        @foreach( $posts as $post )
      <tr>
           <th>{{ $no++ }}</th>
           <td><b style="color: brown;">{{ $post->user->username}} </b>&nbsp; {{ $post->user->email }}</td>
          
           <td><img src=" /postsImage/{{ $post ->file_name }} "  width="150" height="100"> </td>
           <td>{{ $post ->slug }} </td>
           <td>{{ $post ->title }} </td>
           <td>{{ substr(strip_tags($post ->body),0,100) }} {{strlen(strip_tags($post ->body)) >100 ? "..." : "" }} 
           </td>
           @role('superadmin|admin|editor')
<td>
      @if( $post ->status == 0) 
        <button class="btn btn-warning btn-sm">Unpublished</button>

            @elseif ($post ->status == 1 )
             <button  class="btn btn-primary btn-sm">published</button>

            @else 
        <button class="btn btn-danger btn-sm"> hacked</button>
            @endif
</td> 
@endrole
          <td>{{ $post ->created_at }} <br><br><b>{{ $post ->created_at ->diffForHumans() }} </b>
          </td>
<td> 
  <a href="{{ url('posts',$post->slug) }}" class="btn btn-primary"> <span class="fa fa-eye"></span></a>
   @role('superadmin|admin|editor')
  <a href="{{route('posts.edit' ,$post ->id )}}" class="btn btn-success" style="margin-top: 5px;"> <span class="fa fa-edit"></span></a> 
</td>
@endrole
  
        </tr>
          @endforeach
      </tbody>
    </table>
    <div class="text-center">
    {{ $posts ->appends(['s' => $s]) ->links() }}
     </div>
  </div>
</div>
</div>
         @endsection
