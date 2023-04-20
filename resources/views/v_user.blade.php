@extends('layout.v_template')
@section('title', 'User')

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
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
       </thead>
       <tbody>
           <?php $no=1; ?>
           @foreach ($user as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->department }}</td>

                    <td>
                      <a href="/user/edit/{{ $data->id }}" class="btn btn-sm btn-warning">Edit</a>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id }}">
                          Delete
                      </button>
                    </td>
              </tr>
         @endforeach
     </tbody>
  </table>
  </div>
  </div>

  </section>


@foreach ($user as $data)
 <div class="modal modal-danger fade" id="delete{{ $data->id}}">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">{{ $data->name }}</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this data ???</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
              <a href="/user/delete/{{ $data->id }}" class="btn btn-outline">Yes</a>
            </div>            
@endforeach



@endsection