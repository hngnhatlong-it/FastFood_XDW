# 🚀 Hướng Dẫn Setup Project Laravel FastFood App

## 📋 Tổng Quan

Project **FastFood App** được xây dựng trên nền tảng **Laravel 11** với hệ thống xác thực người dùng **Breeze**. Dưới đây là hướng dẫn chi tiết từng bước để setup và chạy project thành công.

---

## 📦 Yêu Cầu Hệ Thống

| Thành phần | Phiên bản tối thiểu |
|------------|---------------------|
| PHP        | 8.2+                |
| MySQL      | 5.7+                |
| Node.js    | 18+                 |
| Composer   | 2.0+                |

---

## 🛠️ Bước 1: Cài Đặt Laragon

### 1.1 Tải Laragon

Truy cập trang chủ Laragon và tải phiên bản mới nhất:

```
https://laragon.org/download/
```

Tải phiên bản **Laragon Full** (bao gồm PHP, MySQL, Apache/Nginx, Node.js, Git, Redis...)

### 1.2 Cài Đặt Laragon

1. Chạy file cài đặt vừa tải về
2. Chọn thư mục cài đặt (khuyến nghị: `C:\laragon`)
3. Click **Install** và đợi quá trình cài đặt hoàn tất
4. Sau khi cài đặt xong, Laragon sẽ tự động khởi động

### 1.3 Kiểm Tra Laragon

Mở Laragon, bạn sẽ thấy giao diện như sau:

```
┌─────────────────────────────────────┐
│  🌱 Laragon                         │
├─────────────────────────────────────┤
│  [Start] [Stop] [Restart] [Quit]   │
│                                     │
│  Apache  ✓  Port: 80                │
│  MySQL   ✓  Port: 3306              │
│  PHP     ✓  8.2.x                   │
│  Node    ✓  18.x                    │
└─────────────────────────────────────┘
```

> ✅ **Lưu ý:** Đảm bảo các service Apache và MySQL đều đang chạy (có dấu ✓ màu xanh)

---

## 🗄️ Bước 2: Cài Đặt MySQL Trong Laragon

### 2.1 Kiểm Tra MySQL

Laragon Full đã bao gồm MySQL sẵn có. Bạn có thể kiểm tra bằng cách:

1. Mở Laragon
2. Nhìn vào phần **MySQL** - nếu hiển thị ✓ màu xanh là đã sẵn sàng

### 2.2 Truy Cập MySQL qua Command Line

Để truy cập MySQL, mở Terminal trong Laragon:

1. Click chuột phải vào biểu tượng Laragon ở góc phải màn hình
2. Chọn **Terminal**

Hoặc mở Command Prompt và gõ:

```bash
mysql -u root -p
```

> ⚠️ **Lưu ý:** Mật khẩu mặc định của root trong Laragon là để trống (chỉ cần nhấn Enter)

---

## 🐬 Bước 3: Tạo Database Trong Laragon

### 3.1 Truy Cập phpMyAdmin

Laragon tích hợp sẵn phpMyAdmin. Truy cập bằng cách:

1. Mở trình duyệt
2. Gõ địa chỉ: `http://localhost/phpmyadmin`

### 3.2 Tạo Database Mới

1. Đăng nhập với:
   - **Username:** `root`
   - **Password:** (để trống)

2. Click vào tab **Databases** (Cơ sở dữ liệu)

3. Tại ô **Tên cơ sở dữ liệu mới**, nhập:
   ```
   fastfood_app
   ```

4. Chọn collation **utf8mb4_unicode_ci**

5. Click **Create** (Tạo)

### 3.3 Tạo Database qua Command Line

