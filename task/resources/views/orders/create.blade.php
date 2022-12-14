@extends('layouts.main')

@section('content')
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h1>Items</h1>
            </div>

            <div class="card-body">
                <select name="type" id="type" class="form-control">
                    <option value="">-- choose order type --</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">
                            {{ $type->type }}
                        </option>
                    @endforeach
                </select>
                <div class="row" id="toRender">

                </div>
                <script>
                    $('#type').on('change', function() {
                        if(this.value == 1) {
                            $("#toRender").html(`<div class="card" style="padding: 24px;background-color: #eee;margin: 14px;width: 100%;">
                                                    <div class='col-md-4'>
                                                        <div class="form-group">
                                                            <h6 for="tableNo">Table Number</h6>
                                                            <input class="form-control" type="text" name="tableNo" />
                                                        </div>
                                                    </div>
                                                    <div class='col-md-4'>
                                                        <div class="form-group">
                                                            <h6 for="serviceCharge">Service Charge %</h6>
                                                            <input class="form-control" type="number" name="serviceCharge" />
                                                        </div>
                                                    </div>
                                                    <div class='col-md-4'>
                                                        <div class="form-group">
                                                            <h6 for="waiterName">Waiter Name</h6>
                                                            <input class="form-control" type="text" name="waiterName" />
                                                        </div>
                                                    </div>
                                                </div>`);
                        } else if(this.value == 2) {
                            $("#toRender").html(`<div class="card" style="padding: 24px;background-color: #eee;margin: 14px;width: 100%;">
                                                    <div class='col-md-4'>
                                                        <div class="form-group">
                                                            <h6 for="deliveryFees">Delivery Fees</h6>
                                                            <input class="form-control" type="number" name="deliveryFees" />
                                                        </div>
                                                    </div>
                                                    <div class='col-md-4'>
                                                        <div class="form-group">
                                                            <h6 for="customerPhone">Customer Phone</h6>
                                                            <input class="form-control" type="text" name="customerPhone" />
                                                        </div>
                                                    </div>
                                                    <div class='col-md-4'>
                                                        <div class="form-group">
                                                            <h6 for="customerName">Customer Name</h6>
                                                            <input class="form-control" type="text" name="customerName" />
                                                        </div>
                                                    </div>
                                                </div>`);
                        } else {
                            $("#toRender").html(``);
                        }
                    });
                </script>
                <table class="table" id="items_table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="item0">
                            <td>
                                <select name="items[]" class="form-control">
                                    <option value="">-- choose item --</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }} (${{ number_format($item->price, 2) }})
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="quantities[]" class="form-control" value="1" />
                            </td>
                        </tr>
                        <tr id="item1"></tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <button id="add_row" class="btn btn-primary pull-left">+ Add Row</button>
                        <button id='delete_row' class="pull-right btn btn-danger" style="float: right">- Delete Row</button>
                    </div>
                </div>
                <div class="row" style="text-align: center; margin-top: 20px">
                    <div class="col-md-12">
                        <div>
                            <input style="width: 250px" class="btn btn-success" type="submit" value="Save">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
        let row_number = 1;
        $("#add_row").click(function(e){
            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#item' + row_number).html($('#item' + new_row_number).html()).find('td:first-child');
            $('#items_table').append('<tr id="item' + (row_number + 1) + '"></tr>');
            row_number++;
        });

        $("#delete_row").click(function(e){
            e.preventDefault();
            if(row_number > 1){
            $("#item" + (row_number - 1)).html('');
            row_number--;
            }
        });
        });
    </script>
@endsection





