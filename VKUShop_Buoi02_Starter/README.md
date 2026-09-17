# VKUShop — Buổi 02 Starter

## Chủ đề
Form + POST + Server-side Validation + Refactor

Starter kế thừa chức năng Buổi 1 và bổ sung sẵn HTML/CSS cho hai form:
- `create-product.php`: giảng viên live-code.
- `create-category.php`: sinh viên thực hành độc lập.

## Mục tiêu chính
1. Kiểm tra `$_SERVER['REQUEST_METHOD']`.
2. Nhận dữ liệu từ `$_POST`.
3. Dùng `trim()`, `is_numeric()`, `in_array()` để validate.
4. Hiển thị lỗi ngay cạnh field.
5. Giữ dữ liệu cũ khi submit lỗi.
6. Escape output với `htmlspecialchars()`.
7. Sau khi hiểu code trực tiếp, refactor thành `includes/header.php`, `footer.php`, `functions.php`.

> Buổi 2 CHƯA lưu dữ liệu vào database. Khi form hợp lệ chỉ hiển thị preview.

## Chạy project
```bash
php -S localhost:8000
```

Mở: `http://localhost:8000`
