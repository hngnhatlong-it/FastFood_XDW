@extends('layouts.admin')

@section('title', 'Quản lý đơn hàng')
@section('page-title', 'Quản lý đơn hàng')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 text-primary fw-bold">
            <i class="bi bi-cart3 me-2"></i>Danh sách đơn hàng
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 10%">Mã đơn</th>
                        <th style="width: 15%">Khách hàng</th>
                        <th style="width: 12%">Tổng tiền</th>
                        <th style="width: 25%">Thông tin giao hàng</th>
                        <th style="width: 15%">Trạng thái</th>
                        <th style="width: 13%">Thanh toán</th>
                        <th style="width: 10%" class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="fw-bold text-dark">#{{ $order->order_number }}</td>
                        <td>
                            <div class="d-flex flex-column">
                                <span class="fw-semibold text-dark">{{ $order->user->name }}</span>
                                <small class="text-muted"><i class="bi bi-telephone me-1"></i>{{ $order->shipping_phone }}</small>
                            </div>
                        </td>
                        <td>
                            <span class="text-danger fw-bold">{{ number_format($order->total_amount, 0, ',', '.') }} đ</span>
                        </td>
                        <td>
                            <div class="text-wrap" style="max-width: 250px;">
                                <div class="mb-1">
                                    <i class="bi bi-geo-alt text-primary me-1"></i>
                                    <span class="small text-dark">{{ $order->shipping_address }}</span>
                                </div>
                                @if($order->notes)
                                <div class="small text-muted italic">
                                    <i class="bi bi-chat-left-text me-1"></i>Ghi chú: {{ $order->notes }}
                                </div>
                                @endif
                            </div>
                        </td>
                        <td>

                            {{-- cập nhật trạng thái --}}
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm border-info shadow-none" style="width: 140px;" onchange="this.form.submit()">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>⏳ Chờ xử lý</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>⚙️ Đang xử lý</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>✅ Hoàn thành</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>❌ Đã hủy</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            @if($order->status == 'cancelled')
                            {{-- Đã hủy thì hiện Thất bại --}}
                            <span class="badge rounded-pill bg-danger-subtle text-danger border border-danger px-2 py-1">Thất bại</span>

                            @elseif($order->status == 'completed')
                            {{-- Hoàn thành thì hiện Đã trả tiền --}}
                            <span class="badge rounded-pill bg-success-subtle text-success border border-success px-2 py-1">Đã trả tiền</span>

                            @elseif($order->status == 'pending' || $order->status == 'processing')
                            {{-- Chờ xử lý hoặc Đang xử lý thì hiện Chờ tiền --}}
                            <span class="badge rounded-pill bg-warning-subtle text-warning border border-warning px-2 py-1">Chờ tiền</span>

                            @else
                            {{-- Các trường hợp còn lại --}}
                            <span class="badge rounded-pill bg-secondary-subtle text-secondary border border-secondary px-2 py-1">Không xác định</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                onsubmit="return confirm('Bạn có thực sự muốn xóa đơn #{{ $order->order_number }}?')">

                                {{-- xóa đơn --}}
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm border-0" title="Xóa đơn hàng">
                                    <i class="bi bi-trash3-fill fs-5"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection