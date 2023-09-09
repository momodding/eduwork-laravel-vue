@extends('layouts.admin')
@section('header', 'Product')

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
                            <a href="#" @click="addData()" class="btn btn-primary pull-right">Create New Product</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Variant</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->category_name }}</td>
                                            <td>{{ $product->variant_name }}</td>
                                            <td>{{ $product->qty }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>
                                                <a href="#" @click="editData({{ $product }})" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" @click="deleteData({{ $product->id }})" class="btn btn-danger btn-sm">Delete</a>
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
                    <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New product</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" :value="data.product_name"
                                    required="">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control" :value="data.category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Variant</label>
                                <select name="variant_id" class="form-control" :value="data.variant_id">
                                    @foreach ($variants as $variant)
                                        <option value="{{ $variant->id }}">{{ $variant->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Qty</label>
                                <input type="text" name="qty" class="form-control" :value="data.qty"
                                    required="">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" :value="data.price"
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
        <!-- /.modal -->

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
        var actionUrl ='{{ url('products') }}';
        var apiUrl = '{{ url('api/products') }}';
        
        var columns = [
            {data:'DT_RowIndex', class:'text-center',orderable:true},
            {data:'product_name', class:'text-center',orderable:true},
            {data:'category_name', class:'text-center',orderable:true},
            {data:'variant_name', class:'text-center',orderable:true},
            {data:'qty', class:'text-center',orderable:true},
            {data:'price', class:'text-center',orderable:true},
            {render:function(index, row, data, meta){
                return `
                <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event,
                ${meta.row})">
                Edit
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
