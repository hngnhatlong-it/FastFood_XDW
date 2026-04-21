<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ sơ cá nhân</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Đoạn này giúp trang Profile đè lên mọi thứ cũ của Layout */
        body { 
            background-color: #fdf5e6 !important; 
            font-family: 'Inter', sans-serif; 
            margin: 0; 
            padding: 40px 20px; 
            display: flex; 
            justify-content: center; 
            min-height: 100vh;
            position: relative;
            z-index: 9999; /* Đưa lên trên cùng */
        }
        .container { width: 100%; max-width: 550px; z-index: 10000; }
        .card { background: white; border-radius: 28px; padding: 35px; margin-bottom: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid rgba(255, 140, 0, 0.1); }
        .card-header { display: flex; align-items: center; gap: 15px; margin-bottom: 25px; }
        .icon-box { width: 45px; height: 45px; background: #fff4e6; color: #ff8c00; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; }
        .form-group { margin-bottom: 18px; text-align: left; }
        label { display: block; font-size: 14px; font-weight: 600; margin-bottom: 8px; color: #444; }
        input { width: 100%; padding: 12px 16px; border: 1px solid #eee; border-radius: 12px; background: #fbfbfb; font-size: 15px; box-sizing: border-box; outline: none; transition: 0.3s; }
        input:focus { border-color: #ff8c00; box-shadow: 0 0 0 4px rgba(255, 140, 0, 0.1); }
        .btn-action { background: linear-gradient(135deg, #ff8c00, #ff5f00); color: white; border: none; padding: 14px; border-radius: 12px; font-weight: 700; cursor: pointer; width: 100%; display: flex; justify-content: center; align-items: center; gap: 8px; font-size: 15px; }
        .alert { background: #d4edda; color: #155724; padding: 15px; border-radius: 12px; margin-bottom: 20px; text-align: center; font-weight: 600; }
    </style>
</head>
<body>
<div class="container">
    <h1 style="text-align: center; color: #8b4513; margin-bottom: 30px;">Hồ sơ cá nhân</h1>

    @if (session('status') === 'profile-updated' || session('status') === 'password-updated')
        <div class="alert">Cập nhật thành công!</div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="icon-box"><i class="fa-solid fa-user-gear"></i></div>
            <div><h2 style="margin:0; font-size:18px;">Thông tin tài khoản</h2><p style="margin:0; font-size:13px; color:#999;">Quản lý tên và email</p></div>
        </div>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf @method('patch')
            <div class="form-group"><label>Họ và tên</label><input type="text" name="name" value="{{ Auth::user()->name }}"></div>
            <div class="form-group"><label>Email</label><input type="email" name="email" value="{{ Auth::user()->email }}"></div>
            <button type="submit" class="btn-action">LƯU THAY ĐỔI</button>
        </form>
    </div>
</div>
</body>
</html>