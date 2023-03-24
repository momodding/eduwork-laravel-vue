@extends('layouts.admin')
@section('header', 'Publisher')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <div id="controller">
        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <a href="#" @click="addData()" class="btn btn-primary pull-right">Create New Publisher</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($publishers as $key => $publisher)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $publisher->name }}</td>
                                            <td>{{ $publisher->email }}</td>
                                            <td>{{ $publisher->phone_number }}</td>
                                            <td>{{ $publisher->address }}</td>
                                            <td>
                                                <a href="#" @click="editData({{ $publisher }})"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" @click="deleteData({{ $publisher->id }})"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody> --}}
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

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form :action="actionUrl" method="post" autocomplete="off" @submit="submitForm($event, data.id)">
                        <div class="modal-header">
                            <h4 class="modal-title">Publisher</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf

                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" v-model="data.name"
                                    required="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" v-model="data.email"
                                    required="">
                            </div>
                            <div class="form-group">
                                <label>Phone number</label>
                                <input type="text" name="phone_number" class="form-control" v-model="data.phone_number"
                                    required="">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" v-model="data.address"
                                    required="">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div><!-- /.container-fluid -->
@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script type="text/javascript">
        var actionUrl = '{{ url('publishers') }}';
        var apiUrl = '{{ url('api/publishers') }}';

        var columns = [
            {data: 'DT_RowIndex', class: 'text-center', oderable: true},
            {data: 'name', class:'text-center', orderable:true},
            {data: 'email', class:'text-center', orderable:true},
            {data: 'phone_number', class:'text-center', orderable:false},
            {data: 'address', class:'text-center', orderable:false},
            {render: function(index, row, data, meta){
                return`
                    <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event,
                        ${meta.row})">
                        Edit
                    </a>
                    <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event,
                        ${data.id})">
                        Delete
                    </a>`;
            }, orderable: false, width: '200px', class:'text-center'},
        ];
    </script>
    <script src="{{ asset('js/data.js') }}"></script>
@endsection
