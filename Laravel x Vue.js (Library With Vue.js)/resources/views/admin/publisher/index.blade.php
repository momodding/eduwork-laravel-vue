@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')
	<div id="controller">
<div class="row">
    <div class="col-12">
      <div class="card">
              <div class="card-header">
                <a href="{{ url('publishers/create') }}" class="btn btn-sm btn-primary pull-right">Create New Publisher</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table id="example2" class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px" class="text-center">No.</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Phone Number</th>
                      <th class="text-center">Address</th>
                      <th class="text-center">Created At</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($publishers as $key => $publisher)
                    <tr>
                      <td class="text-center">{{ $key+1 }}</td>
                      <td class="text-center">{{ $publisher->name }}</td>
                      <td class="text-center">{{ $publisher->email }}</td>
                      <td class="text-center">{{ $publisher->phone_number }}</td>
                      <td class="text-center">{{ $publisher->address }}</td>
                      <td class="text-center">{{ date('H:i:s | d/M/Y', strtotime($publisher->created_at)) }}</td>
                      <td class="text-center">
                        <a href="{{ url('publishers/'.$publisher->id.'/edit') }}" class="btn btn-warning btn-sm" style="width: 100px">Edit</a> <br><br>
                      
                      <form action="{{ url('publishers', ['id' => $publisher->id]) }}" method="post">
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