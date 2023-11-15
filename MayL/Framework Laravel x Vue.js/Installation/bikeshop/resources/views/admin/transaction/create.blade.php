@extends('layouts.admin')
@section('header', 'Add Transaction')

{{-- @section('css')
#withoutBorder{
    border-width:0px;
    border:none;
    outline:none;
} --}}
{{-- @endsection --}}
@section('content')
    <div class="card card-info" id="controller">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">New Transaction</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <div class="card-body">
                    <a>Transaction no : </a><label>{{ $transaction_number + 1 }}</label>
                    <div class="form-group">
                        <label>Member</label>

                        <select id="member" class="form-control" @change="cart($event)">
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}">
                                    {{ $member->name }}
                                </option>
                            @endforeach
                        </select>
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width:10px">#</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" value="data.name">
                                        </td>
                                    </tr>
                                </tbody> --}}
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                <form class="form-horizontal" :action="transactionUrl" method="post" @submit.prevent="submitForm(data)">
                    @csrf
                    <input type="text" id="memberCart" name="memberCart">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" >Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.card -->

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
    <script text="text/javascript">
        var transactionUrl= '{{ url('transaction') }}';
        var actionUrl = '{{ url('cart') }}';
        var apiUrl = '{{ url('api/cart') }}';
        idUser = $('#memberCart').val();
        //var cartUrl = '{{ url('api/cart') }}';

        var columns = [{
                data: 'DT_RowIndex',
                class: 'text-center',
                oderable: true
            },
            {
                data: 'name',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'price',
                class: 'text-center',
                orderable: true
            },
            {data: 'qty',class: 'text-center',orderable: true},
            {data: 'total',class: 'text-center',orderable: true},
        ];

        var app = new Vue({
            el: '#controller',
            data: {
                datas: [],
                data: {},
                actionUrl,
                apiUrl,
                idUser,
            },
            mounted: function() {

            },
            methods: {
                cart(event) {
                    var idUser = event.target.value;
                    $('#dataTable').DataTable().destroy();
                    const _this = this;
                    this.cartUrl = '{{ url('cart') }}' + '/' + idUser;
                    _this.table = $('#dataTable').DataTable({
                        ajax: {
                            url: _this.cartUrl,
                            type: 'GET',
                        },
                        columns: columns
                    }).on('xhr', function() {
                        _this.datas = _this.table.ajax.json().data;
                    });
                    idUser = $('#memberCart').val(idUser);
                },
                submitForm(data) {
                    event.preventDefault();
                    const _this = this;
                    //cart = $('#memberCart').val();
                    console.log(data);
                    
                    // var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                    // axios.post(actionUrl, new FormData($(event.target)[0])).then(response =>{
                    //     $('#modal-default').modal('hide');
                    //     _this.table.ajax.reload();
                    // })
                },
            },
        });
    </script>
@endsection
