<?php

$name = '';
$slug = '';
$description = '';
$errors = [];
$isSuccess = false;

// TODO:
// 1. Chỉ xử lý khi request method là POST.
// 2. Đọc name, slug, description và trim dữ liệu.
// 3. name bắt buộc.
// 4. slug bắt buộc.
// 5. Hiển thị lỗi cạnh đúng field.
// 6. Giữ lại dữ liệu cũ sau khi submit lỗi.
// 7. Khi hợp lệ, hiển thị preview danh mục.

$pageTitle = 'Thêm sản phẩm - VKUShop';
require __DIR__ . '/includes/header.php';

?>

<main class="main-container">
    <h1 class="page-heading">Thêm danh mục</h1>
    <p class="page-subtitle">Bài thực hành độc lập: áp dụng lại POST + validation + old values.</p>

    <div class="form-layout">
        <section class="form-card">
            <form method="POST" action="create-category.php" novalidate>
                <div class="form-group">
                    <label for="name">Tên danh mục <span class="required">*</span></label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Ví dụ: Đồng phục VKU">
                </div>

                <div class="form-group">
                    <label for="slug">Slug <span class="required">*</span></label>
                    <input class="form-control" id="slug" name="slug" type="text" placeholder="Ví dụ: dong-phuc-vku">
                    <p class="field-hint">Buổi 2 chỉ yêu cầu slug không được để trống.</p>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Mô tả ngắn..."></textarea>
                </div>

                <button class="btn" type="submit">Kiểm tra dữ liệu</button>
            </form>
        </section>

        <aside class="info-card">
            <h2>Yêu cầu</h2>
            <ul>
                <li>Không copy nguyên logic Product rồi đổi tên biến một cách máy móc.</li>
                <li>Giải thích được từng bước xử lý POST.</li>
                <li>Escape khi output dữ liệu user.</li>
            </ul>
        </aside>
    </div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>