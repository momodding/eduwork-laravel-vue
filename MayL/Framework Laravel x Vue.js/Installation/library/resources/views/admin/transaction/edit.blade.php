@extends('layouts.admin')
@section('header', 'Edit')

@section('content')
    <div id="controller">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    
                    {{-- detail_id<input type="text" name="" value="{{ $transactions->transaction_details_id }}"> --}}
                    <div class="card-header">
                        <h3 class="card-title">Edit Transaction</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start method="post" @method('PUT')-->
                    <form action="{{ url('transactions/'.$transactions->transactions_id) }}"  method="post" >
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $transactions->transactions_id }}">
                        <input type="hidden" name="book_id" value="{{ $transactions->book_id }}">
                        <input type="hidden" name="statusBefore" value="{{ $transactions->status }}">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Member</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="{{ $transactions->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    {{ $transactions->date_start }} - 
                                    {{ $transactions->date_end }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Book</label>
                                <div class="col-sm-10">
                                    {{ $transactions->title }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Qty Book</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $transactions->qty }}" name="qty">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lama Pinjam</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $transactions->dayrent }}" name="qty">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    @if($transactions->status==0)
                                        <input type="radio" name="status" value="0" checked="checked"> <label>Belum dikembalikan</label>
                                            <br>
                                        <input type="radio" name="status" value="1"> <label>Sudah dikembalikan</label>
                                    @else
                                        <input type="radio" name="status" value="0" disabled ><label>Belum dikembalikan</label>
                                        <br>
                                        <input type="radio" name="status" value="1" checked="checked"> <label>Sudah dikembalikan</label>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card-footer" style="float:right;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">
        var actionUrl = '{{ url('transactions') }}';
        var apiUrl = '{{ url('api/transactions') }}';

        var app = new Vue({
            el: '#controller',
            data: {
                books: [],
                search: '',
                book: {},
                actionUrl,
                apiUrl,
                //editStatus: true
            },
            mounted: function() {
                // this.get_members();
                // this.get_books();
            },
            methods: {
                get_books() {
                    const _this = this;
                    $.ajax({
                        url: apiUrl,
                        method: 'GET',
                        success: function(data) {
                            _this.books = JSON.parse(data);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                },
                editData(event, row) {
                    this.data = this.datas[row];
                    //this.actionUrl = '{{ url('authors') }}' + '/' +this.data.id;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                submitForm(event, id) {
                    console.log(id);
                    event.preventDefault();
                    const _this = this;
                    var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
                    axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                        $('#modal-default').modal('hide');
                        //_this.table.ajax.reload();
                        location.reload();
                    })
                },
                numberWithSpaces(x) {
                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }
            },
            
        })
    </script>
@endsection

