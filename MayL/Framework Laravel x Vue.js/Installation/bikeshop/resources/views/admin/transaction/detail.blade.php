@extends('layouts.admin')
@section('header', 'Transaction Detail')

@section('content')
    <div class="card card-info" id="controller">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Transaction Detail</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group">
                            <a>Name : </a>
                            <label>{{ $transactions->name }}</label>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Variant</th>
                                    <th>Price</th>
                                    <th>qty</th>
                                    <th>total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction_details as $transaction_detail)
                                <tr>
                                    <td>{{ $transaction_detail->product_name }}</td>
                                    <td>{{ $transaction_detail->category_name }}</td>
                                    <td>{{ $transaction_detail->variant_name }}</td>
                                    <td>{{ $transaction_detail->price }}</td>
                                    <td>{{ $transaction_detail->qty }}</td>
                                    <td>{{ $transaction_detail->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div class="form-group">
                            <a>Total : </a>
                            <label>{{ $transactions->grand_total }}</label>
                        </div>
                        <div class="form-group">
                            <a>Discount</a>
                            <label>{{ $transactions->discount }}</label>
                        </div>
                        <div class="form-group">
                            <a>Pay : </a>
                            <label>{{ $transactions->pay }}</label>
                        </div>
                        <div class="form-group">
                            <a>Change : </a>
                            <label>{{ $transactions->change }}</label>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ url('transactions') }}"class="btn btn-primary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.card -->

@endsection
@section('js')
    <script text="text/javascript">
        var data_transaction ='{!! json_encode($transactions) !!}';
        console.log(data_transaction);
    </script>
@endsection