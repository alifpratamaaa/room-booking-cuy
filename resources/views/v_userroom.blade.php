@extends('layout.v_template')
@section('title', 'List Room')

@section('content')
  
<div class="box">
            
  <!-- /.box-header -->
  <div class="box-body table-responsive">
  <table id="example1" class="table table-bordered table-striped">

     <thead>
          <tr>
              <th>No</th>
              <th>Room Name</th>
              <th>Location</th>
              <th>Capacity</th>
              <th>Picture</th>
              <th>Facility</th>
          </tr>
     </thead>
     <tbody>
         <?php $no=1; ?>
         @foreach ($userroom as $data)
              <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->room_name }}</td>
                  <td>{{ $data->location }}</td>
                  <td>{{ $data->capacity }}</td>
                  <td><img src="{{ url('foto_room/' . $data->picture) }}" width="100"></td>
                  <td>{{ $data->facility }}</td>
              </tr>
         @endforeach
     </tbody>
  </table>
  </div>
  </div>



@endsection