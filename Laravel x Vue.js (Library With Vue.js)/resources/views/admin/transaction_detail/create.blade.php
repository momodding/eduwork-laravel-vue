@extends('layouts.admin')
@section('header', 'Transaction Detail')

@section('content')
<div class="row">
  <div class="col-md-6">
	   <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create New Transaction Detail</h3>
        </div>
      
          <form action="{{ url('transaction_details') }}" method="post">
              @csrf
              <div class="form-group">
                  <div class="card-body">
                    <label>Transaction ID</label>
                    <input type="text" name="transaction_id" class="form-control" placeholder="Enter Transaction ID" required="">
                  </div>

              <div class="form-group">
                  <div class="card-body">
                    <label>Book ID</label>
                    <input type="text" name="book_id" class="form-control" placeholder="Enter Book ID" required="">
                  </div>

              <div class="form-group">
                  <div class="card-body">
                    <label>Quantity</label>
                    <input type="text" name="qty" class="form-control" placeholder="Enter Quantity" required="">
                  </div>

              <div class="form-group">
                  <div class="card-body">
                    <label>ISBN</label>
                    <input type="text" name="isbn" class="form-control" placeholder="Enter ISBN" required="">
                  </div> 
            </div>
      
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>
@endsection