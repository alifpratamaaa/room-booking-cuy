@extends('layout.v_template')
@section('title', 'Booking Meeting Room')


@section('content')

@if (session('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Information!</h4>
    {{ session('error') }}
</div>
@endif

<form action="/bookingroom/insert" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Meeting Room</label>
                    <select name="id_room" class="form-control">
                        <option value="">--- choose the meeting room ---</option>
                        @foreach ($room as $data)
                        <option value="{{ $data->id_room }}"
                            {{ old('id_room') == $data->id_room ? 'selected' : '' }}>
                            {{ $data->room_name }}</option>
                        @endforeach
                        <div class="text-danger">
                            @error('id_room')
                                {{ $message }}
                            @enderror
                        </div>
                    </select>
                   
                </div>

                <div class="form-group">
                    <label>Start Date Time</label>
                    <input type="datetime-local" name="start_time" class="form-control" value="{{ old('start_time') }}"`>
                    <div class="text-danger">
                        @error('start_time')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>End Date Time</label>
                    <input type="datetime-local" name="end_time" class="form-control" value="{{ old('end_time') }}">
                    <div class="text-danger">
                        @error('end_time')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Purpose</label>
                    <input name="purpose" class="form-control" value="{{ old('purpose') }}">
                    <div class="text-danger">
                        @error('purpose')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Submit</button>
                </div>

            </div>
        </div>
    </div>

</form>

@endsection