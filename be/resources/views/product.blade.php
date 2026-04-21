@extends('layouts.main')

@section('title', $product->name)

@section('content')
<style>
    /* =====================================================
       PRODUCT DETAIL - FKT Theme
       ===================================================== */
    .product-detail-container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 30px 20px;
    }
    
    .product-card-fkt {
        background: var(--fkt-white);
        border-radius: 20px;
        box-shadow: var(--shadow-md);
        overflow: hidden;
    }
    
    .product-image-section {
        padding: 40px;
        background: linear-gradient(135deg, var(--fkt-light-bg) 0%, var(--fkt-white) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .product-main-image {
        width: 100%;
        max-width: 400px;
        height: 400px;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(184, 12, 12, 0.15);
        transition: var(--transition);
    }
    
    .product-main-image:hover {
        transform: scale(1.02);
    }
    
    .product-placeholder {
        width: 100%;
        max-width: 400px;
        height: 400px;
        background: linear-gradient(135deg, var(--fkt-primary), var(--fkt-secondary));
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 30px rgba(184, 12, 12, 0.3);
    }
    
    .product-placeholder i {
        font-size: 8rem;
        color: white;
    }
    
    /* Thumbnails */
    .product-thumbnails {
        display: flex;
        gap: 10px;
        margin-top: 15px;
        justify-content: center;
    }
    
    .thumbnail {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 10px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: var(--transition);
    }
    
    .thumbnail:hover, .thumbnail.active {
        border-color: var(--fkt-primary);
    }
    
    .product-info-section {
        padding: 40px;
    }
    
    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--fkt-gray);
        text-decoration: none;
        font-weight: 500;
        padding: 8px 16px;
        border-radius: 50px;
        background: var(--fkt-gray-light);
        transition: var(--transition);
        margin-bottom: 20px;
    }
    
    .back-btn:hover {
        background: var(--fkt-primary);
        color: var(--fkt-white);
    }
    
    .product-name {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--fkt-text-dark);
        margin-bottom: 12px;
        line-height: 1.2;
    }
    
    .product-category {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--fkt-light-bg);
        color: var(--fkt-primary);
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .product-price {
        font-size: 2.5rem;
        font-weight: 900;
        color: var(--fkt-primary);
        margin-bottom: 24px;
    }
    
    .product-price .currency {
        font-size: 1.5rem;
        font-weight: 600;
    }
    
    .product-description {
        color: var(--fkt-gray);
        line-height: 1.8;
        font-size: 1.05rem;
        margin-bottom: 30px;
        padding: 24px;
        background: var(--fkt-gray-light);
        border-radius: 16px;
        border-left: 4px solid var(--fkt-primary);
    }
    
    /* Quantity Selector */
    .quantity-selector {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 30px;
    }
    
    .quantity-label {
        font-weight: 600;
        color: var(--fkt-text-dark);
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .quantity-input-group {
        display: flex;
        align-items: center;
        background: var(--fkt-gray-light);
        border-radius: 50px;
        overflow: hidden;
    }
    
    .quantity-btn {
        width: 48px;
        height: 48px;
        border: none;
        background: var(--fkt-primary);
        color: white;
        font-size: 1.4rem;
        font-weight: bold;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .quantity-btn:hover {
        background: var(--fkt-secondary);
    }
    
    .quantity-btn:active {
        transform: scale(0.95);
    }
    
    .quantity-input {
        width: 70px;
        height: 48px;
        border: none;
        background: transparent;
        text-align: center;
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--fkt-text-dark);
    }
    
    .quantity-input:focus {
        outline: none;
    }
    
    .add-to-cart-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        background: linear-gradient(135deg, var(--fkt-primary), var(--fkt-secondary));
        color: white;
        border: none;
        padding: 18px 48px;
        font-size: 1.1rem;
        font-weight: 700;
        border-radius: 50px;
        cursor: pointer;
        transition: var(--transition);
        box-shadow: 0 4px 20px rgba(184, 12, 12, 0.35);
        width: 100%;
        max-width: 320px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .add-to-cart-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(184, 12, 12, 0.45);
    }
    
    .add-to-cart-btn i {
        font-size: 1.3rem;
    }
    
    .login-alert {
        background: #fff8e6;
        border: 1px solid #ffc107;
        border-radius: 16px;
        padding: 20px 24px;
        display: flex;
        align-items: center;
        gap: 16px;
    }
    
    .login-alert i {
        color: #ffc107;
        font-size: 1.8rem;
    }
    
    .login-alert a {
        color: var(--fkt-primary);
        font-weight: 700;
        text-decoration: none;
    }
    
    .login-alert a:hover {
        text-decoration: underline;
    }
    
    /* Breadcrumb */
    .breadcrumb-custom {
        background: transparent;
        padding: 0;
        margin-bottom: 25px;
    }
    
    .breadcrumb-custom .breadcrumb-item {
        font-size: 0.95rem;
    }
    
    .breadcrumb-custom .breadcrumb-item a {
        color: var(--fkt-gray);
        text-decoration: none;
        transition: var(--transition);
    }
    
    .breadcrumb-custom .breadcrumb-item a:hover {
        color: var(--fkt-primary);
    }
    
    .breadcrumb-custom .breadcrumb-item.active {
        color: var(--fkt-primary);
        font-weight: 600;
    }
    
    .breadcrumb-custom .breadcrumb-item + .breadcrumb-item::before {
        content: "\f105";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        color: var(--fkt-gray);
    }
    
    /* Related Products */
    .related-products {
        margin-top: 60px;
    }
    
    .related-title {
        font-size: 1.6rem;
        font-weight: 800;
        color: var(--fkt-text-dark);
        margin-bottom: 30px;
        position: relative;
        display: inline-block;
    }
    
    .related-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60px;
        height: 4px;
        background: var(--fkt-primary);
        border-radius: 2px;
    }
    
    .related-card {
        background: var(--fkt-white);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }
    
    .related-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
    }
    
    .related-card img {
        width: 100%;
        height: 160px;
        object-fit: cover;
    }
    
    .related-card-body {
        padding: 16px;
    }
    
    .related-card-title {
        font-weight: 700;
        color: var(--fkt-text-dark);
        font-size: 1rem;
        margin-bottom: 8px;
    }
    
    .related-card-price {
        color: var(--fkt-primary);
        font-weight: 800;
        font-size: 1.1rem;
    }
    
    @media (max-width: 768px) {
        .product-main-image, .product-placeholder {
            max-width: 100%;
            height: 280px;
        }
        
        .product-name {
            font-size: 1.6rem;
        }
        
        .product-price {
            font-size: 2rem;
        }
        
        .product-info-section {
            padding: 24px;
        }
        
        .thumbnail {
            width: 55px;
            height: 55px;
        }
    }
