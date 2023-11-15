@extends('layouts.admin')
@section('header', 'Transaction')

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
                            <a href="{{ url('transactions/create') }}" class="btn btn-success pull-right">Create New Transaction</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Member</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($transactions as $key => $transaction)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $transaction->product_id }}</td>
                                            <td>{{ $transaction->qty }}</td>
                                            <td>{{ $transaction->total }}</td>
                                            <td>{{ $transaction->member }}</td>
                                            <td>
                                                <a href="#" @click="detail({{ $transaction }})" class="btn btn-warning btn-sm">Detail</a>
                                                <a href="#" @click="editData({{ $transaction }})" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" @click="deleteData({{ $transaction->id }})" class="btn btn-danger btn-sm">Delete</a>
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

        {{-- <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Transaction</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <a>Transaction no : </a><label>{{ $transaction_number + 1 }}</label>
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            <div class="form-group">
                                <label>Member</label>
                                <select name="member" class="form-control">
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>    
                                    @endforeach
                                  </select>
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
        <!-- /.modal --> --}}

    </div><!-- /.container-fluid -->
    <!-- /.content -->


    <!-- /.modal -->

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
{{-- <script>
    $(function () {
      $("#dataTable").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script> --}}
    <script>
        var actionUrl ='{{ url('transactions') }}';
        var apiUrl = '{{ url('api/transactions') }}';
        
        var columns = [
            {data:'DT_RowIndex', class:'text-center',orderable:true},
            {data:'name', class:'text-center',orderable:true},
            {data:'grand_total', class:'text-center',orderable:true},
            {data:'created_at', class:'text-center',orderable:true},
            {render:function(index, row, data, meta){
                return `
                <a href="#" class="btn btn-primary btn-sm" onclick="controller.detail(
                ${data.id})">
                Detail
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event,
                ${data.id})">
                Delete
                </a>
                `
            }, orderable: false, width:'200px',class:'text-center'},
        ];

        var controller = new Vue({
            el: '#controller',
            data:{
                datas:[],
                data: {},
                actionUrl,
                apiUrl,
                editStatus : false,
            },
            mounted:function(){
                this.datatable();    
            },
            methods:{
                datatable(){
                    const _this = this;
                    _this.table =$('#dataTable').DataTable({
                        ajax:{
                            url: _this.apiUrl,
                            type:'GET',
                        },
                        columns:columns
                    }).on('xhr',function(){
                        _this.datas = _this.table.ajax.json().data;
                    });
                },
                detail(id){
                    console.log(id);
                    this.detailUrl = '{{ url('transaction_details') }}'+'/'+id;
                    location.href = this.detailUrl;
                },
                addData(){
                    this.data = {};
                    //this.actionUrl = '{{ url('products') }}';
                    this.editStatus= false;
                    $('#modal-default').modal();
                },
                editData(event,row){                  
                    this.data = this.datas[row];
                    //this.actionUrl = '{{ url('products') }}'+'/'+this.data.id;
                    this.editStatus= true;
                    $('#modal-default').modal();
                },
                deleteData(event,id){
                    //this.actionUrl = '{{ url('products') }}'+'/'+id;
                    event.preventDefault();
                    const _this = this;
                    if(confirm("Are you sure?")){
                        axios.delete(this.actionUrl+'/'+id,{method:'DELETE'}).then(response=>{
                            //location.reload();
                            _this.table.ajax.reload();
                        });
                    }
                },
                submitForm(event, id){
                    //id  =this.data.id;
                    console.log(this.data);
                    event.preventDefault();
                    const _this = this;
                    var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                    axios.post(actionUrl, new FormData($(event.target)[0])).then(response =>{
                        $('#modal-default').modal('hide');
                        _this.table.ajax.reload();
                    })
                },
            }
        });
    </script>

@endsection
