@extends('layouts.admin')
@section('header', 'Member')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create New Member</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('members') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name"
                                required="">
                        </div>
                        <div class="form-group">
                            <label>Gender</label><br>
                            <input type="radio" name="gender" value="1"> Male
                            <input type="radio" name="gender" value="2"> Female
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" required="">
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
    <!-- /.card -->

@endsection