# VKUShop — Buổi 01 Starter

## Mục tiêu
Trong `products.php` đã có sẵn **1 product card HTML tĩnh hoàn chỉnh**. Hãy dùng nó làm template; không cần tự dựng lại HTML/CSS của card.

1. Render sản phẩm bằng `foreach`.
2. Format giá bằng `number_format()`.
3. Hiển thị Còn hàng / Hết hàng.
4. Badge Cao cấp nếu giá >= 300.000.
5. Search bằng GET.
6. Giữ keyword sau submit.
7. Dùng `htmlspecialchars()` khi output dữ liệu phù hợp.

## Challenge
Thêm `min_price`, `max_price` và kết hợp với `keyword`.

## Chạy project
```bash
php -S localhost:8000
```
Mở `http://localhost:8000`.
