@extends('layout.v_template')
@section('title', 'Edit User')


@section('content')
    
<form action="/user/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Name</label>
                    <input name="name" class="form-control" value="{{ $user->name }}">
                    <div class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control" value="{{ $user->email }}">
                    <div class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Department</label>
                    <input name="department" class="form-control" value="{{ $user->department }}"`>
                    <div class="text-danger">
                        @error('department')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                               
                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Save</button>
                </div>               

            </div>
        </div>
    </div>

</form>

@endsection