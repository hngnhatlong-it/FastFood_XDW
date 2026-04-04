<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalOrders = \App\Models\Order::count();
        $totalUsers = \App\Models\User::where('role', 'user')->count();
        $totalRevenue = \App\Models\Order::sum('total_amount');
        return view('admin.dashboard', compact('totalOrders', 'totalUsers', 'totalRevenue'));
    }

    // Categories
    public function categories()
    {
        $categories = \App\Models\Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        \App\Models\Category::create($request->all());
        return redirect()->back()->with('success', 'Thêm danh mục thành công!');
    }

    public function updateCategory(Request $request, $id)
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

    // Products
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

    // Users
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

    // Orders
    public function orders()
    {
        $orders = \App\Models\Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.orders', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = \App\Models\Order::findOrFail($id);
        $order->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công!');
    }
}