```sql
CREATE DATABASE fastfood_app CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

---

## 📂 Bước 4: Clone/Copy Project

### 4.1 Di Chuyển Project Vào Thư Mục Laragon

Laragon mặc định sẽ load các project từ thư mục:

```
C:\laragon\www
```

Bạn có thể:

**Cách 1: Copy thủ công**
- Copy thư mục `fastfood_app` vào `C:\laragon\www\`

**Cách 2: Sử dụng Git**
```bash
cd C:\laragon\www
git clone <repository-url> fastfood_app
```

### 4.2 Mở Project Trong VS Code

```bash
cd C:\laragon\www\fastfood_app
code .
```

---

## 📚 Bước 5: Cài Đặt Dependencies Với Composer

### 5.1 Cài Đặt Composer Dependencies

Mở Terminal tại thư mục project và chạy:

```bash
cd C:\laragon\www\fastfood_app
composer install
```

> ⏳ Lệnh này sẽ tải về tất cả các thư viện PHP cần thiết. Vui lòng đợi cho đến khi hoàn tất. (trong folder vendor)

### 5.2 Nếu Gặp Lỗi Memory Limit

```bash
composer install --ignore-platform-reqs
```

Hoặc tăng memory limit:

```bash
php -d memory_limit=-1 composer install
```

---

## ⚙️ Bước 6: Cấu Hình File .env: 

### 6.1 Tạo File .env

Nếu file `.env` chưa tồn tại, hãy copy từ file `.env.example`:

```bash
copy .env.example .env
```

### 6.2 Cấu Hình Nội Dung .env

Mở file `.env` và cấu hình các thông số sau:

```env
APP_NAME=FastFoodApp
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fastfood_app
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=database
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

VITE_APP_NAME="${APP_NAME}"
```

> ✅ **Lưu ý quan trọng:**
> - `DB_DATABASE=fastfood_app` - Tên database đã tạo ở bước 3
> - `DB_USERNAME=root` - Username MySQL
> - `DB_PASSWORD=` - Password MySQL (để trống nếu sử dụng Laragon mặc định)

### 6.3 Tạo Application Key

```bash
php artisan key:generate (bảo mật dữ liệu người dùng và mã hóa, Lavarel sẽ không chạy nếu không có dòng này)
```
> ⏳ Lệnh này sẽ giúp laravel biết đường dẫn đến database, thiết lập môi trường làm việc, các mật khẩu databse hay key bí mật sẽ được nằm riêng và bảo mật ở file .env

---

## 🗃️ Bước 7: Chạy Migration Và Seeder: php artisan make:migration create_categories_table
### 7.1 Chạy Migration (Tạo Bảng(fields) tự động khi đọc từ các file trong folder migrations)

```bash
php artisan migrate
```

Lệnh này sẽ tạo các bảng trong database:
- `users` - Bảng người dùng
- `categories` - Bảng danh mục sản phẩm
- `products` - Bảng sản phẩm
- `orders` - Bảng đơn hàng
- `order_items` - Bảng chi tiết đơn hàng
- `cart_items` - Bảng giỏ hàng
- `personal_access_tokens` - Bảng tokens cho API
- Và một số bảng hệ thống khác

### 7.2 Nếu Muốn Rollback Migration (Xóa bảng)

```bash
php artisan migrate:rollback
```

### 7.3 Chạy Seeder (Tạo Dữ Liệu Mẫu vào Database)

```bash
php artisan db:seed
```

Hoặc chạy migration và seeder cùng lúc (nên dùng cho tiện cả 2): 

```bash
php artisan migrate --seed
```

### 7.4 Xem Danh Sách Routes (Hiển thị tất cả API trong project)

```bash
php artisan route:list
```

---

## 📦 Bước 8: Cài Đặt Và Build Frontend

### 8.1 Cài Đặt NPM Dependencies
 
```bash
npm install
```

> ⏳ Lệnh này sẽ tải các thư viện JavaScript và CSS (bao gồm TailwindCSS, Vite, Axios, PostCSS, JS packages)

### 8.2 Chạy Development Server

```bash
npm run dev
```

Lệnh này sẽ khởi động Vite dev server (FE development server). Sau khi chạy thành công, bạn sẽ thấy:

```
  VITE v5.x.x  ready in xxx ms

  ➜  Local:   http://localhost:5173/
  ➜  Network: http://192.168.x.x:5173/
