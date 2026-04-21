@extends('layouts.main')

@section('title', 'KFT - Trang chủ')

@section('content')
<style>
    /* =====================================================
       HERO SLIDER - FKT Theme
       ===================================================== */
    .hero-slider {
        position: relative;
        background: linear-gradient(135deg, var(--fkt-primary) 0%, var(--fkt-secondary) 100%);
        padding: 0;
        overflow: hidden;
    }

    .swiper {
        width: 100%;
        height: 500px;
    }

    .swiper-slide {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .slide-content {
        text-align: center;
        color: white;
        padding: 20px;
        max-width: 800px;
    }

    .slide-content h1 {
        font-size: 3.5rem;
        font-weight: 900;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .slide-content p {
        font-size: 1.3rem;
        opacity: 0.95;
        margin-bottom: 30px;
    }

    .slide-icon {
        font-size: 8rem;
        color: rgba(255,255,255,0.9);
        margin-bottom: 20px;
    }

    .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background: white;
        opacity: 0.5;
    }

    .swiper-pagination-bullet-active {
        opacity: 1;
    }

    /* =====================================================
       ABOUT SECTION - FKT Theme
       ===================================================== */
    .about-section {
        padding: 80px 0;
        background: var(--fkt-white);
    }

    .about-image {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
    }

    .about-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .about-content h2 {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--fkt-text-dark);
        margin-bottom: 20px;
    }

    .about-content h2 span {
        color: var(--fkt-primary);
    }

    .about-content p {
        color: var(--fkt-gray);
        margin-bottom: 20px;
        line-height: 1.8;
    }

    .about-features {
        list-style: none;
        padding: 0;
    }

    .about-features li {
        padding: 10px 0;
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 500;
    }

    .about-features li i {
        color: var(--fkt-success);
        font-size: 1.2rem;
    }

    /* =====================================================
       COUNTER SECTION - FKT Theme
       ===================================================== */
    .counter-section {
        background: linear-gradient(135deg, var(--fkt-primary) 0%, var(--fkt-secondary) 100%);
        padding: 70px 0;
        color: var(--fkt-white);
    }

    .counter-item {
        text-align: center;
    }

    .counter-icon {
        width: 80px;
        height: 80px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2rem;
    }

    .counter-number {
        font-size: 3rem;
        font-weight: 900;
        line-height: 1;
        margin-bottom: 8px;
    }

    .counter-label {
        font-size: 1rem;
        opacity: 0.95;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* =====================================================
       CATEGORIES SECTION - FKT Theme
       ===================================================== */
    .category-card {
        background: var(--fkt-white);
        border-radius: 20px;
        padding: 30px;
        text-align: center;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        cursor: pointer;
        border: 2px solid transparent;
    }

    .category-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: var(--shadow-lg);
        border-color: var(--fkt-primary);
    }

    .category-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--fkt-primary), var(--fkt-secondary));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        font-size: 2rem;
        color: var(--fkt-white);
    }

    .category-name {
        font-weight: 700;
        color: var(--fkt-text-dark);
        font-size: 1.1rem;
    }

    /* =====================================================
       PRODUCTS SECTION - FKT Theme
       ===================================================== */
    .products-section {
        padding: 80px 0;
        background: var(--fkt-light-bg);
    }

    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-header h2 {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--fkt-primary);
        position: relative;
        display: inline-block;
    }

    .section-header h2::after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--fkt-primary), var(--fkt-secondary));
        border-radius: 2px;
    }

    .product-card-fkt {
        background: var(--fkt-white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        border: 1px solid #f0f0f0;
    }

    .product-card-fkt:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
    }

    .product-image-wrapper {
        position: relative;
        overflow: hidden;
        padding-top: 75%;
        background: #f8f9fa;
    }

    .product-image-wrapper img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .product-card-fkt:hover .product-image-wrapper img {
        transform: scale(1.1);
    }

    .product-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--fkt-primary);
        color: var(--fkt-white);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .product-body {
        padding: 20px;
    }

    .product-name {
        font-weight: 700;
        color: var(--fkt-text-dark);
        font-size: 1.1rem;
        margin-bottom: 8px;
    }

    .product-description {
        color: var(--fkt-gray);
        font-size: 0.85rem;
        margin-bottom: 15px;
        line-height: 1.5;
    }

    .product-price {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--fkt-primary);
        margin-bottom: 15px;
    }

    .product-price span {
        font-size: 0.9rem;
        color: #999;
        text-decoration: line-through;
        font-weight: 400;
        margin-left: 8px;
    }

    .btn-add-cart {
        width: 100%;
        background: var(--fkt-primary);
        color: var(--fkt-white);
        border: none;
        padding: 12px 20px;
        border-radius: 50px;
        font-weight: 600;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-add-cart:hover {
        background: var(--fkt-secondary);
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(184, 12, 12, 0.4);
        color: var(--fkt-white);
    }

    /* =====================================================
       CATEGORY TITLE - FKT Theme
       ===================================================== */
    .category-section {
        margin-bottom: 60px;
    }

    .category-title {
        font-size: 1.6rem;
        font-weight: 700;
        color: var(--fkt-text-dark);
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 3px solid var(--fkt-primary);
        display: inline-block;
    }

    /* =====================================================
       CONSULTATION FORM - FKT Theme
       ===================================================== */
    .consultation-section {
        padding: 80px 0;
        background: linear-gradient(135deg, var(--fkt-primary) 0%, var(--fkt-secondary) 100%);
    }

    .consultation-section h2 {
        color: var(--fkt-white);
        font-weight: 800;
        margin-bottom: 15px;
    }

    .consultation-section p {
        color: rgba(255,255,255,0.9);
        margin-bottom: 30px;
    }

    .consultation-form {
        background: var(--fkt-white);
        padding: 40px;
        border-radius: 20px;
        box-shadow: var(--shadow-lg);
    }

    .consultation-form .form-control {
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        padding: 14px 18px;
        font-size: 1rem;
        transition: var(--transition);
    }

    .consultation-form .form-control:focus {
        border-color: var(--fkt-primary);
        box-shadow: 0 0 0 3px rgba(184, 12, 12, 0.1);
    }

    .consultation-form .btn-submit {
        background: var(--fkt-primary);
        color: var(--fkt-white);
        border: none;
        padding: 14px 36px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: var(--transition);
    }

    .consultation-form .btn-submit:hover {
        background: var(--fkt-secondary);
        transform: translateY(-2px);
    }

    /* =====================================================
       RESPONSIVE
       ===================================================== */
    @media (max-width: 768px) {
        .slide-content h1 {
            font-size: 2rem;
        }

        .slide-content p {
            font-size: 1rem;
        }

        .swiper {
            height: 400px;
        }

        .about-section {
            padding: 50px 0;
        }

        .counter-number {
            font-size: 2rem;
        }

        .section-header h2 {
            font-size: 1.6rem;
        }
    }
</style>

<!-- Hero Slider -->
<div class="hero-slider mb-5">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slide-content">
                    <div class="slide-icon">
                        <i class="fas fa-drumstick-bite"></i>
                    </div>
                    <h1>Đặt Món Ngay - Giao Hàng Nhanh Chóng</h1>
                    <p>Thưởng thức món ăn ngon nhất từ KFT với giao hàng tận nơi nhanh chóng</p>
                    <a href="#categories" class="btn btn-hero">
                        <i class="fas fa-arrow-down me-2"></i>Khám Phá Ngay
                    </a>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-content">
                    <div class="slide-icon">
                        <i class="fas fa-percent"></i>
                    </div>
                    <h1>Khuyến Mãi Hấp Dẫn</h1>
                    <p>Nhiều ưu đãi đặc biệt dành riêng cho khách hàng thân thiết</p>
                    <a href="#products" class="btn btn-hero">
                        <i class="fas fa-shopping-bag me-2"></i>Xem Ngay
                    </a>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-content">
                    <div class="slide-icon">
                        <i class="fas fa-truck-fast"></i>
                    </div>
                    <h1>Giao Hàng Toàn Quốc</h1>
                    <p>Miễn phí giao hàng tận nơi với đơn hàng từ 200.000đ</p>
                    <a href="#products" class="btn btn-hero">
                        <i class="fas fa-phone me-2"></i>Liên Hệ Ngay
                    </a>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<!-- About Section -->
<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1567620832903-9fc6debc209f?w=600&h=400&fit=crop" alt="Giới thiệu KFT">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <h2>Chào Mừng Đến Với <span>KFT</span></h2>
                    <p>KFT tự hào là thương hiệu gà rán hàng đầu Việt Nam, mang đến cho khách hàng những món ăn chất lượng nhất với hương vị đặc trưng không thể quên.</p>
                    <p>Với nhiều năm kinh nghiệm trong ngành F&B, chúng tôi cam kết mang đến:</p>
                    <ul class="about-features">
                        <li><i class="fas fa-check-circle"></i> 100% Gà tươi, không hóa chất</li>
                        <li><i class="fas fa-check-circle"></i> Công thức gia truyền độc quyền</li>
                        <li><i class="fas fa-check-circle"></i> Giao hàng nhanh chóng trong 30 phút</li>
                        <li><i class="fas fa-check-circle"></i> Đội ngũ nhân viên chuyên nghiệp</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<div id="products" class="products-section">
    <div class="container">
        <div class="section-header">
            <h2>Món Ăn Nổi Bật</h2>
        </div>
        
        @if($categories->isEmpty())
            <div class="alert alert-fkt-info text-center">
                <i class="fas fa-info-circle me-2"></i>Chưa có sản phẩm nào!
            </div>
        @else
            @foreach($categories as $category)
                <div class="category-section">
                    <h3 class="category-title">{{ $category->name }}</h3>
                    
                    @if($category->products->isEmpty())
                        <p class="text-muted text-center">Chưa có sản phẩm trong danh mục này.</p>
                    @else
                        <div class="row g-4">
                            @foreach($category->products as $product)
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="product-card-fkt">
                                        <div class="product-image-wrapper">
                                            @if($product->image)
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center h-100" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                                    <i class="fas fa-drumstick-bite" style="font-size: 4rem; color: var(--fkt-primary);"></i>
                                                </div>
                                            @endif
                                            <div class="product-badge">Mới</div>
                                        </div>
                                        <div class="product-body">
                                            <h5 class="product-name">{{ $product->name }}</h5>
                                            <p class="product-description">{{ Str::limit($product->description, 60) }}</p>
                                            <div class="product-price">
                                                {{ number_format($product->price, 0, ',', '.') }} VNĐ
                                            </div>
                                            @auth
                                                <form action="{{ route('cart.add.ajax') }}" method="POST" class="add-to-cart-form" data-product-id="{{ $product->id }}">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <button type="submit" class="btn btn-add-cart">
                                                        <i class="fas fa-cart-plus"></i>
                                                        Thêm vào giỏ
                                                    </button>
                                                </form>
                                            @else
                                                <a href="{{ route('login') }}" class="btn btn-add-cart">
                                                    <i class="fas fa-sign-in-alt"></i>
                                                    Đăng nhập để mua
                                                </a>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
</div>

<!-- Initialize Swiper -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.mySwiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            }
        });
        
        // Handle Add to Cart form submission with AJAX
        const addToCartForms = document.querySelectorAll('.add-to-cart-form');
        addToCartForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalBtnContent = submitBtn.innerHTML;
                
                // Disable button during request
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang thêm...';
                
                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success toast
                        showToast(data.message, 'success');
                        
                        // Update cart count in navbar if exists
                        const cartBadge = document.querySelector('.cart-badge');
                        if (cartBadge) {
                            let cartCountSpan = cartBadge.querySelector('.cart-count');
                            if (data.cart_count > 0) {
                                if (cartCountSpan) {
                                    cartCountSpan.textContent = data.cart_count;
                                } else {
                                    // Create new cart count span if not exists
                                    cartCountSpan = document.createElement('span');
                                    cartCountSpan.className = 'cart-count';
                                    cartCountSpan.textContent = data.cart_count;
                                    cartBadge.appendChild(cartCountSpan);
                                }
                            } else {
                                // Remove cart count if it's 0
                                if (cartCountSpan) {
                                    cartCountSpan.remove();
                                }
                            }
                        }
                    } else {
                        showToast(data.message || 'Có lỗi xảy ra', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Có lỗi xảy ra', 'error');
                })
                .finally(() => {
                    // Re-enable button
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnContent;
                });
            });
        });
        
        // Toast notification function
        function showToast(message, type = 'success') {
            // Create toast element
            const toast = document.createElement('div');
            toast.className = `toast-notification toast-${type}`;
            toast.innerHTML = `
                <div class="toast-content">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
                    <span>${message}</span>
                </div>
            `;
            
            // Add styles
            toast.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 9999;
                background: ${type === 'success' ? '#28a745' : '#dc3545'};
                color: white;
                padding: 15px 25px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                animation: slideIn 0.3s ease-out;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            `;
            
            // Add animation keyframes
            const style = document.createElement('style');
            style.textContent = `
                @keyframes slideIn {
                    from {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                    to {
                        transform: translateX(0);
                        opacity: 1;
                    }
                }
                @keyframes slideOut {
                    from {
                        transform: translateX(0);
                        opacity: 1;
                    }
                    to {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                }
            `;
            if (!document.querySelector('style[data-toast-styles]')) {
                style.setAttribute('data-toast-styles', 'true');
                document.head.appendChild(style);
            }
            
            document.body.appendChild(toast);
            
            // Auto remove after 3 seconds
            setTimeout(() => {
                toast.style.animation = 'slideOut 0.3s ease-out forwards';
                setTimeout(() => {
                    if (toast.parentNode) {
                        toast.parentNode.removeChild(toast);
                    }
                }, 300);
            }, 3000);
        }
    });
</script>
@endsection
