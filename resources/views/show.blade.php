@extends('app')

@section('content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Order ID</th>
        <th scope="col">Order Date</th>
        <th scope="col">Ship Date</th>
        <th scope="col">Ship Mode</th>
        <th scope="col">Customer ID</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Segment</th>
        <th scope="col">Country</th>
        <th scope="col">City</th>
        <th scope="col">State</th>
        <th scope="col">Postal Code</th>
        <th scope="col">Region</th>
        <th scope="col">Product ID</th>
        <th scope="col">Category</th>
        <th scope="col">Sub-Category</th>
        <th scope="col">Product Name</th>
        <th scope="col">Sales</th>
        <th scope="col">Quantity</th>
        <th scope="col">Discount</th>
        <th scope="col">Profit</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="data">{{$data->id}}</th>
            <td>{{$data->order_id}}</td>
            <td>{{$data->order_date}}</td>
            <td>{{$data->ship_date}}</td>
            <td>{{$data->ship_mode}}</td>
            <td>{{$data->customer_id}}</td>
            <td>{{$data->customer_name}}</td>
            <td>{{$data->segment}}</td>
            <td>{{$data->country}}</td>
            <td>{{$data->city}}</td>
            <td>{{$data->state}}</td>
            <td>{{$data->postal_code}}</td>
            <td>{{$data->region}}</td>
            <td>{{$data->product_id}}</td>
            <td>{{$data->category}}</td>
            <td>{{$data->sub_category}}</td>
            <td>{{$data->product_name}}</td>
            <td>{{$data->sales}}</td>
            <td>{{$data->quantity}}</td>
            <td>{{$data->discount}}</td>
            <td>{{$data->profit}}</td>
        </tr>
    </tbody>
</table>
@endsection
