<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use App\Models\Product; // Đảm bảo đã import Model Product
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('orderItems')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('orders', compact('orders'));
    }

    public function store(Request $request)
    {
        // 1. Lấy giỏ hàng kèm thông tin sản phẩm
        $cartItems = CartItem::where('user_id', Auth::id())
            ->with('product')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Giỏ hàng trống!');
        }

        // 2. KIỂM TRA TỒN KHO TRƯỚC KHI ĐẶT
        foreach ($cartItems as $item) {
            // Lưu ý: Kiểm tra tên cột trong DB của bạn là 'stock' hay 'quantity' nhé
            if ($item->product->stock < $item->quantity) {
                return redirect()->back()->with('error', 'Sản phẩm ' . $item->product->name . ' hiện chỉ còn ' . $item->product->stock . ' sản phẩm.');
            }
        }

        // Dùng Database Transaction để đảm bảo tính an toàn dữ liệu
        return DB::transaction(function () use ($cartItems, $request) {
            $total = 0;
            foreach ($cartItems as $item) {
                $total += $item->product->price * $item->quantity;
            }

            // 3. Tạo đơn hàng
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_amount' => $total,
                'status' => 'pending',
                'payment_status' => 'paid',
                'shipping_address' => $request->shipping_address,
                'shipping_phone' => $request->shipping_phone,
                'notes' => $request->notes
            ]);

            // 4. Lưu chi tiết đơn hàng VÀ TRỪ KHO
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'subtotal' => $item->product->price * $item->quantity
                ]);

                // THỰC HIỆN TRỪ SỐ LƯỢNG TRONG BẢNG PRODUCTS
                // Cập nhật đúng tên cột tồn kho của bạn (ở đây mình để mặc định là 'stock')
                $item->product->decrement('stock', $item->quantity);
            }

            // 5. Xóa giỏ hàng
            CartItem::where('user_id', Auth::id())->delete();

            return redirect()->route('orders')->with('success', 'Đặt hàng thành công!');
        });
    }

    public function show($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', Auth::id())
            ->with('orderItems.product')
            ->firstOrFail();
            
        return view('order', compact('order'));
    }

    /**
     * Chức năng Hủy Đơn Hàng - CÓ HOÀN LẠI KHO
     */
    public function cancel($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', Auth::id())
            ->with('orderItems.product')
            ->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Không tìm thấy đơn hàng.');
        }

        if ($order->status === 'pending') {
            return DB::transaction(function () use ($order) {
                // HOÀN LẠI SỐ LƯỢNG VÀO KHO KHI HỦY ĐƠN
                foreach ($order->orderItems as $item) {
                    $item->product->increment('stock', $item->quantity);
                }

                $order->status = 'cancelled';
                $order->save();

                return redirect()->route('orders')->with('success', 'Đơn hàng đã được hủy và số lượng tồn kho đã được hoàn lại.');
            });
        }

        return redirect()->back()->with('error', 'Đơn hàng đã được xử lý, không thể hủy.');
    }
}