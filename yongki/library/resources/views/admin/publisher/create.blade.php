@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create New Publisher</h3>
            </div>
             
            <form action="{{ url('publishers') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name" required="">
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" required="">
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" name="phone_number" class="form-control" placeholder="Enter Phone Number" required="">
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter Address" required="">
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection