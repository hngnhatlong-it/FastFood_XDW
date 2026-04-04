@extends('layouts.admin')

@section('title', 'Quản lý sản phẩm')
@section('page-title', 'Quản lý sản phẩm')

@section('content')
<div class="table-card mb-4">
    <div class="card-header">
        <i class="bi bi-plus-circle me-2"></i>Thêm sản phẩm mới
    </div>
    <div class="card-body">
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-2">
                    <select name="category_id" class="form-select" required>
                        <option value="">Chọn danh mục</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm" required>
                </div>
                <div class="col-md-2">
                    <input type="number" name="price" class="form-control" placeholder="Giá (VNĐ)" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="image" class="form-control" placeholder="URL hình ảnh">
                </div>
                <div class="col-md-2">
                    <input type="text" name="description" class="form-control" placeholder="Mô tả">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-admin w-100">Thêm sản phẩm</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="table-card">
    <div class="card-header">
        <i class="bi bi-box-seam me-2"></i>Danh sách sản phẩm
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hình ảnh</th>
                    <th>Danh mục</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                            @else
                                <span class="text-muted">Chưa có ảnh</span>
                            @endif
                        </td>
                        <td><span class="badge bg-warning text-dark">{{ $product->category->name }}</span></td>
                        <td><strong>{{ $product->name }}</strong></td>
                        <td><span class="text-danger fw-bold">{{ number_format($product->price, 0, ',', '.') }} VNĐ</span></td>
                        <td>{{ $product->created_at->format('d/m/Y') }}</td>
                        <td>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Xóa sản phẩm này?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
