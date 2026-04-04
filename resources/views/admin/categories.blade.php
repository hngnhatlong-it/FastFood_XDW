@extends('layouts.admin')

@section('title', 'Quản lý danh mục')
@section('page-title', 'Quản lý danh mục')

@section('content')
<div class="table-card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-tags me-2"></i>Thêm danh mục mới</span>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="name" class="form-control" placeholder="Tên danh mục" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="description" class="form-control" placeholder="Mô tả">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-admin w-100">Thêm mới</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="table-card">
    <div class="card-header">
        <i class="bi bi-list-ul me-2"></i>Danh sách danh mục
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Sản phẩm</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><strong>{{ $category->name }}</strong></td>
                        <td>{{ $category->description }}</td>
                        <td><span class="badge bg-secondary">{{ $category->products->count() }}</span></td>
                        <td>{{ $category->created_at->format('d/m/Y') }}</td>
                        <td>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Xóa danh mục này?')">
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
