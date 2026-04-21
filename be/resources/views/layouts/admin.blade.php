<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - KFT')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --kft-red: #E4002B;
            --kft-dark-red: #C40024;
            --kft-white: #FFFFFF;
            --kft-black: #1A1A1A;
            --kft-gray: #F5F5F5;
            --sidebar-width: 260px;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #F8F9FA;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--kft-black);
            padding-top: 0;
            z-index: 1000;
            overflow-y: auto;
        }
        .sidebar-brand {
            padding: 20px;
            background: var(--kft-red);
            text-align: center;
        }
        .sidebar-brand h4 {
            color: white;
            margin: 0;
            font-weight: 900;
            font-size: 1.5rem;
        }
        .sidebar-brand span {
            color: rgba(255,255,255,0.8);
            font-size: 0.8rem;
        }
        .sidebar-menu {
            padding: 15px 0;
        }
        .sidebar-menu .menu-header {
            color: rgba(255,255,255,0.4);
            font-size: 0.75rem;
            text-transform: uppercase;
            padding: 15px 20px 5px;
            letter-spacing: 1px;
        }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: rgba(255,255,255,0.1);
            color: white;
            border-left-color: var(--kft-red);
        }
        .sidebar-menu a i {
            margin-right: 12px;
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
        }
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 0;
            min-height: 100vh;
        }
        .top-header {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .top-header h4 {
            margin: 0;
            color: var(--kft-black);
            font-weight: 700;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-info .user-name {
            font-weight: 500;
            color: var(--kft-black);
        }
        .stat-card {
            border: none;
            border-radius: 10px;
            padding: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 25px rgba(0,0,0,0.15);
        }
        .stat-card.primary {
            background: linear-gradient(135deg, var(--kft-red) 0%, var(--kft-dark-red) 100%);
            color: white;
        }
        .stat-card.success {
            background: linear-gradient(135deg, #27ae60 0%, #1e8449 100%);
            color: white;
        }
        .stat-card.danger {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
        }
        .stat-card.info {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
        }
        .stat-card .stat-icon {
            font-size: 2.5rem;
            opacity: 0.8;
        }
        .stat-card .stat-value {
            font-size: 2rem;
            font-weight: 700;
        }
        .stat-card .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        .content-area {
            padding: 30px;
        }
        .table-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            border: none;
        }
        .table-card .card-header {
            background: white;
            border-bottom: 2px solid #f0f0f0;
            padding: 20px 25px;
            font-weight: 600;
            color: var(--kft-black);
            font-size: 1.1rem;
        }
        .table-card .card-body {
            padding: 0;
        }
        .table thead th {
            background: #f8f9fa;
            border: none;
            color: var(--kft-black);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            padding: 15px 20px;
        }
        .table td {
            padding: 15px 20px;
            vertical-align: middle;
            border-color: #f0f0f0;
        }
        .btn-admin {
            background: var(--kft-red);
            color: white;
            border: none;
            padding: 8px 20px;
            font-weight: 500;
            font-size: 0.85rem;
            border-radius: 5px;
        }
        .btn-admin:hover {
            background: var(--kft-dark-red);
            color: white;
        }
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .status-badge.pending {
            background: #ffeaa7;
            color: #d63031;
        }
        .status-badge.completed {
            background: #55efc4;
            color: #00b894;
        }
        .status-badge.cancelled {
            background: #fab1a0;
            color: #c23616;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h4><i class="bi bi-bucket"></i> KFT</h4>
            <span>Admin Panel</span>
        </div>
        <div class="sidebar-menu">
            <div class="menu-header">Tổng quan</div>
            <a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            
            <div class="menu-header">Quản lý</div>
            <a href="{{ route('admin.categories') }}" class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
                <i class="bi bi-tags"></i> Danh mục
            </a>
            <a href="{{ route('admin.products') }}" class="{{ Request::is('admin/products*') ? 'active' : '' }}">
                <i class="bi bi-box-seam"></i> Sản phẩm
            </a>
            <a href="{{ route('admin.users') }}" class="{{ Request::is('admin/users*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Khách hàng
            </a>
            <a href="{{ route('admin.orders') }}" class="{{ Request::is('admin/orders*') ? 'active' : '' }}">
                <i class="bi bi-cart3"></i> Đơn hàng
            </a>
            
            <div class="menu-header">Hệ thống</div>
            <a href="{{ route('home') }}">
                <i class="bi bi-house"></i> Xem website
            </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i> Đăng xuất
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <div class="main-content">
        <div class="top-header">
            <h4>@yield('page-title', 'Dashboard')</h4>
            <div class="user-info">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-secondary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                </a>
            </div>
        </div>
        
        <div class="content-area">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
