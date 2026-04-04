<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = \App\Models\Order::where('user_id', auth()->id())->with('orderItems')->orderBy('created_at', 'desc')->get();
        return view('orders', compact('orders'));
    }

    public function store(Request $request)
    {
        $cartItems = \App\Models\CartItem::where('user_id', auth()->id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Giỏ hàng trống!');
        }

        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }

        $order = \App\Models\Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $total,
            'status' => 'pending',
            'payment_status' => 'paid', // Mock payment
            'shipping_address' => $request->shipping_address,
            'shipping_phone' => $request->shipping_phone,
            'notes' => $request->notes
        ]);

        foreach ($cartItems as $item) {
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
                'subtotal' => $item->product->price * $item->quantity
            ]);
        }

        // Clear cart
        \App\Models\CartItem::where('user_id', auth()->id())->delete();

        return redirect()->route('orders')->with('success', 'Đặt hàng thành công!');
    }

    public function show($id)
    {
        $order = \App\Models\Order::where('id', $id)
            ->where('user_id', auth()->id())
            ->with('orderItems.product')
            ->firstOrFail();
        return view('order', compact('order'));
    }
}
