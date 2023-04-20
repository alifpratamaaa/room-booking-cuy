@extends('layout.v_template')
@section('title', 'Booking Room')

@section('content')
  
  @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{ session('pesan') }}
    </div>
  @endif
  
<div class="box">
            
  <!-- /.box-header -->
  <div class="box-body table-responsive">
  <table id="example1" class="table table-bordered table-striped">

     <thead>
          <tr>
              <th>ID Booking</th>
              <th>Meeting Room</th>
              <th>Start Date Time</th>
              <th>End Date Time</th>
              <th>Purpose</th>
              <th>Status</th>
          </tr>
     </thead>
     <tbody>
         <?php $no=111; ?>
         @if (!empty($bookingroom))
          @foreach ($bookingroom as $data)
                <tr>
                    <td>{{ $no++ }}</td>
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
                </tr>
          @endforeach
         @endif
     </tbody>
  </table>
  </div>
  </div>
  <a href="/bookingroom/add" class="btn btn-primary btn-sm">  Add Booking  </a><br>
  </section>

@endsection