<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('type')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        $types = OrderType::all();
        return view('orders.create', compact('items', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->type == 1) {
            $order = Order::create([
                'type_id' => $request->type,
                'table_number' => $request->tableNo,
                'serivce_charge' => $request->serviceCharge,
                'waiter_name' => $request->waiterName,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        } elseif($request->type == 2) {
            $order = Order::create([
                'type_id' => $request->type,
                'delivery_fees' => $request->deliveryFees,
                'customer_phone' => $request->customerPhone,
                'customer_name' => $request->customerName,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        } else {
            $order = Order::create([
                'type_id' => $request->type,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $items = $request->input('items', []);
        $quantities = $request->input('quantities', []);
        for ($item=0; $item < count($items); $item++) {
            if ($items[$item] != '') {
                $order->items()->attach($items[$item], ['quantity' => $quantities[$item]]);
            }
        }

        toastr()->success('Order Saved Successfully');
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
