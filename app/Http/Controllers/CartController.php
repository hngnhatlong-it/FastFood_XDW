<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = \App\Models\CartItem::where('user_id', auth()->id())->with('product')->get();
        return view('cart', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $productId = $request->product_id;
        $userId = auth()->id();

        $existingItem = \App\Models\CartItem::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($existingItem) {
            $existingItem->quantity += 1;
            $existingItem->save();
        } else {
            \App\Models\CartItem::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function addAjax(Request $request)
    {
        $productId = $request->product_id;
        $userId = auth()->id();

        if (!$productId || !$userId) {
            return response()->json([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ'
            ], 400);
        }

        $existingItem = \App\Models\CartItem::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($existingItem) {
            $existingItem->quantity += 1;
            $existingItem->save();
        } else {
            \App\Models\CartItem::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }

        $cartCount = \App\Models\CartItem::where('user_id', $userId)->sum('quantity');

        return response()->json([
            'success' => true,
            'message' => 'Đã thêm vào giỏ hàng!',
            'cart_count' => $cartCount
        ]);
    }

    public function remove($id)
    {
        \App\Models\CartItem::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Đã xóa khỏi giỏ hàng!');
    }

    public function update(Request $request, $id)
    {
        $cartItem = \App\Models\CartItem::findOrFail($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
        return redirect()->back();
    }
}
