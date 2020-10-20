@extends('app')

@section('content')
<form method="POST" action="{{route('excel-import')}}" enctype="multipart/form-data">
    @csrf
    <div class="input-group mt-5">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
    <div class="mb-5">
        <small class="form-text text-muted">xlx, .xls</small>
    </div>

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            Upload Validation Error
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    {{ $data->links() }}

    <div class="alert alert-success" role="alert">
        {{$data->total()}} orders
      </div>
    <table class="table">
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
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @if ($data->count() > 0)
                @foreach ($data as $row)
                <tr>
                    <th scope="row">{{$row->id}}</th>
                    <td>{{$row->order_id}}</td>
                    <td>{{$row->order_date}}</td>
                    <td>{{$row->ship_date}}</td>
                    <td>{{$row->ship_mode}}</td>
                    <td>{{$row->customer_id}}</td>
                    <td>{{$row->customer_name}}</td>
                    <td>{{$row->segment}}</td>
                    <td>{{$row->country}}</td>
                    <td>{{$row->city}}</td>
                    <td>{{$row->state}}</td>
                    <td>{{$row->postal_code}}</td>
                    <td>{{$row->region}}</td>
                    <td>{{$row->product_id}}</td>
                    <td>{{$row->category}}</td>
                    <td>{{$row->sub_category}}</td>
                    <td>{{$row->product_name}}</td>
                    <td>{{$row->sales}}</td>
                    <td>{{$row->quantity}}</td>
                    <td>{{$row->discount}}</td>
                    <td>{{$row->profit}}</td>
                    <td><a class="btn btn-success" href="{{route('show',$row->id)}}">Show</a></td>
                </tr>
                @endforeach
            @else
            <tr>
                <td colspan="19" class="text-center"><h3>Please upload you file<h3></td>
            </tr>
            @endif
        </tbody>
      </table>

@endsection
