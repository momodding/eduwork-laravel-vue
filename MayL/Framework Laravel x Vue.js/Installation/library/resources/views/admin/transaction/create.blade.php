@extends('layouts.admin')
@section('header', 'Transaction')

@section('content')
    <div id="controller">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create New Transaction</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('transactions') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Member</label>
                                <div class="col-sm-10">
                                    <select name="member_id" id="">
                                        @foreach ($members as $key => $member)
                                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" name="date_start">
                                    <a> - </a>
                                    <input type="date" name="date_end">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Book</label>
                                <div class="col-sm-10">
                                    <select name="book_id" id="">
                                        @foreach ($books as $key => $book)
                                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Qty Book</label>
                                <div class="col-sm-10">
                                    <input type="text" name="qty" readonly value='1'>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="radio" name="status" value="0" checked="checked"> <label>Belum dikembalikan
                                    </label><br>
                                    <input type="radio" name="status" value="1"> <label>Sudah dikembalikan </label>
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
        var actionUrl = '{{ url('books') }}';
        var apiUrl = '{{ url('api/books') }}';

        var app = new Vue({
            el: '#controller',
            data: {
                books: [],
                search: '',
                book: {},
                actionUrl,
                apiUrl,
                editStatus: false
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
