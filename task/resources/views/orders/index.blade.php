@extends('layouts.main')

@section('content')
    <table class="table table-striped" style="margin-top: 100px;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Type</th>
                <th scope="col">Fees</th>
                <th scope="col">CS Phone</th>
                <th scope="col">CS Name</th>
                <th scope="col">Table Number</th>
                <th scope="col">Serivce</th>
                <th scope="col">Waiter Name</th>
            </tr>
        </thead>
        <tbody>
            @php
                $sno = 0;
            @endphp
            @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{++$sno}}</th>
                    <td>{{$order->type->type}}</td>
                    <td>{{$order->delivery_fees ? $order->delivery_fees : '---------'}}</td>
                    <td>{{$order->customer_phone ? $order->customer_phone : '---------'}}</td>
                    <td>{{$order->customer_name ? $order->customer_name : '---------'}}</td>
                    <td>{{$order->table_number ? $order->table_number : '---------'}}</td>
                    <td>{{$order->serivce_charge ? $order->serivce_charge : '---------'}}</td>
                    <td>{{$order->waiter_name ? $order->waiter_name : '---------'}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
