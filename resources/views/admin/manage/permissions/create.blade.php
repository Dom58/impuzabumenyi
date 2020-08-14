@extends('layouts.blog')

@section('content')
    <div class="row">
      <div class="col-md-10">
        <h1 class="title">Create New Permission</h1>
      </div>
    </div>
    <hr>

    <div class="row">
      <div class="col-md-12">
        <form action="{{route('permissions.store')}}" method="POST">
          {{csrf_field()}}

          <div class="well">
            <b-radio-group v-model="permissionType">
                <b-radio name="permission_type" value="basic">Basic Permission</b-radio>
                <b-radio name="permission_type" value="crud">CRUD Permission</b-radio>
            </b-radio-group>
          </div>

          <div class="form-group form-spacing-top" v-if="permissionType == 'basic'">
            <label for="display_name">Name (Display Name)</label>
            <p class="control">
              <input type="text" class="form-control" name="display_name" id="display_name">
            </p>
          </div>

          <div class="form-group" v-if="permissionType == 'basic'">
            <label for="name">Slug</label>
            <p class="control">
              <input type="text" class="form-control" name="name" id="name">
            </p>
          </div>

          <div class="form-group" v-if="permissionType == 'basic'">
            <label for="description">Description</label>
            <p class="control">
              <input type="text" class="form-control" name="description" id="description" placeholder="Describe what this permission does">
            </p>
          </div>

          <div class="form-group" v-if="permissionType == 'crud'">
            <label for="resource">Resource</label>
            <p class="control">
              <input type="text" class="form-control" name="resource" id="resource" v-model="resource" placeholder="The name of the resource">
            </p>
          </div>

          <div class="row" v-if="permissionType == 'crud'">
            <div class="col-md-5 is-one-quarter">
              <b-checkbox-group v-model="crudSelected">
                <div class="form-group">
                  <b-checkbox value="create">Create</b-checkbox>
                  <!-- <b-checkbox custom-value="create">Create</b-checkbox> -->
                </div>
                <div class="form-group">
                  <b-checkbox value="read">Read</b-checkbox>
                </div>
                <div class="form-group">
                  <b-checkbox value="update">Update</b-checkbox>
                </div>
                <div class="form-group">
                  <b-checkbox value="delete">Delete</b-checkbox>
                </div>
              </b-checkbox-group>
            </div> <!-- end of .column -->

            <input type="hidden" name="crud_selected" :value="crudSelected">

            <div class="col-md-5">
              <table class="table" v-if="resource.length >= 3">
                <thead>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Description</th>
                </thead>
                <tbody>
                  <tr v-for="item in crudSelected">
                    <td v-text="crudName(item)"></td>
                    <td v-text="crudSlug(item)"></td>
                    <td v-text="crudDescription(item)"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <button class="btn btn-success">Create Permission</button>
        </form>
      </div>
    </div>

  </div> <!-- end of .flex-container -->
@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#myapp',
      data: {
        permissionType: 'basic',
        resource: '',
        crudSelected: ['create', 'read', 'update', 'delete']
      },
      methods: {
        crudName: function(item) {
          return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
        },
        crudSlug: function(item) {
          return item.toLowerCase() + "-" + app.resource.toLowerCase();
        },
        crudDescription: function(item) {
          return "Allow a User to " + item.toUpperCase() + " a " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
        }
      }
    });
  </script>
@endsection
