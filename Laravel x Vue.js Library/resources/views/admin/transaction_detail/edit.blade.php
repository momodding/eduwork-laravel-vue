@extends('layouts.admin')
@section('header', 'Transaction Detail')

@section('content')
<div class="row">
  <div class="col-md-6">
	   <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Transaction Detail</h3>
        </div>
      
          <form action="{{ url('transaction_details/'.$transaction_detail->id) }}" method="post">
              @csrf
              {{ method_field('PUT') }}
              
              <div class="form-group">
                  <div class="card-body">
                    <label>Transaction ID</label>
                    <input type="text" name="transaction_id" class="form-control" placeholder="Enter Transaction ID" required="" value="{{ $transaction_detail->transaction_id }}">
                  </div>

              <div class="form-group">
                  <div class="card-body">
                    <label>Book ID</label>
                    <input type="text" name="book_id" class="form-control" placeholder="Enter Book ID" required="" value="{{ $transaction_detail->book_id }}">
                  </div>

              <div class="form-group">
                  <div class="card-body">
                    <label>Quantity</label>
                    <input type="text" name="qty" class="form-control" placeholder="Enter Quantity" required="" value="{{ $transaction_detail->qty }}">
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