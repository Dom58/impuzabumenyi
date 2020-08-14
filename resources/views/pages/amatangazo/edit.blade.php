@extends('submain')

@section('title','| Edit Announcement')

@section('cssFiles')
<style type="text/css">
  .col-md-8{
    background-color: white;
  }
</style>

@endsection

@section('informationBody')
<div class="col-md-8 col-md-offset-2">
        
        <h2>Edit News</h2> <hr>
     @role('superadmin|admin|editor')
        {!! Form::model($itangazo, ['route' =>['news.update', $itangazo ->id],'method' => 'PUT']) !!}

	{{ Form::label('news_type','Announcement Type:') }}
       <select name="news_type" class="form-control" style="background-color: #efcfcf; margin-bottom: 20px;">
          	<option value="1" @if( $itangazo->news_type == 1) selected @endif >   Amatangazo muri za Paruwase Zitandukanye</option>
          	<option value="2" @if( $itangazo->news_type == 2) selected @endif >   Amatangazo Rusange </option>
          	<option value="3"  @if( $itangazo->news_type == 3) selected @endif >   Amatangazo Amenyesha</option>
          	<option value="4" @if( $itangazo->news_type == 4) selected @endif >   Emergency news</option>
          </select>
           <br>

            {{ Form::label('parish','Parish / Organisation this News Belongs:') }}
        {{ Form::text('parish',null,array('class' =>'form-control','manlength'=>'255','placeholder'=>'Edit Parish if any....')) }}
          
           <br>
          

        {{ Form::label('pub_link','Announcement Link:') }}
        {{ Form::url('pub_link',null,array('class' =>'form-control','manlength'=>'255','placeholder'=>'Edit the link....')) }}
          
           <br>

          

          <label>Publish a News :</label>
        <select name="status" class="form-control" style="background-color: smokewhite; color: brown;" >
          <option value="0" @if( $itangazo->status == 0) selected @endif > Unpublish</option>
           <option value="1" @if( $itangazo->status == 1) selected @endif > Publish</option>
           <option value="2" @if( $itangazo->status == 2) selected @endif > Hacked</option>
        </select>
       
        <br>
          
          
          
        {{ Form::label('description','News Description:') }}
        {{Form::textarea('description',null,array('class' =>'form-control')) }}
                        <div class="well">
                    <div class="row">
             <div class="col-md-6">
        {{ Form::submit('Save Changes',array('class' =>'btn btn-success btn-lg btn-block','style' =>'margin-top: 20px')) }}  
                        </div>
      {!! Form::close() !!}
             @endrole       
          
           @role('superadmin|admin')
                 {!! Form::open(['route' =>['pubs.destroy',$itangazo ->id],'method' =>'DELETE','onsubmit'=>'return ConfirmDelete()']) !!}
                        <div class="col-md-6">
                {!! Form::submit('Delete News',['class' =>'btn btn-danger btn-lg btn-block','style' =>'margin-top: 20px' ]) !!}
                             </div>
                {!! Form::close() !!}
            @endrole
                    </div>
            </div>
                    </div>

@endsection
  @section('javaScriptFiles') 

  <script src="/js/tinymce/tinymce.min.js"> </script>
  
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea",height:300,
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   
    relative_urls: false,

    style_formats_autohide: true,
   style_formats_merge: true,
   
  };

  tinymce.init(editor_config);
</script>
</script>

<script type="text/javascript">
  
  function ConfirmDelete(){
    return confirm('Are you Sure, Deleting this News?');
  }
</script>
  @endsection
