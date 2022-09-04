@extends('layouts.admin')
@section('header', 'Transaction')

@section('content')
<div class="row">
  <div class="col-md-6">
	   <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Transaction</h3>
        </div>
      
          <form action="{{ url('transactions/'.$transaction->id) }}" method="post">
              @csrf
              {{ method_field('PUT') }}
              
              <div class="form-group">
                    <div class="card-body">
                    <label>Member ID</label>
                    <input type="text" name="member_id" class="form-control" placeholder="Enter Member ID" required="" value="{{ $transaction->member_id }}">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Date Start</label>
                    <input type="text" name="date_start" class="form-control" placeholder="Enter Date Start" required="" value="{{ $transaction->date_start }}">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Date End</label>
                    <input type="text" name="date_end" class="form-control" placeholder="Enter Date End" required="" value="{{ $transaction->date_end }}">
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