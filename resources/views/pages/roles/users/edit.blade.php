
@extends('submain')

@section('title','| Change profile')
@section('cssFiles')
<style type="text/css">
  .profile-img {
    max-width: 257px;
  }
.form-group>label{
/*  color: white;*/
  font-size: 16px;
}

</style>
@endsection

@section('informationBody')

      <div class="col-md-12" style="text-align: center;">
        <h3>Edit <b> {{ $user->name}} {{ $user->sname}}</b> Profile.</h3>
      </div>
    <div class="row" >
    <div class="col-md-8 col-md-offset-2"  style="border: 3px solid white; border-radius: 20px; " >
    <form action="{{route('userProfile.update', $user)}}" method="POST" enctype="multipart/form-data" file= true style="margin-top: 15px;" >
      {{ csrf_field() }}
      {{ method_field('patch')}}
      
      <div class="row" >
        <div class="col-md-5">
          <div class="panel panel-default">
            <div class="panel-heading">Edit Your Picture</div>
              <div class="panel-body text-center">
                <img class="profile-img" id="uploadedimage" src="{{ asset('userProfileImage/'.$user->profile_image)}}" alt="no Image">
                <p>
                  {{ Form::label('profile_image', 'Your Picture', ['class' => 'form-spacing-top']) }}
                  {{ Form::file('profile_image', ['id' => 'jimage']) }}
                </p>
                <p>
                    <span id="imageerror" style="font-weight: bold; color: red"></span>
                </p>
              </div>
          </div>
        </div>
        <div class="col-md-6" >
       <p style="color: brown; font-weight: bold; font-size: 15px;">   This sign <b style="color: red; font-size: 20px;">*</b> show that you can't change the text inside the field, because the name has already taken and reserved to you!</p>
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Full Name:</label>
            <p class="control">
              <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
            </p>
          </div>
          <div class="form-group{{ $errors->has('sname') ? ' has-error' : '' }}">
            <label for="sname">Second Name:</label>
            <p class="control">
              <input type="text" class="form-control" name="sname" id="sname" value="{{$user->sname}}">
            </p>
          </div>

          <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="username">Username: <b style="color: red;font-size: 20px; ">*</b></label>
            <p class="control">
              <input type="text" class="form-control" name="username" id="username" value="{{ $user->username }}" readonly>
            </p>
          </div>

          <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
            <label for="tel">Telephone:</label>
            <p class="control">
              <input type="number" class="form-control" name="tel" id="tel" value="{{ $user->tel}}">
            </p>
          </div>

          <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
            <label for="district">Living District:</label>
            <p class="control">
              <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
              
              <input type="text" class="form-control" name="district" id="district" value="{{$user->district}}" >
          </div>
            </p>
          </div>
          
          <div class="form-group{{ $errors->has('sector') ? ' has-error' : '' }}">
            <label for="sector">Living Sector:</label>
            <p class="control">
              <div class="form-group{{ $errors->has('sector') ? ' has-error' : '' }}">
              
              <input type="text" class="form-control" name="sector" id="sector" value="{{$user->sector}}" >
          </div>
            </p>
          </div>

          <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
            <label for="gender">Gender: </label>
            <select name="gender" id="gender" class="form-control">
              <option value="1" @if( $user->gender ==1) selected @endif >Male</option>
              <option value="0" @if( $user->gender ==0) selected @endif >Female</option>
            </select>
          </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              
              <input type="hidden" class="form-control" name="email" id="email" value="{{$user->email}}" >
          </div>
        </div> <!-- end of .column -->

        <div class="col-md-9" style="margin-bottom: 20px;">
          <button class="btn btn-success pull-right btn-lg" >Save Changes</button>
          
        <a href="/profile/myProfile" class="btn btn-info btn-lg" ><span class="fa fa-arrow-circle-left" style="font-size: 30px;"></span></a>
      </div>
      </div>

        <!-- end of .column -->
      
    </form>
  </div>
</div>
@endsection


@section('javaScriptFiles')
  <script>

    var app = new Vue({
      el: '#myapp',
      data: {
        password_options: 'keep',
        rolesSelected: {!! $user->roles->pluck('id') !!}
      }
    });

  </script>


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
@endsection