```

### 8.3 Build Cho Production (Đóng gói FE để deploy)

Nếu muốn build ra thư mục `public/build`:

```bash
npm run build
```

---

## 🚀 Bước 9: Khởi Động Project

### 9.1 Chạy Laravel Development Server

```bash
php artisan serve
```

Mặc định, Laravel sẽ chạy tại:

```
http://localhost:8000
```

### 9.2 Truy Cập Website

Mở trình duyệt và truy cập:

```
http://localhost:8000
```

### 9.3 Các Trang Quan Trọng

| Trang                 | Địa chỉ                           |
|-----------------------|-----------------------------------|
| Trang chủ             | http://localhost:8000/           |
| Đăng nhập             | http://localhost:8000/login      |
| Đăng ký               | http://localhost:8000/register   |
| Admin Dashboard      | http://localhost:8000/admin      |
| Giỏ hàng              | http://localhost:8000/cart       |
| Đơn hàng              | http://localhost:8000/orders    |

---

## 🔧 Troubleshooting (Xử Lý Sự Cố)

### ❌ Lỗi: "Specified key was too long"

**Nguyên nhân:** MySQL version cũ không hỗ trợ utf8mb4 đầy đủ

**Giải quyết:**
```bash
php artisan migrate:fresh
```

Hoặc cập nhật MySQL lên phiên bản mới hơn.

---

### ❌ Lỗi: "Class 'Doctrine\DBAL\Driver\PDOMySql\Driver' not found"

**Giải quyết:**
```bash
composer require doctrine/dbal --dev
```

---

### ❌ Lỗi: "Permission denied" trên Linux/Mac

**Giải quyết:**
```bash
sudo chmod -R 755 storage bootstrap/cache
sudo chown -R www-data:www-data .
```

---

### ❌ Lỗi: "npm run dev" chạy chậm hoặc bị lỗi

**Giải quyết:**
```bash
# Xóa node_modules và cài lại
rm -rf node_modules
rm package-lock.json
npm install

# Hoặc sử dụng npm với cache clean
npm cache clean --force
npm install
```

---

### ❌ Lỗi: Không kết nối được MySQL

**Kiểm tra:**
1. MySQL service đang chạy trong Laragon
2. Thông tin trong file `.env` đúng chưa
3. Tên database đã tồn tại chưa

**Kiểm tra kết nối:**
```bash
php artisan tinker
DB::connection()->getPdo();
```

---

### ❌ Lỗi: "No application encryption key has been specified"

**Giải quyết:**
```bash
php artisan key:generate
php artisan config:clear
php artisan cache:clear
```

---

### ❌ Lỗi: Bảng không được tạo sau khi migrate

**Giải quyết:**
```bash
php artisan migrate:fresh --seed
```

---

## 📝 Một Số Lệnh Hữu Ích

### Lệnh Artisan Thường Dùng

```bash
# Xóa cache
php artisan cache:clear

# Xóa cache config
php artisan config:clear

# Xóa cache route
php artisan route:clear

# Xem danh sách routes
php artisan route:list

# Tạo controller mới
php artisan make:controller TenController

# Tạo model mới
php artisan make:model TenModel

# Tạo migration mới
php artisan make:migration create_ten_table
```

---

## 📞 Hỗ Trợ Thêm

Nếu gặp bất kỳ vấn đề nào khác, hãy kiểm tra:

1. **Logs:** Xem trong `storage/logs/laravel.log`
2. **Console:** Kiểm tra thông báo lỗi trong terminal
3. **Document:** Tham khảo tài liệu chính thức Laravel tại https://laravel.com/docs

---

## ✅ Hoàn Thành

Sau khi hoàn thành tất cả các bước trên, bạn đã có thể:

- ✅ Truy cập website tại `http://localhost:8000`
- ✅ Đăng ký/đăng nhập tài khoản
- ✅ Xem danh sách sản phẩm
- ✅ Thêm sản phẩm vào giỏ hàng
- ✅ Đặt hàng
- ✅ Quản lý (admin) sản phẩm, danh mục, đơn hàng, người dùng

---

**Chúc bạn thành công! 🎉**

> Made with ❤️ for FastFood App
