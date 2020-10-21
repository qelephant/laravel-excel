<!doctype html>
<html lang="en">
  <head>
    <title>Laravel 7 - Yajra Datatable Implementation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  </head>
  <body>

  <div class="container">
    <h3 class="text-center font-weight-bold">Yajra Datatable Implementation in Laravel 7 </h3>
    <table class="table" id="orders">
        <thead>
            <th>#</th>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Ship Date</th>
            <th>Ship Mode</th>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Segment</th>
            <th>Country</th>
            <th>City</th>
            <th>State</th>
            <th>Postal Code</th>
        </thead>
        <tbody>
        </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#orders').DataTable({
                // processing: true,
                serverSide: true,
                ajax: "{{ route('datatable')}}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'order_id', name: 'order_id'},
                    {data: 'order_date', name: 'order_date'},
                    {data: 'ship_date', name: 'ship_date'},
                    {data: 'ship_mode', name: 'ship_mode'},
                    {data: 'customer_id', name: 'customer_id'},
                    {data: 'customer_name', name: 'customer_name'},
                    {data: 'segment', name: 'segment'},
                    {data: 'country', name: 'country'},
                    {data: 'city', name: 'city'},
                    {data: 'state', name: 'state'},
                    {data: 'postal_code', name: 'postal_code'}
                ]
            });
        });
        $.fn.dataTable.ext.errMode = 'throw';
      </script>
</body>
