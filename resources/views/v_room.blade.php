@extends('layout.v_template')
@section('title', 'List Room')

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
              <th>No</th>
              <th>Room Name</th>
              <th>Location</th>
              <th>Capacity</th>
              <th>Picture</th>
              <th>Action</th>
          </tr>
     </thead>
     <tbody>
         <?php $no=1; ?>
         @foreach ($room as $data)
              <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->room_name }}</td>
                  <td>{{ $data->location }}</td>
                  <td>{{ $data->capacity }}</td>
                  <td><img src="{{ url('foto_room/' . $data->picture) }}" width="100"></td>
                  <td>
                      <a href="/room/detail/{{ $data->id_room }}" class="btn btn-sm btn-success">Detail</a>
                      <a href="/room/edit/{{ $data->id_room }}" class="btn btn-sm btn-warning">Edit</a>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_room }}">
                          Delete
                      </button>
                  </td>
              </tr>
         @endforeach
     </tbody>
  </table>
  </div>
  </div>
  <a href="/room/add" class="btn btn-primary btn-sm">  Add  </a><br>
  </section>


@foreach ($room as $data)
 <div class="modal modal-danger fade" id="delete{{ $data->id_room }}">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">{{ $data->room_name }}</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this data ???</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
              <a href="/room/delete/{{ $data->id_room }}" class="btn btn-outline">Yes</a>
            </div>            
@endforeach

@endsection