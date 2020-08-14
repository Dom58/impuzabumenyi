@extends('submain')

@section('title','| Edit Publicity')

@section('cssFiles')
<style type="text/css">
  .col-md-10{
    background-color: white;
  }
</style>

@endsection

@section('informationBody')
<div class="col-md-8 col-md-offset-2">
        @role('superadmin|admin')
        <h2>Hindura Inkuru</h2>
        <hr>           
        {!! Form::model($pub, ['route' =>['pubs.update', $pub ->id],'method' => 'PUT']) !!}

        {{ Form::label('pub_link','Link:') }}
        {{ Form::url('pub_link',null,array('class' =>'form-control','required' =>'','manlength'=>'255','placeholder'=>'Edit the link....')) }}
          
           <br>
          

          <label>Publish a Publicity :</label>
        <select name="status" class="form-control" style="background-color: smokewhite; color: brown;" >
          <option value="0" @if( $pub->status == 0) selected @endif > Unpublish</option>
           <option value="1" @if( $pub->status == 1) selected @endif > Publish</option>
           <option value="2" @if( $pub->status == 2) selected @endif > Hacked</option>
        </select>
       
        <br>
          
        {{ Form::label('description','Publicity Description:') }}
        {{Form::textarea('description',null,array('class' =>'form-control')) }}
                        <div class="well">
                    <div class="row">
             <div class="col-md-6">
        {{ Form::submit('Save Changes',array('class' =>'btn btn-success btn-lg btn-block','style' =>'margin-top: 20px')) }}  
                        </div>
      {!! Form::close() !!}
          @endrole          
            @role('superadmin|admin')
                 {!! Form::open(['route' =>['pubs.destroy',$pub ->id],'method' =>'DELETE','onsubmit'=>'return ConfirmDelete()']) !!}
                        <div class="col-md-6">
                {!! Form::submit('Delete Publicity',['class' =>'btn btn-danger btn-lg btn-block','style' =>'margin-top: 20px' ]) !!}
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

<script type="text/javascript">
  
  function ConfirmDelete(){
    return confirm('Are you Sure, Deleting this Publicity?');
  }
</script>

  @endsection
