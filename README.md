# 🍵 TeaBliss API

**TeaBliss API** là hệ thống quản lý bán hàng trực tuyến dành cho cửa hàng trà và dụng cụ pha trà. API cung cấp các chức năng quản lý sản phẩm, đơn hàng, khách hàng và thanh toán, giúp tối ưu hóa quy trình bán hàng và mang đến trải nghiệm mua sắm tốt nhất cho khách hàng.

<p align="center">
  <img src="https://your-image-link.com/teabliss-logo.png" alt="TeaBliss Logo" width="400">
</p>

## 🚀 Tính Năng

-   ✅ **Quản lý sản phẩm**: Thêm, sửa, xóa và hiển thị danh sách trà và dụng cụ pha trà.
-   ✅ **Quản lý danh mục**: Phân loại sản phẩm theo từng loại trà và dụng cụ.
-   ✅ **Quản lý đơn hàng**: Đặt hàng, theo dõi trạng thái và lịch sử đơn hàng.
-   ✅ **Thanh toán trực tuyến**: Tích hợp các cổng thanh toán phổ biến.
-   ✅ **Xử lý người dùng**: Đăng ký, đăng nhập, phân quyền và bảo mật API bằng JWT.
-   ✅ **Tìm kiếm và lọc sản phẩm**: Theo tên sản phẩm, giá, danh mục,...
-   ✅ **Báo cáo doanh thu**: Tổng hợp dữ liệu bán hàng và thống kê hiệu suất.

---

## 🏗️ Công Nghệ Sử Dụng

-   **PHP 8.x** + **Laravel 10.x** – Backend Framework
-   **MySQL** – Hệ quản trị cơ sở dữ liệu
-   **Composer** – Quản lý thư viện PHP
-   **JWT (JSON Web Token)** – Bảo mật và xác thực người dùng
-   **RESTful API** – Chuẩn hóa giao tiếp dữ liệu
-   **Postman** – Kiểm thử API

---

## 📁 Cài Đặt Dự Án

### 1️⃣ **Clone dự án**

```bash
git clone https://github.com/your-username/teabliss-api.git
cd teabliss-api
```

### 2️⃣ **Cài đặt dependencies**

```bash
composer install
```

### 3️⃣ **Cấu hình môi trường**

Tạo file `.env` từ file mẫu:

```bash
cp .env.example .env
```

Cập nhật thông tin trong `.env`:

```env
APP_NAME=TeaBliss
APP_ENV=local
APP_KEY=base64:generate_using_php_artisan_key_generate
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=teabliss_db
DB_USERNAME=root
DB_PASSWORD=your_password

JWT_SECRET=your_jwt_secret
```

**Tạo key ứng dụng và JWT secret:**

```bash
php artisan key:generate
php artisan jwt:secret
```

### 4️⃣ **Chạy migration và seed dữ liệu**

```bash
php artisan migrate --seed
```

### 5️⃣ **Chạy server**

```bash
php artisan serve
```

Truy cập API tại: `http://localhost:8000`

---

## 🔑 API Endpoints

| Method | Endpoint             | Mô Tả                             | Auth |
| ------ | -------------------- | --------------------------------- | ---- |
| POST   | `/api/register`      | Đăng ký tài khoản                 | ❌   |
| POST   | `/api/login`         | Đăng nhập và lấy JWT token        | ❌   |
| GET    | `/api/products`      | Danh sách sản phẩm                | ❌   |
| GET    | `/api/products/{id}` | Chi tiết sản phẩm                 | ❌   |
| POST   | `/api/orders`        | Tạo đơn hàng                      | ✅   |
| GET    | `/api/orders`        | Danh sách đơn hàng của người dùng | ✅   |
| POST   | `/api/logout`        | Đăng xuất                         | ✅   |
| GET    | `/api/user`          | Thông tin người dùng hiện tại     | ✅   |

---

## 🧪 Kiểm Thử API

1. **Sử dụng Postman** hoặc bất kỳ công cụ API client nào.
2. **Lấy JWT token** khi đăng nhập và sử dụng trong header:
    ```
    Authorization: Bearer {your_token}
    ```

---

## 💡 Đóng Góp

Nếu bạn muốn đóng góp cho dự án, vui lòng:

1. Fork dự án
2. Tạo branch mới (`git checkout -b feature/tinh-nang-moi`)
3. Commit và push thay đổi
4. Tạo Pull Request

---

## 📬 Liên Hệ

-   📧 **Email:** teabliss.support@example.com
-   🌐 **Website:** [teabliss.com](https://teabliss.com)
-   📱 **Facebook:** [TeaBliss Official](https://facebook.com/teabliss)

---

## 📜 License

TeaBliss API được phát hành theo giấy phép [MIT](https://opensource.org/licenses/MIT).
