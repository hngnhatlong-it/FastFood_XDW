@extends('layouts.main')

@section('title', 'Giỏ hàng')

@section('content')
<style>
    /* =====================================================
       CART PAGE - FKT Theme
       ===================================================== */
    .fkt-cart-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px 20px;
    }
    
    /* Header */
    .fkt-cart-header {
        background: linear-gradient(135deg, var(--fkt-primary), var(--fkt-secondary));
        color: white;
        padding: 35px;
        border-radius: 20px;
        text-align: center;
        margin-bottom: 30px;
        box-shadow: 0 8px 25px rgba(184, 12, 12, 0.3);
    }
    
    .fkt-cart-header h2 {
        margin: 0;
        font-size: 2.2rem;
        font-weight: 800;
    }
    
    .fkt-cart-header p {
        margin: 10px 0 0;
        opacity: 0.95;
    }
    
    /* Empty Cart */
    .fkt-empty-cart {
        background: var(--fkt-white);
        border-radius: 20px;
        padding: 80px 40px;
        text-align: center;
        box-shadow: var(--shadow-md);
    }
    
    .fkt-empty-cart-icon {
        font-size: 80px;
        margin-bottom: 25px;
        color: var(--fkt-gray);
    }
    
    .fkt-empty-cart h3 {
        color: var(--fkt-text-dark);
        margin-bottom: 15px;
        font-weight: 700;
    }
    
    .fkt-empty-cart p {
        color: var(--fkt-gray);
        margin-bottom: 30px;
    }
    
    .fkt-btn-shop {
        background: var(--fkt-primary);
        color: white;
        padding: 14px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        display: inline-block;
        transition: var(--transition);
        border: none;
        cursor: pointer;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .fkt-btn-shop:hover {
        background: var(--fkt-secondary);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(184, 12, 12, 0.4);
        color: white;
    }
    
    /* Cart Table */
    .fkt-cart-table-wrapper {
        background: var(--fkt-white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        margin-bottom: 30px;
    }
    
    .fkt-cart-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .fkt-cart-table thead {
        background: var(--fkt-primary);
        color: var(--fkt-white);
    }
    
    .fkt-cart-table th {
        padding: 18px 15px;
        text-align: left;
        font-weight: 700;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .fkt-cart-table td {
        padding: 20px 15px;
        border-bottom: 1px solid #f0f0f0;
        vertical-align: middle;
    }
    
    .fkt-cart-table tbody tr:hover {
        background: var(--fkt-light-bg);
    }
    
    .fkt-product-cell {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .fkt-product-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 12px;
        border: 2px solid #f0f0f0;
    }
    
    .fkt-product-name {
        font-weight: 700;
        color: var(--fkt-text-dark);
        font-size: 1.05rem;
    }
    
    .fkt-price {
        color: var(--fkt-primary);
        font-weight: 800;
        font-size: 1.1rem;
    }
    
    .fkt-quantity-form {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .fkt-quantity-input {
        width: 70px;
        padding: 10px;
        border: 2px solid #ddd;
        border-radius: 10px;
        text-align: center;
        font-weight: 700;
        font-size: 1rem;
        transition: var(--transition);
    }
    
    .fkt-quantity-input:focus {
        outline: none;
        border-color: var(--fkt-primary);
    }
    
    .fkt-btn-update {
        background: var(--fkt-primary);
        color: white;
        border: none;
        padding: 10px 16px;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
    }
    
    .fkt-btn-update:hover {
        background: var(--fkt-secondary);
        transform: scale(1.05);
    }
    
    .fkt-subtotal {
        font-weight: 800;
        color: var(--fkt-primary);
        font-size: 1.15rem;
    }
    
    .fkt-btn-delete {
        background: transparent;
        color: var(--fkt-alert);
        border: 2px solid var(--fkt-alert);
        padding: 10px 16px;
        border-radius: 50px;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 6px;
        font-weight: 600;
    }
    
    .fkt-btn-delete:hover {
        background: var(--fkt-alert);
        color: white;
    }
    
    .fkt-cart-table tfoot {
        background: var(--fkt-gray-light);
    }
    
    .fkt-cart-table tfoot th {
        background: transparent;
        padding: 25px 15px;
        text-transform: none;
        font-size: 1.2rem;
        color: var(--fkt-text-dark);
    }
    
    .fkt-total-amount {
        color: var(--fkt-primary) !important;
        font-size: 1.8rem !important;
        font-weight: 900 !important;
    }
    
    /* Checkout Section */
    .fkt-checkout-section {
        background: var(--fkt-white);
        border-radius: 20px;
        padding: 35px;
        box-shadow: var(--shadow-md);
    }
    
    .fkt-checkout-title {
        color: var(--fkt-primary);
        font-size: 1.5rem;
        font-weight: 800;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .fkt-form-group {
        margin-bottom: 20px;
    }
    
    .fkt-form-label {
        display: block;
        font-weight: 600;
        color: var(--fkt-text-dark);
        margin-bottom: 10px;
    }
    
    .fkt-form-input {
        width: 100%;
        padding: 14px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        font-size: 1rem;
        transition: var(--transition);
    }
    
    .fkt-form-input:focus {
        outline: none;
        border-color: var(--fkt-primary);
        box-shadow: 0 0 0 4px rgba(184, 12, 12, 0.1);
    }
    
    .fkt-payment-info {
        background: linear-gradient(135deg, var(--fkt-light-bg), #fff);
        border: 2px solid var(--fkt-primary);
        border-radius: 16px;
        padding: 20px;
        margin: 25px 0;
        display: flex;
        align-items: center;
        gap: 16px;
    }
    
    .fkt-payment-icon {
        font-size: 32px;
    }
    
    .fkt-payment-text {
        flex: 1;
    }
    
    .fkt-payment-text strong {
        color: var(--fkt-text-dark);
        font-size: 1.1rem;
    }
    
    .fkt-payment-text span {
        color: var(--fkt-gray);
        font-size: 0.95rem;
        display: block;
        margin-top: 4px;
    }
    
    .fkt-btn-order {
        width: 100%;
        background: linear-gradient(135deg, var(--fkt-primary), var(--fkt-secondary));
        color: white;
        border: none;
        padding: 18px 30px;
        border-radius: 50px;
        font-size: 1.2rem;
        font-weight: 800;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 20px rgba(184, 12, 12, 0.3);
    }
    
    .fkt-btn-order:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(184, 12, 12, 0.45);
    }
    
    @media (max-width: 768px) {
        .fkt-cart-header h2 {
            font-size: 1.6rem;
        }
        
        .fkt-product-cell {
            flex-direction: column;
            text-align: center;
        }
        
        .fkt-product-image {
            width: 60px;
            height: 60px;
        }
        
        .fkt-cart-table th,
        .fkt-cart-table td {
            padding: 12px 8px;
            font-size: 0.9rem;
        }
        
        .fkt-quantity-form {
            flex-direction: column;
        }
        
        .fkt-total-amount {
            font-size: 1.4rem !important;
        }
    }
</style>

<div class="fkt-cart-container">
    <!-- Header -->
    <div class="fkt-cart-header">
        <h2><i class="fas fa-shopping-cart me-3"></i>Giỏ hàng KFT</h2>
        <p>Thưởng thức ngay những món ngon từ KFT!</p>
    </div>

    @if($cartItems->isEmpty())
        <!-- Empty Cart -->
        <div class="fkt-empty-cart">
            <div class="fkt-empty-cart-icon">
                <i class="fas fa-drumstick-bite"></i>
            </div>
            <h3>Giỏ hàng của bạn đang trống</h3>
            <p>Hãy thêm những món ngon từ KFT vào giỏ hàng ngay nhé!</p>
            <a href="{{ route('home') }}" class="fkt-btn-shop">
                Khám phá menu KFT
            </a>
        </div>
    @else
        <!-- Cart Table -->
        <div class="fkt-cart-table-wrapper">
            <table class="fkt-cart-table">
                <thead>
                    <tr>
                        <th style="width: 35%;">Sản phẩm</th>
                        <th style="width: 15%;">Đơn giá</th>
                        <th style="width: 25%;">Số lượng</th>
                        <th style="width: 15%;">Thành tiền</th>
                        <th style="width: 10%;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cartItems as $item)
                        @php $subtotal = $item->product->price * $item->quantity; $total += $subtotal; @endphp
                        <tr>
                            <td>
                                <div class="fkt-product-cell">
                                    @if($item->product->image)
                                        <img src="{{ $item->product->image }}" 
                                             alt="{{ $item->product->name }}" 
                                             class="fkt-product-image">
                                    @else
                                        <div class="fkt-product-image" style="background: linear-gradient(135deg, var(--fkt-primary), var(--fkt-secondary)); display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-drumstick-bite" style="color: white; font-size: 1.5rem;"></i>
                                        </div>
                                    @endif
                                    <span class="fkt-product-name">{{ $item->product->name }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="fkt-price">{{ number_format($item->product->price, 0, ',', '.') }} VNĐ</span>
                            </td>
                            <td>
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="fkt-quantity-form">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="fkt-quantity-input" required>
                                    <button type="submit" class="fkt-btn-update">Cập nhật</button>
                                </form>
                            </td>
                            <td>
                                <span class="fkt-subtotal">{{ number_format($subtotal, 0, ',', '.') }} VNĐ</span>
                            </td>
                            <td>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="fkt-btn-delete" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                        <i class="fas fa-trash-alt"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Tổng cộng:</th>
                        <th colspan="2">
                            <span class="fkt-total-amount">{{ number_format($total, 0, ',', '.') }} VNĐ</span>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Checkout Form -->
        <div class="fkt-checkout-section">
            <h3 class="fkt-checkout-title">
                <i class="fas fa-clipboard-list"></i> Thông tin đặt hàng
            </h3>
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="fkt-form-group">
                    <label class="fkt-form-label">Địa chỉ giao hàng *</label>
                    <input type="text" name="shipping_address" class="fkt-form-input" placeholder="Nhập địa chỉ giao hàng..." required>
                </div>
                <div class="fkt-form-group">
                    <label class="fkt-form-label">Số điện thoại *</label>
                    <input type="text" name="shipping_phone" class="fkt-form-input" placeholder="Nhập số điện thoại..." required>
                </div>
                <div class="fkt-form-group">
                    <label class="fkt-form-label">Ghi chú đơn hàng</label>
                    <textarea name="notes" class="fkt-form-input" rows="3" placeholder="Ghi chú thêm cho đơn hàng..."></textarea>
                </div>
                
                <div class="fkt-payment-info">
                    <span class="fkt-payment-icon"><i class="fas fa-money-bill-wave"></i></span>
                    <div class="fkt-payment-text">
                        <strong>Thanh toán khi nhận hàng (COD)</strong>
                        <span>Bạn sẽ thanh toán khi nhận được đơn hàng từ KFT</span>
                    </div>
                </div>
                
                <button type="submit" class="fkt-btn-order">
                    <i class="fas fa-check-circle"></i>
                    Đặt hàng ngay
                </button>
            </form>
        </div>
    @endif
</div>
@endsection
