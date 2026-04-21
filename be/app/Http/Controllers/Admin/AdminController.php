<?php

namespace App\Http\Controllers\Admin; //file đang nằm trong thực mục này

use App\Http\Controllers\Controller; //
use Illuminate\Http\Request; //lấy dữ liệu từ form
use App\Models\Order; //thao tác với bảng order

class AdminController extends Controller //class admincontroller kế thừa controller
{

    //trang dashboard
    public function dashboard()
    {
        $totalOrders = \App\Models\Order::count();
        $totalUsers = \App\Models\User::where('role', 'user')->count();
        $totalRevenue = \App\Models\Order::sum('total_amount');
        $totalProduct = \App\Models\Product::count();
        return view('admin.dashboard', compact('totalOrders', 'totalUsers', 'totalRevenue', 'totalProduct')); //dữ liệu sẽ trả về view của trang admin\dashboard
    }

    //trang danh mục
    public function categories()
    {
        $categories = \App\Models\Category::all(); //lấy toàn bộ danh mục từ models
        return view('admin.categories', compact('categories')); //
    }

    public function storeCategory(Request $request)
    {
        \App\Models\Category::create($request->all()); //tạo mới toàn bộ danh mục
        return redirect()->back()->with('success', 'Thêm danh mục thành công!'); //quay lại trang cũ và xuất thông báo
    }

    public function updateCategory(Request $request, $id) //cập nhật dữ liệu vào hệ thống
    {
        $category = \App\Models\Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->back()->with('success', 'Cập nhật danh mục thành công!');
    }

    public function destroyCategory($id)
    {
        \App\Models\Category::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Xóa danh mục thành công!');
    }

    //trang sản phẩm
    public function products()
    {
        $products = \App\Models\Product::with('category')->get();
        $categories = \App\Models\Category::all();
        return view('admin.products', compact('products', 'categories'));
    }

    public function storeProduct(Request $request)
    {
        \App\Models\Product::create($request->all());
        return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');
    }

    public function updateProduct(Request $request, $id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->back()->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroyProduct($id)
    {
        \App\Models\Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Xóa sản phẩm thành công!');
    }

    //người dùng
    public function users()
    {
        $users = \App\Models\User::where('role', 'user')->get();
        return view('admin.users', compact('users'));
    }

    public function destroyUser($id)
    {
        \App\Models\User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Xóa người dùng thành công!');
    }

    //đơn hàng
    public function orders()
    {
        $orders = \App\Models\Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.orders', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = \App\Models\Order::with('orderItems')->findOrFail($id);
        $oldStatus = $order->status; //trạng thái hiện tại
        $newStatus = $request->status; //trạng thái từ user, giá trị nhận được sẽ là 'cancelled', 'completed',...

        if ($oldStatus !== $newStatus) { //nếu trạng thái hiện tại và trạng thái mới khác nhau thì:
            if ($newStatus === 'cancelled') {
                foreach ($order->orderItems as $item) {
                    $product = \App\Models\Product::find($item->product_id);
                    if ($product) {
                        //dùng increment để cộng tồn kho chính xác
                        $product->increment('stock', $item->quantity); //phép cộng => sản phẩm -> lệnh ('số tồn kho còn lại', số lượng trong đơn hàng)
                    }
                }
                $message = 'Đã hủy đơn hàng và hoàn tồn kho thành công!';
            } else {
                $message = 'Cập nhật trạng thái thành công!';
            }

            $order->status = $newStatus;
            $order->save();
            return redirect()->back()->with('success', $message);
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        //tìm đơn hàng theo ID
        $order = Order::find($id);
        //kiểm tra nếu có đơn hàng thì xóa
        if ($order) {
            $order->delete();
            return redirect()->back()->with('success', 'Xóa đơn hàng thành công!');
        }

        return redirect()->back()->with('error', 'Không tìm thấy đơn hàng!');
    }
}
