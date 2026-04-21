@extends('layouts.admin')

@section('page-title', 'Quản lý danh mục')

@section('content')


<div class="table-card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-tags me-2"></i>Thêm danh mục mới</span>
    </div>
    <div class="card-body">
        {{-- thêm danh mục --}}
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

{{-- hiển thị danh sách danh mục --}}
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
                        <div class="d-flex gap-2">

                            {{-- thao tác sửa --}}
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </button>

                            {{-- xóa danh mục --}}
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')       
                                
                                {{-- thao tác xóa --}}
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Xóa danh mục này?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                        <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $category->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $category->id }}">Chỉnh sửa danh mục</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    {{-- sửa danh mục --}}
                                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body text-start">
                                            <div class="mb-3">
                                                <label class="form-label">Tên danh mục</label>
                                                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required> {{-- tự động điền dữ liệu cũ vào --}}
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Mô tả</label>
                                                <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection