@extends('submain')
@section('title','| Reset Password')

@section('cssFiles')
<style type="text/css">
  .col-md-8{
    background-color: #5e945f;
  }
</style>


@endsection
  @section('informationBody')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-top: 10px;">
              <div class="panel-heading" style=" background-color:#5e945f; height:50px; text-align:center;"><font style=" font-size:20px; color:white; ">Reset Password</font></div>
                
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <div class="input-group" >
                       <span class="input-group-addon">
                        <span class="fa fa-envelope" aria-hidden="true"> </span>
                       </span>
                       <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email to reset a password" required>
               </div>
                               @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
