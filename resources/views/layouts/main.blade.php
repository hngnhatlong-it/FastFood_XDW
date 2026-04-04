<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KFT Vietnam')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <style>
        /* =====================================================
           THEME FKT - GaranFKT Vietnam
           Color Palette: 
           - Primary: #b80c0c (đỏ)
           - Secondary: #eb2127
           - Success: #7a9c59
           - Alert: #b20000
           - Light BG: #fde9e9
           - Text dark: #444444
           
           Fonts:
           - Primary: 'Roboto', sans-serif
           - Accent: 'Dancing Script', cursive
           ===================================================== */

        /* CSS Variables - FKT Theme */
        :root {
            --fkt-primary: #b80c0c;
            --fkt-secondary: #eb2127;
            --fkt-success: #7a9c59;
            --fkt-alert: #b20000;
            --fkt-light-bg: #fde9e9;
            --fkt-text-dark: #444444;
            --fkt-white: #ffffff;
            --fkt-black: #1a1a1a;
            --fkt-gray-light: #f5f5f5;
            --fkt-gray: #666666;
            
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.08);
            --shadow-md: 0 4px 15px rgba(0,0,0,0.12);
            --shadow-lg: 0 10px 30px rgba(0,0,0,0.15);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #FAFAFA;
            color: var(--fkt-text-dark);
            line-height: 1.6;
        }

        /* =====================================================
           TOP BAR - FKT Theme
           ===================================================== */
        .top-bar {
            background: var(--fkt-black);
            color: var(--fkt-white);
            padding: 8px 0;
            font-size: 0.85rem;
        }

        .top-bar a {
            color: var(--fkt-white);
            text-decoration: none;
            transition: var(--transition);
        }

        .top-bar a:hover {
            color: var(--fkt-primary);
        }

        .top-bar .hotline {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .top-bar .hotline i {
            color: var(--fkt-primary);
        }

        /* =====================================================
           NAVBAR - FKT Theme
           ===================================================== */
        .navbar-fkt {
            background: var(--fkt-white);
            border-bottom: none;
            padding: 15px 0;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-fkt.scrolled {
            padding: 10px 0;
            box-shadow: var(--shadow-md);
        }

        .navbar-fkt .navbar-brand { 
            font-weight: 900; 
            color: var(--fkt-primary) !important;
            font-size: 1.8rem;
            letter-spacing: 1px;
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-fkt .navbar-brand:hover {
            color: var(--fkt-secondary) !important;
            transform: scale(1.02);
        }

        .navbar-fkt .navbar-brand .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--fkt-primary), var(--fkt-secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .navbar-fkt .navbar-brand .logo-text {
            font-family: 'Dancing Script', cursive;
            font-size: 2rem;
        }

        /* Navigation Links */
        .navbar-fkt .navbar-nav .nav-link {
            color: var(--fkt-text-dark) !important;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 10px 18px !important;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-radius: 8px;
            transition: var(--transition);
            position: relative;
        }

        .navbar-fkt .navbar-nav .nav-link:hover {
            color: var(--fkt-primary) !important;
            background: rgba(184, 12, 12, 0.08);
        }

        .navbar-fkt .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--fkt-primary);
            transition: var(--transition);
            transform: translateX(-50%);
        }

        .navbar-fkt .navbar-nav .nav-link:hover::after {
            width: 60%;
        }

        /* Cart Badge */
        .cart-badge {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: var(--fkt-primary);
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 10px;
            font-weight: 800;
            min-width: 18px;
            text-align: center;
            border: 2px solid white;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        /* =====================================================
           BUTTONS - FKT Theme
           ===================================================== */
        .btn-fkt-primary {
            background: var(--fkt-primary);
            border: none;
            color: var(--fkt-white);
            font-weight: 700;
            padding: 10px 24px;
            border-radius: 50px;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-fkt-primary:hover {
            background: var(--fkt-secondary);
            color: var(--fkt-white);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(184, 12, 12, 0.35);
        }

        .btn-fkt-outline {
            background: transparent;
            border: 2px solid var(--fkt-primary);
            color: var(--fkt-primary);
            font-weight: 700;
            padding: 8px 22px;
            border-radius: 50px;
            transition: var(--transition);
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-fkt-outline:hover {
            background: var(--fkt-primary);
            color: var(--fkt-white);
        }

        /* =====================================================
           DROPDOWN MENU - FKT Theme
           ===================================================== */
        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            padding: 12px;
            min-width: 200px;
        }

        .dropdown-item {
            border-radius: 8px;
            padding: 10px 16px;
            font-weight: 500;
            transition: var(--transition);
        }

        .dropdown-item:hover {
            background: rgba(184, 12, 12, 0.1);
            color: var(--fkt-primary);
        }

        .dropdown-item i {
            margin-right: 10px;
            color: var(--fkt-gray);
            width: 18px;
        }

        .dropdown-item:hover i {
            color: var(--fkt-primary);
        }

        /* =====================================================
           SECTION STYLES - FKT Theme
           ===================================================== */
        .section-padding {
            padding: 70px 0;
        }

        .section-title {
            color: var(--fkt-text-dark);
            font-weight: 800;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
            text-transform: uppercase;
            font-size: 1.6rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--fkt-primary);
            border-radius: 2px;
        }

        .section-subtitle {
            color: var(--fkt-gray);
            font-size: 1.05rem;
            margin-bottom: 40px;
        }

        /* =====================================================
           PRODUCT CARD - FKT Theme
           ===================================================== */
        .product-card-fkt { 
            transition: var(--transition);
            border: none;
            border-radius: 16px;
            overflow: hidden;
            background: var(--fkt-white);
            box-shadow: var(--shadow-sm);
        }

        .product-card-fkt:hover { 
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .product-card-fkt .card-img-top {
            height: 200px;
            object-fit: cover;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .product-card-fkt .card-body {
            padding: 20px;
        }

        .product-card-fkt .card-title {
            font-weight: 700;
            color: var(--fkt-text-dark);
            font-size: 1.1rem;
            margin-bottom: 8px;
        }

        .product-card-fkt .price {
            color: var(--fkt-primary);
            font-weight: 800;
            font-size: 1.3rem;
            margin-bottom: 12px;
            display: block;
        }

        .product-card-fkt .btn-add-cart {
            width: 100%;
            background: var(--fkt-primary);
            border: none;
            color: var(--fkt-white);
            font-weight: 700;
            padding: 12px;
            border-radius: 50px;
            transition: var(--transition);
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .product-card-fkt .btn-add-cart:hover {
            background: var(--fkt-secondary);
            color: var(--fkt-white);
        }

        /* =====================================================
           COUNTER/STATISTICS - FKT Theme
           ===================================================== */
        .counter-section {
            background: linear-gradient(135deg, var(--fkt-primary) 0%, var(--fkt-secondary) 100%);
            padding: 60px 0;
            color: var(--fkt-white);
        }

        .counter-item {
            text-align: center;
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
           FOOTER - FKT Theme
           ===================================================== */
        .footer-fkt { 
            background: var(--fkt-black); 
            color: var(--fkt-white); 
            padding: 60px 0 30px; 
            margin-top: 60px;
        }

        .footer-fkt h5 {
            color: var(--fkt-primary);
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-fkt h5 i {
            margin-right: 10px;
        }

        .footer-fkt p {
            color: #aaa;
            margin-bottom: 10px;
            font-size: 0.95rem;
        }

        .footer-fkt a {
            color: #aaa;
            text-decoration: none;
            transition: var(--transition);
            display: block;
            padding: 5px 0;
        }

        .footer-fkt a:hover {
            color: var(--fkt-primary);
            padding-left: 8px;
        }

        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            margin-right: 10px;
            font-size: 1.1rem;
            transition: var(--transition);
        }

        .footer-social a:hover {
            background: var(--fkt-primary);
            color: var(--fkt-white);
            transform: translateY(-3px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 25px;
            margin-top: 30px;
            text-align: center;
        }

        .footer-bottom p {
            margin: 0;
            font-size: 0.9rem;
        }

        /* =====================================================
           ALERTS - FKT Theme
           ===================================================== */
        .alert-fkt {
            border: none;
            border-radius: 12px;
            padding: 16px 20px;
            font-weight: 500;
        }

        .alert-fkt-success {
            background: #d4edda;
            color: #155724;
            border-left: 4px solid var(--fkt-success);
        }

        .alert-fkt-danger {
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid var(--fkt-alert);
        }

        /* =====================================================
           NAVBAR TOGGLER
           ===================================================== */
        .navbar-toggler {
            border: none;
            padding: 8px 12px;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler-icon {
            background-image: none;
            position: relative;
            width: 24px;
            height: 2px;
            background: var(--fkt-text-dark);
            display: block;
            transition: var(--transition);
        }

        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 2px;
            background: var(--fkt-text-dark);
            left: 0;
            transition: var(--transition);
        }

        .navbar-toggler-icon::before {
            top: -8px;
        }

        .navbar-toggler-icon::after {
            top: 8px;
        }

        /* =====================================================
           RESPONSIVE
           ===================================================== */
        @media (max-width: 991px) {
            .navbar-collapse {
                background: var(--fkt-white);
                padding: 20px;
                border-radius: 12px;
                box-shadow: var(--shadow-md);
                margin-top: 10px;
            }

            .product-card-fkt .card-img-top {
                height: 180px;
            }
        }

        @media (max-width: 576px) {
            .navbar-fkt .navbar-brand .logo-text {
                font-size: 1.6rem;
            }

            .section-title {
                font-size: 1.4rem;
            }

            .footer-fkt {
                padding: 40px 0 20px;
            }
            
            .counter-number {
                font-size: 2rem;
            }
        }

        /* =====================================================
           ANIMATION CLASSES
           ===================================================== */
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .slide-up {
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--fkt-primary) 0%, var(--fkt-secondary) 100%);
            color: var(--fkt-white);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 20px;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .hero-section p {
            font-size: 1.2rem;
            opacity: 0.95;
            position: relative;
        }

        .btn-hero {
            background: var(--fkt-white);
            color: var(--fkt-primary);
            font-weight: 700;
            padding: 14px 36px;
            border-radius: 50px;
            font-size: 1rem;
            border: none;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-hero:hover {
            background: var(--fkt-light-bg);
            color: var(--fkt-primary);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <span class="me-4"><i class="fas fa-map-marker-alt me-2"></i>TP. Hồ Chí Minh, Việt Nam</span>
                    <span><i class="fas fa-envelope me-2"></i>contact@kft.vn</span>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="hotline">
                        <i class="fas fa-phone-alt"></i>
                        <span>Hotline: <a href="tel:1900xxxx">1900-xxxx</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header / Navigation -->
    <nav class="navbar-fkt navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <div class="logo-icon">
                    <i class="fas fa-drumstick-bite"></i>
                </div>
                <span class="logo-text">KFT</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i> Trang chủ
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center">
                    @auth
                        @php
                            $cartCount = \App\Models\CartItem::where('user_id', auth()->id())->sum('quantity');
                        @endphp
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart') }}">
                                <div class="cart-badge">
                                    <i class="fas fa-shopping-cart fs-5"></i>
                                    <span class="d-none d-md-inline">Giỏ hàng</span>
                                    @if($cartCount > 0)
                                        <span class="cart-count">{{ $cartCount }}</span>
                                    @endif
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('orders') }}">
                                <i class="fas fa-receipt me-1"></i> Đơn hàng
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle fs-5"></i>
                                <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @if(Auth::user()->isAdmin())
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                            <i class="fas fa-tachometer-alt"></i> Admin Panel
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="fas fa-user"></i> Hồ sơ
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt"></i> Đăng xuất
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i> Đăng nhập
                            </a>
                        </li>
                        <li class="nav-item ms-lg-2">
                            <a class="btn-fkt-primary btn-sm" href="{{ route('register') }}">
                                <i class="fas fa-user-plus"></i> Đăng ký
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        <div class="container">
            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert alert-fkt-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-fkt-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <!-- Page Content -->
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer-fkt">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <h5><i class="fas fa-drumstick-bite"></i> KFT Vietnam</h5>
                    <p>Thưởng thức gà giòn ngon nhất Việt Nam</p>
                    <p><i class="fas fa-map-marker-alt me-2"></i>TP. Hồ Chí Minh, Việt Nam</p>
                    <p><i class="fas fa-phone-alt me-2"></i>1900-xxxx</p>
                    <p><i class="fas fa-envelope me-2"></i>contact@kft.vn</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <h5><i class="fas fa-link"></i> Liên kết nhanh</h5>
                    <a href="{{ route('home') }}"><i class="fas fa-chevron-right me-2"></i>Trang chủ</a>
                    <a href="{{ route('orders') }}"><i class="fas fa-chevron-right me-2"></i>Đơn hàng của tôi</a>
                    <a href="{{ route('cart') }}"><i class="fas fa-chevron-right me-2"></i>Giỏ hàng</a>
                    <a href="#"><i class="fas fa-chevron-right me-2"></i>Chính sách bảo hành</a>
                </div>
                <div class="col-lg-4 col-md-12">
                    <h5><i class="fas fa-share-alt"></i> Theo dõi chúng tôi</h5>
                    <p>Theo dõi KFT Vietnam để cập nhật những ưu đãi mới nhất!</p>
                    <div class="footer-social">
                        <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="#" title="Zalo"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 KFT Vietnam. All rights reserved. Made with <i class="fas fa-heart text-danger"></i></p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Sticky Header Effect
        const navbar = document.getElementById('mainNav');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Auto-dismiss alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });
    </script>
</body>
</html>
