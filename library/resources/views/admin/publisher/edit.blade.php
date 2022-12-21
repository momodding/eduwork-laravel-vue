@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Publisher</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('publishers.update', $publisher->id)}}" method="POST">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Publisher Name" required="" value="{{$publisher->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Publisher Email" required="" value="{{$publisher->email}}">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Enter Publisher Phone Number" required="" value="{{$publisher->phone_number}}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter Publisher Address" value="{{$publisher->address}}">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection