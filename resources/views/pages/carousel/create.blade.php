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

      <div class="col-md-8 col-md-offset-2" style="background-color: white; border-radius: 20px;">
          <h1>Create a Carousel Pictures</h1>  
        <hr>
       {!! Form::open(array('route' => 'carousels.store','data-parseley-validate' =>'','files' => true)) !!}
       
          {{ Form::label('slugs','Photo description:') }}
          {{ Form::text('body',null, array('class' =>'form-control','required' =>'', 'maxlength'=>'191','placeholder'=>'Type a Carousel photo description...' ))}}

          {{ Form::label('position','Active or Carousel Picture Sliding:',array('style' =>'margin-top: 20px; ')) }}
          <select class="form-control" name="position" required="true" style="background-color: #dcffeb;">
            <option value="">Select a Position....</option>
            <option value="active">Active Image</option>
            <option value="slide">Sliding Image Exchange</option>
          </select>

          <div class="panel-body text-center" style="background-color: white; margin-bottom: 25px;">
                <img class="profile-img " id="uploadedimage" src="" alt="no Image" width="100%" height="50%"  style="border: 3px solid black;">
                <p>
                 {{ Form::label('image', 'Carousel File ( W800 x H500 )', ['class' => 'form-spacing-top']) }}
                 <p style="color: brown;"><span class="fa fa-warning" style="color:red;"></span> (Attach an image which less or equal to 1Mbyte)</p>
                 {{ Form::file('image', ['id' => 'jimage','class'=>'form-control']) }}
                </p>
                <p>
                    <span id="imageerror" style="font-weight: bold; color: red"></span>
                </p>
          </div>
        <div class="col-md-6 col-md-offset-3">
        {{ Form::submit('Save',array('class' =>'btn btn-primary btn-lg btn-block','style' =>'margin-top: 20px; margin-bottom: 20px;')) }}
        </div>
        {!! Form::close() !!}
           </div>
         @endsection

         @section('javaScriptFiles')
           <script>
         $(document).ready(function() {
             document.getElementById("jimage").onchange = function () {
                 var reader = new FileReader();

                 reader.onload = function (e) {
                     if (e.total > 2000000) {
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