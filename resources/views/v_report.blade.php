@extends('layout.v_template')
@section('title', 'Print Report')

@section('content')

<div class="content">
  <div class="row">
      <div class="col-sm-6">

        <div class="form-group">
          <label>First Date</label>
          <input type="date" name="start_time" class="form-control">
          <div class="text-danger">
              
          </div>
        </div>

        <div class="form-group">
          <label>Last Date</label>
          <input type="date" name="end_time" class="form-control">
          <div class="text-danger">
            
          </div>
        </div>

          <a href="/report/export/" target="_blank" class="btn btn-sm btn-primary"> Export <i class="fa fa-print"></i></a>

      </div>
  </div>
</div>

@endsection


