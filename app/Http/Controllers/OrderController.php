<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orders = Order::query()
            ->when($request->input('q'), function ($query, $q) {
                $query->where('order_id', 'like', '%' . $q . '%');
            })
            ->latest()
            ->paginate();

        return view('orders.index', [
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);

        $order->load('items.product');

        return view('orders.show', [
            'order' => $order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::findOrFail($id);

        if ($order->payment_status != 'SUCCESS') {
            return redirect()->back()->with('error', 'Order payment is not completed yet.');
        }

        return view('orders.edit', [
            'order' => $order,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'tracking_no' => 'required',
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'tracking_no' => ucwords($request->input('tracking_no')),
            'status' => 'DISPATCHED',
        ]);

        return redirect()->route('orders.index')->with('success', 'Order dispatched successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
