<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Đăng nhập - KFT Vietnam</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --fkt-primary: #B80C0C;
            --fkt-secondary: #E85C0D;
            --fkt-success: #28a745;
            --fkt-white: #ffffff;
            --fkt-light-bg: #f8f9fa;
            --fkt-gray: #6c757d;
            --fkt-text-dark: #1a1a1a;
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.08);
            --shadow-lg: 0 8px 30px rgba(0,0,0,0.15);
            --transition: all 0.3s ease;
        }

        * {
            font-family: 'Be Vietnam Pro', sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--fkt-primary) 0%, var(--fkt-secondary) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .login-card {
            background: var(--fkt-white);
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
        }

        .login-header {
            background: linear-gradient(135deg, var(--fkt-primary) 0%, var(--fkt-secondary) 100%);
            padding: 40px 30px 30px;
            text-align: center;
        }

        .login-header .logo {
            width: 80px;
            height: 80px;
            background: var(--fkt-white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            box-shadow: var(--shadow-sm);
        }

        .login-header .logo i {
            font-size: 2.5rem;
            color: var(--fkt-primary);
        }

        .login-header h1 {
            color: var(--fkt-white);
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .login-header p {
            color: rgba(255,255,255,0.9);
            font-size: 0.9rem;
            margin: 0;
        }

        .login-body {
            padding: 35px 30px;
        }

        .form-label {
            font-weight: 600;
            color: var(--fkt-text-dark);
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--fkt-primary);
            box-shadow: 0 0 0 3px rgba(184, 12, 12, 0.1);
        }

        .form-check-label {
            color: var(--fkt-gray);
            font-size: 0.9rem;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--fkt-primary) 0%, var(--fkt-secondary) 100%);
            color: var(--fkt-white);
            border: none;
            padding: 14px 28px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: var(--transition);
            width: 100%;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(184, 12, 12, 0.4);
            color: var(--fkt-white);
        }

        .forgot-link {
            color: var(--fkt-primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .forgot-link:hover {
            color: var(--fkt-secondary);
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e0e0e0;
            color: var(--fkt-gray);
            font-size: 0.95rem;
        }

        .register-link a {
            color: var(--fkt-primary);
            font-weight: 700;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.9rem;
        }

        .alert-success {
            background: #d4edda;
            border: none;
            color: #155724;
        }

        .alert-danger {
            background: #f8d7da;
            border: none;
            color: #721c24;
        }

        .invalid-feedback {
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .form-check-input:checked {
            background-color: var(--fkt-primary);
            border-color: var(--fkt-primary);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo">
                    <i class="fas fa-drumstick-bite"></i>
                </div>
                <h1>KFT Vietnam</h1>
                <p>Đăng nhập để tiếp tục</p>
            </div>
            
            <div class="login-body">
                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success mb-4">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope me-2"></i>Email
                        </label>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus 
                               autocomplete="username"
                               placeholder="Nhập email của bạn">
                        @error('email')
                            <div class="invalid-feedback d-block">
                                <i class="fas fa-exclamation-circle me-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-2"></i>Mật khẩu
                        </label>
                        <input type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               id="password" 
                               name="password" 
                               required 
                               autocomplete="current-password"
                               placeholder="Nhập mật khẩu">
                        @error('password')
                            <div class="invalid-feedback d-block">
                                <i class="fas fa-exclamation-circle me-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                            <label class="form-check-label" for="remember_me">
                                Ghi nhớ đăng nhập
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">
                                <i class="fas fa-question-circle me-1"></i>Quên mật khẩu?
                            </a>
                        @endif

                        <button type="submit" class="btn btn-login">
                            <i class="fas fa-sign-in-alt me-2"></i>Đăng nhập
                        </button>
                    </div>
                </form>

                <div class="register-link">
                    Chưa có tài khoản? 
                    <a href="{{ route('register') }}">Đăng ký ngay</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
