@extends('layouts.admin')
@section('header', 'Add Transaction')

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
                        <a>Transaction no : </a><label>{{ $transaction_number + 1 }}</label>
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        <div class="form-group">
                            <label>Member</label>
                            <select name="member" class="form-control">
                                @foreach ($members as $member)
                                    <option @click="cart({{ $member->id }})" value="{{ $member->id }}">
                                        {{ $member->name }}</option>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>

                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.card -->

@endsection
@section('js')
    <script text="text/javascript">
        var actionUrl = '{{ url('cart') }}';
        var apiUrl = '{{ url('api/cart') }}';

        var app = new vue({
            el: 'controller',
            data: {
                actionUrl,
                apiUrl,
            },
            mounted: function() {

            },
            methods: {
                cart(id) {
                    
                },
            },
        });
    </script>
@endsection