</style>

<div class="product-detail-container">
    <nav aria-label="breadcrumb" class="breadcrumb-custom">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home me-1"></i>Trang chủ</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="product-card-fkt">
        <div class="row g-0">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-lg-6">
                <div class="product-image-section">
                    @if($product->image)
                        <img src="{{ $product->image }}" class="product-main-image" alt="{{ $product->name }}" id="mainImage">
                    @else
                        <div class="product-placeholder">
                            <i class="fas fa-drumstick-bite"></i>
                        </div>
                    @endif
                </div>
                <!-- Thumbnails nếu có -->
                @if($product->image)
                <div class="product-thumbnails">
                    <img src="{{ $product->image }}" class="thumbnail active" onclick="changeImage(this)" alt="Thumbnail">
                    <img src="{{ $product->image }}" class="thumbnail" onclick="changeImage(this)" alt="Thumbnail">
                    <img src="{{ $product->image }}" class="thumbnail" onclick="changeImage(this)" alt="Thumbnail">
                </div>
                @endif
            </div>
            
            <!-- Thông tin sản phẩm -->
            <div class="col-lg-6">
                <div class="product-info-section">
                    <a href="{{ route('home') }}" class="back-btn">
                        <i class="fas fa-arrow-left"></i>
                        Quay lại
                    </a>
                    
                    <h1 class="product-name">{{ $product->name }}</h1>
                    
                    <span class="product-category">
                        <i class="fas fa-tag"></i> {{ $product->category->name }}
                    </span>
                    
                    <div class="product-price">
                        <span class="currency">₫</span>{{ number_format($product->price, 0, ',', '.') }}
                    </div>
                    
                    <div class="product-description">
                        {{ $product->description }}
                    </div>
                    
                    @auth
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            
                            <div class="quantity-selector">
                                <span class="quantity-label">Số lượng:</span>
                                <div class="quantity-input-group">
                                    <button type="button" class="quantity-btn" onclick="decreaseQty()">−</button>
                                    <input type="number" name="quantity" id="quantity" value="1" min="1" class="quantity-input" readonly>
                                    <button type="button" class="quantity-btn" onclick="increaseQty()">+</button>
                                </div>
                            </div>
                            
                            <button type="submit" class="add-to-cart-btn">
                                <i class="fas fa-cart-plus"></i>
                                Thêm vào giỏ hàng
                            </button>
                        </form>
                    @else
                        <div class="login-alert">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để đặt hàng!</span>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    
    <!-- Related Products -->
    @php
        $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();
    @endphp
    
    @if($relatedProducts->count() > 0)
    <div class="related-products">
        <h3 class="related-title">Sản Phẩm Liên Quan</h3>
        <div class="row g-4">
            @foreach($relatedProducts as $related)
                <div class="col-6 col-md-3">
                    <a href="{{ route('product.show', $related->id) }}" class="text-decoration-none">
                        <div class="related-card">
                            @if($related->image)
                                <img src="{{ $related->image }}" alt="{{ $related->name }}">
                            @else
                                <div style="height: 160px; background: linear-gradient(135deg, var(--fkt-primary), var(--fkt-secondary)); display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-drumstick-bite" style="font-size: 3rem; color: white;"></i>
                                </div>
                            @endif
                            <div class="related-card-body">
                                <h5 class="related-card-title">{{ $related->name }}</h5>
                                <div class="related-card-price">
                                    {{ number_format($related->price, 0, ',', '.') }} VNĐ
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

<script>
    function increaseQty() {
        const input = document.getElementById('quantity');
        input.value = parseInt(input.value) + 1;
    }
    
    function decreaseQty() {
        const input = document.getElementById('quantity');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
    
    function changeImage(thumbnail) {
        const mainImage = document.getElementById('mainImage');
        if (mainImage) {
            mainImage.src = thumbnail.src;
            document.querySelectorAll('.thumbnail').forEach(t => t.classList.remove('active'));
            thumbnail.classList.add('active');
        }
    }
</script>
@endsection
