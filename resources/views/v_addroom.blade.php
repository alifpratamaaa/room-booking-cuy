@extends('layout.v_template')
@section('title', 'Add Room')


@section('content')
    
<form action="/room/insert" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Room Name</label>
                    <input name="room_name" class="form-control" value="{{ old('room_name') }}">
                    <div class="text-danger">
                        @error('room_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Location</label>
                    <input name="location" class="form-control" value="{{ old('location') }}">
                    <div class="text-danger">
                        @error('location')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Capacity</label>
                    <input name="capacity" class="form-control" value="{{ old('capacity') }}"`>
                    <div class="text-danger">
                        @error('capacity')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Picture</label>
                    <input type="file" name="picture" class="form-control">
                    <div class="text-danger">
                        @error('picture')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Facility</label>
                    <input name="facility" class="form-control" value="{{ old('facility') }}">
                    <div class="text-danger">
                        @error('facility')
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