@extends('layouts.admin')
@section('header', 'Member')

@section('content')
    <!-- Main content -->
    <div id="controller">
        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ url('members/create') }}" class="btn btn-primary pull-right">Create New Member</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $key => $member)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $member->name }}</td>
                                        <td>
                                            @if ($member->gender == 1)
                                                Male   
                                            @elseif ($member->gender == 2)
                                                Female
                                            @endif
                                        </td>
                                        <td>{{ $member->address }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>
                                            <a href="{{ url('members/'.$member->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ url('members',['id' => $member->id]) }}" method="post">
                                                <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        {{-- <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul> 
                </div> --}}
                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
    <!-- /.content -->


    <!-- /.modal -->

@endsection

@section('js')
   <script>

   </script>
    
@endsection
