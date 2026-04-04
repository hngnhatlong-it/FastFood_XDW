@extends('layouts.admin')

@section('title', 'Quản lý đơn hàng')
@section('page-title', 'Quản lý đơn hàng')

@section('content')
<div class="table-card">
    <div class="card-header">
        <i class="bi bi-cart3 me-2"></i>Danh sách đơn hàng
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Mã đơn</th>
                    <th>Khách hàng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Thanh toán</th>
                    <th>Ngày đặt</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td><strong>#{{ $order->order_number }}</strong></td>
                        <td>
                            <i class="bi bi-person me-1"></i>{{ $order->user->name }}
                            <br><small class="text-muted">{{ $order->shipping_phone }}</small>
                        </td>
                        <td><span class="text-danger fw-bold">{{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</span></td>
                        <td>
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            @switch($order->payment_status)
                                @case('pending')
                                    <span class="status-badge pending">Chờ</span>
                                    @break
                                @case('paid')
                                    <span class="status-badge completed">Đã thanh toán</span>
                                    @break
                                @case('failed')
                                    <span class="status-badge cancelled">Thất bại</span>
                                    @break
                            @endswitch
                        </td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <small class="text-muted">{{ $order->shipping_address }}</small>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
