@extends('layout.v_template')
@section('title', 'Change Password')

@section('content')

@if(Session::get('success'))
<div class="alert alert-success alert-dismissible show" role="alert">
  {{ Session::get('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">x</span>
  </button>
</div>
@endif

@if(Session::get('failed'))
<div class="alert alert-danger alert-dismissible show" role="alert">
  {{ Session::get('failed') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">x</span>
  </button>
</div>
@endif

<form action="/changepassword/update" method="POST" >
  @csrf
 
  <div class="col-md-6">
          <div class="form-group">
            <label>Old Password</label>
            <input type="password" name="old_password" class="form-control">
          </div>

          <div class="form-group">
            <label>New Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>Confirmation Password</label>
            <input type="password" name="password_confirmation" class="form-control">
          </div>

          <button type="submit" class="btn btn-primary">Change Password</button>   
  </div>

</form>

@endsection