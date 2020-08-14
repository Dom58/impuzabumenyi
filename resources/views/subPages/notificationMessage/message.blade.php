<div class="row">
<div class="col-md-6 offset-md-3">
    
@if (Session::has('success'))

<div class="alert alert-success" role="alert">
    <strong>Success:</strong> {{ Session::get('success')}}
</div>  
@endif

@if(count($errors)> 0)
<div class="alert alert-danger" role="alert">
    <strong>Errors:</strong>
    <ul>
        @foreach($errors ->all() as $error)
        <li>{{ $error }} </li>
        @endforeach
    </ul>
</div>
@endif
</div>
</div>