@extends('submain')

@section('title','| Create an announcement')

@section('cssFiles')
<style type="text/css">
  .col-md-8{
    background-color: white;
  }
</style>

@endsection

@section('informationBody')
<div class="col-md-8 col-md-offset-2" style="border-radius:10px;">
      <h2 style="text-align: center; ">Create an announcement</h2>  
        <hr>
       {!! Form::open(array('route' => 'news.store','data-parseley-validate' =>'','files' => true)) !!}
          
          {{ Form::label('news_type','Select an announcement type :') }}

          <select name="news_type" class="form-control" style="background-color: #efcfcf; margin-bottom: 20px;">
             <option value="">   Hitamo ikiciro cy'itangazo....</option>
          	<option value="1">   Amatangazo Rusange </option>
          	<option value="2">   Amatangazo Amenyesha</option>
          	<option value="3">   Emergency news</option>
          </select>

          {{ Form::label('organisation',"Organisation:") }}
        {{Form::text('organisation',null,array('class' =>'form-control','style' =>'margin-bottom: 25px;','placeholder'=>'An organisation belongs to this announcement')) }}


         {{ Form::label('pub_link',"Announcement link:") }}
        {{Form::url('pub_link',null,array('class' =>'form-control','style' =>'margin-bottom: 25px;','placeholder'=>'Type a link if any, E.g: https://wwww.example.com')) }}


        {{ Form::label('description',"Announcement Description:") }}
        {{Form::textarea('description',null,array('class' =>'form-control')) }}

        <div class="col-md-6 col-md-offset-3"> 
        {{ Form::submit('Submit',array('class' =>'btn btn-primary btn-lg btn-block','style' =>'margin-top: 20px; margin-bottom: 25px;' )) }}
        </div>
        {!! Form::close() !!}
      </div>
@endsection

  @section('javaScriptFiles')
<script src="/js/tinymce/tinymce.min.js"> 
</script>
  <script>  
      tinymce.init({
    selector: "textarea",theme: "modern",height: 300,
   
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   //this give the ability to attach a caption to image or video
   image_caption: true,
   image_advtab: true ,

//visual block will give yoy the power to distinct between different tags
   visualblocks_default_state: true,

// if there is any style (predifined or or user_defined) is repeating this with hide or merge the repeating ones
   style_formats_autohide: true,
   style_formats_merge: true,
 });
</script>

<!-- Preview of image uploaded -->
  
@endsection
