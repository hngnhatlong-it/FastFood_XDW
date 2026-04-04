@extends('layouts.main')

@section('title', 'Đơn hàng của tôi')

@section('content')
<style>
    /* =====================================================
       ORDERS PAGE - FKT Theme
       ===================================================== */
    .fkt-header {
        background: linear-gradient(135deg, var(--fkt-primary), var(--fkt-secondary));
        padding: 30px 0;
        margin-bottom: 30px;
        box-shadow: 0 4px 20px rgba(184, 12, 12, 0.3);
    }
    
    .fkt-header h2 {
        color: var(--fkt-white);
        font-weight: 800;
        font-size: 28px;
        margin: 0;
    }
    
    .fkt-header .subtitle {
        color: rgba(255,255,255,0.9);
        font-size: 15px;
        margin-top: 8px;
    }
    
    /* Order Card */
    .order-card {
        background: var(--fkt-white);
        border-radius: 16px;
        box-shadow: var(--shadow-sm);
        margin-bottom: 25px;
        overflow: hidden;
        border: none;
        transition: var(--transition);
    }
    
    .order-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }
    
    .order-header {
        background: linear-gradient(135deg, var(--fkt-gray-light), #f0f0f0);
        padding: 20px 25px;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .order-number {
        font-size: 18px;
        font-weight: 800;
        color: var(--fkt-primary);
    }
    
    .order-date {
        color: var(--fkt-gray);
        font-size: 14px;
        margin-left: 12px;
    }
    
    .order-total {
        font-size: 20px;
        font-weight: 900;
        color: var(--fkt-primary);
    }
    
    /* Status Badges */
    .status-badge {
        padding: 10px 20px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .status-pending {
        background: linear-gradient(135deg, #ffc107, #ffb300);
        color: #000;
        box-shadow: 0 2px 10px rgba(255, 193, 7, 0.4);
    }
    
    .status-processing {
        background: linear-gradient(135deg, #2196F3, #1976D2);
        color: #fff;
        box-shadow: 0 2px 10px rgba(33, 150, 243, 0.4);
    }
    
    .status-completed {
        background: linear-gradient(135deg, var(--fkt-success), #5a8a3c);
        color: #fff;
        box-shadow: 0 2px 10px rgba(122, 156, 89, 0.4);
    }
    
    .status-cancelled {
        background: linear-gradient(135deg, var(--fkt-alert), #8b0000);
        color: #fff;
        box-shadow: 0 2px 10px rgba(178, 0, 0, 0.4);
    }
    
    .order-body {
        padding: 25px;
    }
    
    .section-title {
        font-size: 14px;
        font-weight: 800;
        color: var(--fkt-text-dark);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 3px solid var(--fkt-primary);
        display: inline-block;
    }
    
    .product-item {
        display: flex;
        align-items: center;
        padding: 14px 0;
        border-bottom: 1px dashed #eee;
    }
    
    .product-item:last-child {
        border-bottom: none;
    }
    
    .product-name {
        flex: 1;
        font-weight: 600;
        color: var(--fkt-text-dark);
    }
    
    .product-price {
        color: var(--fkt-gray);
        font-size: 14px;
        min-width: 100px;
        text-align: right;
    }
    
    .product-qty {
        color: var(--fkt-primary);
        font-weight: 800;
        min-width: 50px;
        text-align: center;
        background: var(--fkt-light-bg);
        padding: 6px 12px;
        border-radius: 8px;
        margin: 0 15px;
    }
    
    .product-subtotal {
        font-weight: 800;
        color: var(--fkt-primary);
        min-width: 120px;
        text-align: right;
    }
    
    /* Order Summary */
    .order-summary {
        background: linear-gradient(135deg, var(--fkt-light-bg), #fff);
        padding: 22px;
        border-radius: 16px;
        margin-top: 20px;
        border: 1px solid var(--fkt-light-bg);
    }
    
    .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
    }
    
    .summary-label {
        color: var(--fkt-gray);
    }
    
    .summary-value {
        font-weight: 700;
        color: var(--fkt-text-dark);
    }
    
    .summary-total {
        font-size: 20px;
        color: var(--fkt-primary);
        border-top: 2px solid var(--fkt-primary);
        padding-top: 15px;
        margin-top: 12px;
    }
    
    .summary-total .summary-value {
        font-size: 24px;
        color: var(--fkt-primary);
        font-weight: 900;
    }
    
    /* Delivery Info */
    .delivery-info {
        background: var(--fkt-gray-light);
        padding: 22px;
        border-radius: 16px;
        margin-top: 20px;
    }
    
    .delivery-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 14px;
    }
    
    .delivery-item:last-child {
        margin-bottom: 0;
    }
    
    .delivery-icon {
        width: 44px;
        height: 44px;
        background: var(--fkt-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--fkt-white);
        margin-right: 16px;
        flex-shrink: 0;
        font-size: 1.1rem;
    }
    
    .delivery-label {
        font-size: 12px;
        color: var(--fkt-gray);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .delivery-value {
        font-weight: 700;
        color: var(--fkt-text-dark);
    }
    
    /* Button */
    .btn-fkt-order {
        background: linear-gradient(135deg, var(--fkt-primary), var(--fkt-secondary));
        color: var(--fkt-white);
        border: none;
        padding: 14px 32px;
        border-radius: 50px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: var(--transition);
        box-shadow: 0 4px 20px rgba(184, 12, 12, 0.3);
    }
    
    .btn-fkt-order:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(184, 12, 12, 0.45);
        color: var(--fkt-white);
    }
    
    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
    }
    
    .empty-icon {
        width: 130px;
        height: 130px;
        background: linear-gradient(135deg, var(--fkt-light-bg), #fff);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px;
    }
    
    .empty-icon i {
        font-size: 55px;
        color: var(--fkt-primary);
    }
    
    .empty-title {
        font-size: 24px;
        font-weight: 800;
        color: var(--fkt-text-dark);
        margin-bottom: 12px;
    }
    
    .empty-text {
        color: var(--fkt-gray);
        margin-bottom: 30px;
    }
    
    @media (max-width: 768px) {
        .order-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
        
        .product-item {
            flex-wrap: wrap;
        }
        
        .product-qty {
            margin: 8px 0;
        }
        
        .order-number, .order-total {
            font-size: 1rem;
        }
    }
</style>

<!-- Header -->
<div class="fkt-header">
    <div class="container">
        <h2><i class="fas fa-clipboard-list me-3"></i>Đơn hàng của tôi</h2>
        <p class="subtitle">Theo dõi và quản lý đơn hàng từ KFT</p>
    </div>
</div>

<div class="container">
    @if($orders->isEmpty())
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-box-open"></i>
            </div>
            <h3 class="empty-title">Chưa có đơn hàng nào</h3>
            <p class="empty-text">Hãy đặt món ngay để thưởng thức những món ăn hấp dẫn từ KFT!</p>
            <a href="{{ route('home') }}" class="btn-fkt-order">
                <i class="fas fa-shopping-bag me-2"></i>Mua sắm ngay
            </a>
        </div>
    @else
        @foreach($orders as $order)
            <div class="order-card">
                <!-- Order Header -->
                <div class="order-header">
                    <div>
                        <span class="order-number">#{{ $order->order_number }}</span>
                        <span class="order-date">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div>
                        @switch($order->status)
                            @case('pending')
                                <span class="status-badge status-pending"><i class="fas fa-clock me-1"></i> Chờ xác nhận</span>
                                @break
                            @case('processing')
                                <span class="status-badge status-processing"><i class="fas fa-truck me-1"></i> Đang giao</span>
                                @break
                            @case('completed')
                                <span class="status-badge status-completed"><i class="fas fa-check-circle me-1"></i> Đã giao</span>
                                @break
                            @case('cancelled')
                                <span class="status-badge status-cancelled"><i class="fas fa-times-circle me-1"></i> Đã hủy</span>
                                @break
                        @endswitch
                    </div>
                </div>
                
                <!-- Order Body -->
                <div class="order-body">
                    <!-- Products List -->
                    <h6 class="section-title"><i class="fas fa-utensils me-2"></i>Danh sách món ăn</h6>
                    
                    @foreach($order->orderItems as $item)
                        <div class="product-item">
                            <div class="product-name">{{ $item->product->name }}</div>
                            <div class="product-price">{{ number_format($item->price, 0, ',', '.') }} VNĐ</div>
                            <div class="product-qty">x{{ $item->quantity }}</div>
                            <div class="product-subtotal">{{ number_format($item->subtotal, 0, ',', '.') }} VNĐ</div>
                        </div>
                    @endforeach
                    
                    <!-- Order Summary -->
                    <div class="order-summary">
                        <div class="summary-row">
                            <span class="summary-label">Tạm tính:</span>
                            <span class="summary-value">{{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">Phí giao hàng:</span>
                            <span class="summary-value">Miễn phí</span>
                        </div>
                        <div class="summary-row summary-total">
                            <span class="summary-label"><i class="fas fa-wallet me-2"></i>Tổng cộng:</span>
                            <span class="summary-value">{{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</span>
                        </div>
                    </div>
                    
                    <!-- Delivery Information -->
                    <div class="delivery-info">
                        <h6 class="section-title"><i class="fas fa-shipping-fast me-2"></i>Thông tin giao hàng</h6>
                        <div class="delivery-item">
                            <div class="delivery-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <div class="delivery-label">Địa chỉ giao hàng</div>
                                <div class="delivery-value">{{ $order->shipping_address }}</div>
                            </div>
                        </div>
                        <div class="delivery-item">
                            <div class="delivery-icon"><i class="fas fa-phone-alt"></i></div>
                            <div>
                                <div class="delivery-label">Số điện thoại</div>
                                <div class="delivery-value">{{ $order->shipping_phone }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- View Details Button -->
                    <div class="text-center mt-4">
                        <button class="btn-fkt-order">
                            <i class="fas fa-eye me-2"></i>Xem chi tiết đơn hàng
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
