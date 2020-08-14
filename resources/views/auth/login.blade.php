@extends('submain')
@section('title','| Login Page')

@section('cssFiles')
<style type="text/css">
  .col-md-8 {
    background-color: #5e945f;
  }
</style>


@endsection

  @section('informationBody')
        <div id="login" class="col-md-8 col-md-offset-2" >
          <br>
            <div class="panel panel-default" style="margin-top: 10px;">
                <div class="panel-heading" style=" background-color:#5e945f; height:50px; text-align:center;"><font style=" font-size:20px; color:white; ">INJIRA AHA </font></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}


                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Imeli yawe</label>

                            <div class="col-md-6">
                <div class="input-group" >
                       <span class="input-group-addon">
                            <span class="fa fa-envelope" aria-hidden="true"> </span>
                       </span>
                       <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" title="Uzuzamo Email yawe" data-toggle="tooltip" required autofocus >
               </div>
                              @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Ijambo ry'ibanga</label>

                            <div class="col-md-6">
                <div class="input-group" >
                       <span class="input-group-addon">
                            <span class="fa fa-lock" aria-hidden="true"> </span>
                       </span>
                          <input id="password" type="password" class="form-control" name="password"  title="Uzuzamo Ijambo ry'ibanga" data-toggle="tooltip" required>
               </div>
                              @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} style="height: 20px; width: 20px;">  &nbsp;NYIBUKA
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                            Injira aha
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                   Wibagiwe ijambo ry'ibanga ?
                                </a>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                              <a  class="btn btn-success" href="{{ route('register') }}">Kanda aha wiyandikishe</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('javaScriptFiles')
<script type="text/javascript">
  
  // Hover only display a title
  $(document).ready(function(){

  $('#email').tooltip();
    $('#password').tooltip();
  });

    // Manual trigger code;
  //   $('#email').tooltip({
  //     trigger:'click'
  //   });
  //   $('#password').tooltip({
  //     trigger:'click'
  //   });
  // });

</script>
@endsection
