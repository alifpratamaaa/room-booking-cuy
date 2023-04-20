@extends('layout.v_template')
@section('title', 'Booking Room List')

@section('content')
  
  @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{ session('pesan') }}
    </div>
  @endif
  

<div class="box">
  <div class="md-4">
    <a href="/bookinglist/exportpdf" class="btn btn-sm btn-primary"> Export PDF </a>
    </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive">
  <table id="example1" class="table table-bordered table-striped">

     <thead>
          <tr>
              <th>ID Booking</th>
              <th>User</th>
              <th>Department</th>
              <th>Meeting Room</th>
              <th>Start Date Time</th>
              <th>End Date Time</th>
              <th>Purpose</th>
              <th>Status</th>
              <th>Action</th>
          </tr>
     </thead>
     <tbody>
         <?php $no=111; ?>
         @foreach ($bookinglist as $data)
              <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->department }}</td>
                  <td>{{ $data->room_name }}</td>
                  <td>{{ $data->start_time }}</td>
                  <td>{{ $data->end_time }}</td>
                  <td>{{ $data->purpose }}</td>
                  <td>
                    @if ($data->status == 1)
                      <strong>Approved</strong>                        
                    @elseif ($data->status == 2)
                      <strong>Rejected</strong>
                    @else
                      <strong>Pending</strong>  
                    @endif
                  </td>
                  <td>
                      <a href="/bookinglist/approved/{{ $data->id_booking }}" class="btn btn-sm btn-success">Approved</a>
                      <a href="/bookinglist/rejected/{{ $data->id_booking }}" class="btn btn-sm btn-danger">Rejected</a>
                  </td>
              </tr>
         @endforeach
     </tbody>
  </table>
  </div>
  </div>
  
  </section>

@endsection