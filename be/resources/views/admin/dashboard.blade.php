@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Tổng quan')
@section('content')

<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="stat-card primary">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-label">Tổng đơn hàng</div>
                    <div class="stat-value">{{ $totalOrders }}</div>
                </div>
                <div class="stat-icon"><i class="bi bi-cart3"></i></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="stat-card success">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-label">Khách hàng</div>
                    <div class="stat-value">{{ $totalUsers }}</div>
                </div>
                <div class="stat-icon"><i class="bi bi-people"></i></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="stat-card danger">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-label">Doanh thu</div>
                    <div class="stat-value">{{ number_format($totalRevenue, 0, ',', '.') }}</div>
                </div>
                <div class="stat-icon"><i class="bi bi-currency-dollar"></i></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="stat-card info">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-label">Sản phẩm</div>
                    <div class="stat-value">{{ $totalProduct }}</div>
                </div>
                <div class="stat-icon"><i class="bi bi-box-seam"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="table-card">
    <div class="card-header">
        <i class="bi bi-speedometer2 me-2"></i> Chào mừng đến với Admin Panel
    </div>
    <div class="card-body">
        <p class="text-muted">Sử dụng menu bên trái để quản lý hệ thống.</p>
    </div>
</div>
@endsection