@extends('layouts.blog')

@section('title', '| CRUD the Messages')

@section('stylesheets')
<style>

  body{
    background-color:black;
  }
</style>
@endsection

@section('content')
<div class="row">
<div class="col-md-12" style="background-color: #352222;">
  @role('superadmin|admin')
        <h2 style=" color: white;">Who React or send an Sms to Website</h2>
        <center><h3 style=" color: white;">{{ $contacts->count() }} Messages</h3></center>

<div id="sms">
    <table class="table" style="background-color: #e6e9cd; color: #557b71;">  
          <thead>
    <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>tel</th>
      <th>sms</th>
      <th>created_at</th>
      <th></th>
      <th></th>
      </thead>

      <tbody>
        @foreach( $contacts as $contact )
      <tr>
           <th>{{ $contact ->id}}</th>
          <td>{{ $contact ->name}}</td>
          <td>{{ $contact ->email}}</td>
           <td>{{ $contact ->tel}} </td>
           <td>{!! $contact ->sms !!} </td>
          <td>{{ $contact ->created_at ->diffForHumans() }}</td>
          @role('superadmin')
<td>
    {!! Form::open(['route' =>['mycontact.destroy',$contact ->id],'method' =>'DELETE','onsubmit'=>'return ConfirmDelete()']) !!}

<button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash "></span></button>
    {!! Form::close() !!}
    <button type="submit" class="btn btn-primary btn-sm"><span class="fa fa-reply "></span></button>
  </td>
  @endrole

        </tr>
          @endforeach
      </tbody>

    </table>
    <center> {!! $contacts ->links(); !!}</center>
  </div>
    <!-- +++++++++++++++++++++++++++++++++++ End of Contacts ++++++++++++++++++++++ -->
    </div>
    @endrole
  </div>
@endsection
@section('scripts')
<script type="text/javascript">
  
  function ConfirmDelete(){
    return confirm('Are you Sure, Deleting this Message?');
  }
</script>
  @endsection

     
  