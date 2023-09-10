@extends('layouts.admin')
@section('header', 'Cart')

@section('content')
    <div id="controller">
        <div class="row">
            <div class="col-6">
                <label for="">Product</label>
                <table class="table table-bordered" id="productTable">
                    <thead>
                        <th style="width: 10px">#</th>
                        <th>Product</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Action</th>
                    </thead>
                    {{-- <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <form method="create" :action="actionUrl" autocomplete="off">
                                        <input type="hidden" value="{{ auth()->user()->member_id }}" name="member_id">
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <input type="hidden" value=1 name="qty">
                                        <button type="submit" class="btn btn-success btn-sm">Add</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody> --}}
                </table>
            </div>
            <div class="col-6">
                <label for="">Cart</label>
                <table class="table table-bordered" id="cartTable">
                    <thead>
                        <th style="width: 10px">#</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Action</th>
                    </thead>
                    {{-- <tbody>
                        @foreach ($products as $key => $product)
                        
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td onclick="" id="qtyCart"><input type="number"></td>
                                <td id="totalCart">99999</td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody> --}}
                </table>
                <table>
                    <tr>
                        <td>Grand Total : </td>
                        <td>
                            <label id="grandTotal" value="">99999</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Discount</td>
                        <td>: 99999</td>
                    </tr>
                </table>
                {{-- <form id='myform' method='POST' class='quantity' action='#'>
                    <input type='button' value='-' class='qtyminus minus' field='quantity' />
                    <input type='text' name='quantity' value='0' class='qty' />
                    <input type='button' value='+' class='qtyplus plus' field='quantity' />
                  </form> --}}
            </div>
        </div>

    </div>

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
        var idUser = '{{ auth()->user()->member_id }}';
        var createUrl = '{{ url('carts/create') }}';
        var cartUrl = '{{ url('api/cart') }}';
        var productUrl = '{{ url('api/products') }}';
        var cartMin = '{{ url('cart/min') }}';
        var cartPlus = '{{ url('cart/plus') }}';

        var productColumns = [
            {data: 'DT_RowIndex',class: 'text-center',oderable: true},
            {data: 'product_name',class: 'text-center',orderable: true},
            {data: 'qty',class: 'text-center',orderable: true},
            {data: 'price',class: 'text-center',orderable: true},
            {
                render:function(index,data,row){
                    //<button class="btn btn-success btn-sm" onclick="controller.submitForm()">Add</button>
                    //@controller.submit="submitForm($event,data)" method="create" :action="{{ url('carts/create') }}"
                    // <form method="create" autocomplete="off" :action="createUrl" @submit="submitForm($event,data)">
                    //     <input type="hidden" value="{{ auth()->user()->member_id }}" name="member_id">
                    //     <input type="hidden" value="${row.id}" name="product_id">
                    //     <input type="hidden" value=1 name="qty">
                    //     <button type="submit" class="btn btn-success btn-sm">Add</button>
                    // </form>
                    return`
                    <form method="post" autocomplete="off" @submit.prevent="controller.submitForm(data)">
                        @csrf
                        <input type="hidden" value="{{ auth()->user()->member_id }}" name="member_id">
                        <input type="hidden" value="${row.id}" name="product_id">
                        <input type="hidden" value=1 name="qty">
                        <button type="submit" class="btn btn-success btn-sm">Add</button>
                    </form>
                    
                    `
                }
            },
        ];

        var columns = [
            {data: 'DT_RowIndex',class: 'text-center',oderable: true},
            {data: 'name',class: 'text-center',orderable: true},
            {data: 'price',class: 'text-center',orderable: true},
            {
                render:function(index,data,row){
                    return`
                    <button onclick="controller.itemMin(${row.id},${row.qty})">-</button>
                    <input id="cartInputValue" value="${row.qty}" style="width:50px"></input>
                    <button onclick="controller.itemPlus(${row.id})">+</button>
                    `
                }
            },
            {
                data: 'total',class: 'text-center',orderable: true
            },
            {
                render: function(index, row, data, meta) {
                    return `
                    <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event,
                        ${row.id})">
                        Delete
                    </a>`
                },
                orderable: false,
                width: '200px',
                class: 'text-center'
            },
        ];

        var controller = new Vue({
            el: '#controller',
            data: {
                productDatas: [],
                dataProduct: {},
                datas: [],
                data: {},
                idUser,
                cartUrl,
                productUrl,
                createUrl,
                cartMin,
                cartPlus,
            },
            mounted: function() {
                this.product();
                this.datatable();
            },
            methods: {
                product() {
                    const _this = this;
                    _this.productTable = $('#productTable').DataTable({
                        ajax: {
                            url: _this.productUrl,
                            type: 'GET',
                        },
                         columns:productColumns 
                    }).on('xhr', function() {
                        _this.datas = _this.productTable.ajax.json().data;
                    });
                },
                datatable() {
                    const _this = this;
                    this.cartUrl = '{{ url('cart') }}'+'/'+this.idUser;
                    _this.table = $('#cartTable').DataTable({
                        ajax: {
                            url: _this.cartUrl,
                            type: 'GET',
                        },
                        columns: columns
                    }).on('xhr', function() {
                        _this.datas = _this.table.ajax.json().data;
                    });
                },
                // getUserCart(idUser) {
                //     var actionUrl = this.actionUrl + '/' + 'cart/' + idUser;
                // },
                submitForm(data){
                    console.log(data);
                    console.log("ini masuk submitform");
                    const _this = this;
                    //var createUrl;
                    var createUrl = '{{ url('carts/create') }}';
                    axios.post(createUrl, new FormData($(event.target)[0])).then(response =>{
                        _this.table.ajax.reload();
                    });
                },
                itemMin(id,qty){
                    var inputValue = qty;
                    if(inputValue==1){
                        const _this = this;
                        _this.table.ajax.reload();
                    }
                    else{
                        const _this = this;
                        var minUrl = this.cartMin+'/'+id;
                        axios.post(minUrl).then(response =>{
                            _this.table.ajax.reload();
                        });
                    }
                },
                itemPlus(id){
                    const _this = this;
                    var plusUrl = this.cartPlus+'/'+id;
                    axios.post(plusUrl).then(response =>{
                        _this.table.ajax.reload();
                    })
                },
                deleteCart(id){
                    console.log(id);
                }
            },
        });
    </script>
@endsection
