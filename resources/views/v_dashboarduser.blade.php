@extends('layout.v_template')
@section('title', 'Dashboard')


@section('content')
    
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">

      <div class="col-lg-2 col-xs-4">
        <!-- small box -->
        <div class="small-box bg-orange">
          <div class="inner">
            <h3>{{ $dashboardview[0]->room }}</h3>
  
            <p>Total Meeting Room</p>
          </div>
          <div class="icon">
            <i class=""></i>
          </div>
          
        </div>
      </div>

      <div class="col-lg-2 col-xs-4">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ $dashboardview[0]->available }}</h3>

            <p>Available Room</p>
          </div>
          <div class="icon">
            <i class=""></i>
          </div>
        
        </div>
      </div>
      <!-- ./col -->
     
    </div>
    <!-- /.row -->

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
              <th>User</th>
              <th>Department</th>
              <th>Meeting Room</th>
              <th>Start Date Time</th>
              <th>End Date Time</th>
              <th>Purpose</th>
              <th>Status</th>
          </tr>
     </thead>
     <tbody>
         <?php $no=111; ?>
         @foreach ($dashboarduser as $data)
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
                 
              </tr>
         @endforeach
     </tbody>
  </table>
  </div>
  </div>
  
  </section>

@endsection
