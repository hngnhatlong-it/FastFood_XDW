@extends('layouts.admin')

@section('title', 'Quản lý sản phẩm')
@section('page-title', 'Quản lý sản phẩm')

@section('content')
@if(session('success')) //thông báo thành công khi crud
<div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
@endif

<div class="table-card mb-4">
    <div class="card-header">
        <i class="bi bi-plus-circle me-2"></i>Thêm sản phẩm mới
    </div>
    <div class="card-body">
        {{-- thêm sản phẩm --}}
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <div class="row g-2">
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
                <div class="col-md-1">
                    <input type="number" name="price" class="form-control" placeholder="Giá (VNĐ)" required min="0">
                </div>
                <div class="col-md-1">
                    <input type="number" name="stock" class="form-control" placeholder="Tồn kho" value="100" min="0">
                </div>
                <div class="col-md-3">
                    <input type="text" name="image" class="form-control" placeholder="URL hình ảnh">
                </div>
                <div class="col-md-2">
                    <input type="text" name="description" class="form-control" placeholder="Mô tả">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-admin w-100">Thêm</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="table-card">
    <div class="card-header">
        {{-- hiển thị danh sách sản phẩm --}}
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
                    <th>Tồn kho</th>
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
                    <td>
                        @if($product->stock <= 0)
                            <span class="badge bg-danger">Hết hàng</span>
                            @elseif($product->stock <= 10)
                                <span class="badge bg-warning text-dark">{{ $product->stock }}</span>
                                @else
                                <span class="badge bg-success">{{ $product->stock }}</span>
                                @endif
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editProduct{{ $product->id }}">
                            <i class="bi bi-pencil"></i>
                        </button>

                        {{-- modal xóa sản phẩm --}}
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Xóa sản phẩm này?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                {{-- modal sửa sản phẩm --}}
                <div class="modal fade" id="editProduct{{ $product->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Sửa sản phẩm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Danh mục</label>
                                        <select name="category_id" class="form-select" required>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tên sản phẩm</label>
                                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Giá (VNĐ)</label>
                                        <input type="number" name="price" class="form-control" value="{{ $product->price }}" required min="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tồn kho</label>
                                        <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" min="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">URL hình ảnh</label>
                                        <input type="text" name="image" class="form-control" value="{{ $product->image }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mô tả</label>
                                        <input type="text" name="description" class="form-control" value="{{ $product->description }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-admin">Lưu thay đổi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection