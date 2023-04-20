@extends('layout.v_template')
@section('title', 'Detail Room')

@section('content')
    
<table class="table">
    <tr>
        <th width="100px">Room Name</th>
        <th width="30px">:</th>
        <th >{{ $room->room_name }}</th>
    </tr>
    <tr>
        <th width="100px">Location</th>
        <th width="30px">:</th>
        <th >{{ $room->location }}</th>
    </tr>
    <tr>
        <th width="100px">Capacity</th>
        <th width="30px">:</th>
        <th >{{ $room->capacity }}</th>
    </tr>
    <tr>
        <th width="100px">Picture</th>
        <th width="30px">:</th>
        <th><img src="{{ url('foto_room/'.$room->picture) }}" width="400px"></th>
    </tr>
    <tr>
        <th width="100px">Facility</th>
        <th width="30px">:</th>
        <th >{{ $room->facility }}</th>
    </tr>
    <tr>
       <th><a href="/room" class="btn btn-success btn-sm">Return</a></th>
    </tr>
</table>


@endsection