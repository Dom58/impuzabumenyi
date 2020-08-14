@extends('submain')
@section('title','| Registeration')

@section('cssFiles')
<style type="text/css">
  .col-md-10 {
    background-color: #5e945f;
  }
</style>


@endsection


  @section('informationBody')
        <div id="register" class="col-md-10 col-md-offset-1">
          <br>
            <div class="panel panel-default" style="margin-top: 5px;">
                <div class="panel-heading" style=" background-color:#5e945f; height:50px;  text-align:center;"><font style=" font-size:20px; color:white; ">IYANDIKISHE AHA</font> </div>

  <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                   

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Amazina:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Andika Amazina yawe"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Izina Ryo Kwinjira: </label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Andika izina ryo kwinjira(username),Niryo zizajya rigaragara"  autofocus>
                               <p style="color:brown;"> <span class="fa fa-warning" style="color: red;"></span> Izina ryo kwinjira ntawe urihuza nundi.</p>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Imeli Yawe: </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Andika Email yawe ">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        
                        
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Amagambo y'Ibanga: </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"  placeholder="Uzuza amagambo y'ibanga (Password)} ">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Emeza Amagambo y'Ibanga:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Ongera wuzuze amagambo y'ibanga (Confirm Password" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="margin-bottom: 5px;">
                                    Iyandikishe
                                </button> Niba ufite Konte kanda aha &nbsp; <a  class="btn btn-success" href="{{ route('login') }}">Injira Aha</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

          @section('javaScriptFiles')
            
            <!-- Preview of image uploaded -->
            
          @endsection
