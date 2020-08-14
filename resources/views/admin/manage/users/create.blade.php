@extends('layouts.blog')
@section('title', '| Create a user')

@section('content')
    <div class="row">
      <div class="col-md-10">
        <h1 class="title">Create New User</h1>
      </div>
    </div>
    <form action="{{route('users.store')}}" method="POST">
      {{csrf_field()}}
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="name">Gender</label>
            <select name="gender" id="gender" class="form-control">
              <option value="1">Male</option>
              <option value="0">Female</option>
            </select>
          </div>

          <div class="form-group">
            <label for="name">Fullname</label>
            <p class="control">
              <input type="text" class="form-control" name="name" id="name">
            </p>
          </div>

          <div class="form-group">
            <label for="username">Username</label>
            <p class="control">
              <input type="text" class="form-control" name="username" id="username">
            </p>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <p class="control">
              <input type="text" class="form-control" name="email" id="email">
            </p>
          </div>


    <div class="form-group">
        <div class="form-group{{ $errors->has('uparuwase') ? ' has-error' : '' }}">
                            <label> Living Parish:</label>
        <select id="uparuwase"class="form-control" name="uparuwase" autofocus>
           <option value="">Hitamo Paruwase utuyemo...</option>
              <option value="Remera">Remera</option>
              <option value="St Michel">St Michel</option>
              <option value="Gikondo">Gikondo</option>
              <option value="Mubuga">Mubuga</option>
              <option value="Nkanka">Nkanka</option>
              <option value="Muyange">Muyange</option>
              <option value="Mibirizi">Mibirizi</option>
              <option value="Cyangugu">Cyangugu</option>
              <option value="Gikondo">Gikondo</option>
               <option value="Yove">Yove</option>
               <option value="Nyabitimbo">Nyabitimbo</option>
               <option value="Nkombo">Nkombo</option>
               <option value="Mushaka">Mushaka</option>
              <option value="Save">Save</option>
              <option value="Zaza">Zaza</option>
              <option value="Shangi">Shangi</option>
              <option value="Nyamasheke">Nyamasheke</option>
              <option value="Kibuye">Kibuye</option>
              
           </select>
                @if ($errors->has('uparuwase'))
                    <span class="help-block">
                        <strong>{{ $errors->first('uparuwase') }}</strong>
                    </span>
                @endif
            </div>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <p class="control">
              <input type="text" class="form-control" name="password" id="password" v-if="!auto_password" placeholder="Manually give a password to this user">
              <b-checkbox name="auto_generate" class="m-t-15" v-model="auto_password">Auto Generate Password
              </b-checkbox>
            </p>
          </div>
        </div> <!-- end of .column -->

        <div class="col-md-2">
          <label for="roles">Roles:</label>
            <input type="hidden" name="roles" :value="rolesSelected" />
            <b-checkbox-group v-model="rolesSelected">
              @foreach ($roles as $role)
                <div class="form-group">
                  <b-checkbox value="{{$role->id}}">{{$role->display_name}}</b-checkbox>
                </div>
              @endforeach
            </b-checkbox-group>
        </div>
      </div> <!-- end of .columns for forms -->
      <div class="row">
        <div class="col">
          <hr />
          <button class="btn btn-primary pull-right" style="width: 250px;">Create New User</button>
        </div>
      </div>
    </form>
@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#myapp',
      data: {
        auto_password: true,
        rolesSelected: {!! old('roles') ? old('roles') : '[]' !!}
      }
    });
  </script>
@endsection
