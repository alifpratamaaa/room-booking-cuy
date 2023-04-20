<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Report Using Meeting Room</h1>

<table id="customers">
    <tr>
        <th>No</th>
        <th>User</th>
        <th>Department</th>
        <th>Meeting Room</th>
        <th>Start Date Time</th>
        <th>End Date Time</th>
        <th>Purpose</th>
        <th>Status</th>
    </tr>
    <?php $no=1; ?>
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
      </tr>

    @endforeach
 
 
</table>

</body>
</html>


