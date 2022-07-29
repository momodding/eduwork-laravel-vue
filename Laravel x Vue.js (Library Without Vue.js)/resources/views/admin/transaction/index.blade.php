@extends('layouts.admin')
@section('header', 'Transaction')

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="card"></div>
              <div class="card-header">
                <a href="{{ url('transactions/create') }}" class="btn btn-sm btn-primary pull-right">Create New Transaction</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px" class="text-center">No.</th>
                      <th class="text-center">Member ID</th>
                      <th class="text-center">Date Start</th>
                      <th class="text-center">Date End</th>
                      <th class="text-center">Created At</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($transactions as $key => $transaction)
                    <tr>
                      <td class="text-center">{{ $key+1 }}</td>
                      <td class="text-center">{{ $transaction->member_id }}</td>
                      <td class="text-center">{{ $transaction->date_start }}</td>
                      <td class="text-center">{{ $transaction->date_end }}</td>
                      <td class="text-center">{{ date('H:i:s | d/M/Y', strtotime($author->created_at)) }}</td>
                      <td class="text-center">
                        <a href="{{ url('transactions/'.$transaction->id.'/edit') }}" class="btn btn-warning btn-sm" style="width: 100px">Edit</a> <br><br>
                      
                      <form action="{{ url('transactions', ['id' => $transaction->id]) }}" method="post">
                          <input class="btn btn-danger btn-sm" style="width: 100px" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                          @method('delete')
                          @csrf
                      </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

            <!-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div> -->
            </div>
          </div>
        </div>
@endsection