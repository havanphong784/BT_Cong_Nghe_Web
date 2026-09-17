<?php

require_once __DIR__ . '/includes/functions.php';

$name = '';
$slug = '';
$description = '';
$errors = [];
$isSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if ($name === '') {
        $errors['name'] = 'Vui lòng nhập tên danh mục.';
    }

    if ($slug === '') {
        $errors['slug'] = 'Vui lòng nhập slug.';
    } elseif (!preg_match('/^[a-z0-9-]+$/', $slug)) {
        $errors['slug'] = 'Slug không hợp lệ (chỉ chấp nhận chữ thường, số và dấu gạch ngang).';
    }

    if (count($errors) === 0) {
        $isSuccess = true;
    }
}

$pageTitle = 'Thêm danh mục - VKUShop';
require __DIR__ . '/includes/header.php';
?>

<main class="main-container">
    <h1 class="page-heading">Thêm danh mục</h1>
    <p class="page-subtitle">Bài thực hành độc lập: áp dụng lại POST + validation + old values.</p>

    <div class="form-layout">
        <section class="form-card">
            <?php if ($isSuccess): ?>
                <div class="alert alert-success">
                    Thêm danh mục thành công!
                </div>
            <?php endif; ?>

            <form method="POST" action="create-category.php" novalidate>
                <div class="form-group">
                    <label for="name">Tên danh mục <span class="required">*</span></label>
                    <input
                        class="form-control <?= isset($errors['name']) ? 'input-error' : '' ?>"
                        id="name"
                        name="name"
                        type="text"
                        value="<?= e($name) ?>"
                        placeholder="Ví dụ: Đồng phục VKU">
                    <?php if (isset($errors['name'])): ?>
                        <p class="field-error"><?= e($errors['name']) ?></p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="slug">Slug <span class="required">*</span></label>
                    <input
                        class="form-control <?= isset($errors['slug']) ? 'input-error' : '' ?>"
                        id="slug"
                        name="slug"
                        type="text"
                        value="<?= e($slug) ?>"
                        placeholder="Ví dụ: dong-phuc-vku">
                    <p class="field-hint">Chỉ chấp nhận chữ thường không dấu, số và dấu gạch ngang (-).</p>
                    <?php if (isset($errors['slug'])): ?>
                        <p class="field-error"><?= e($errors['slug']) ?></p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea
                        class="form-control <?= isset($errors['description']) ? 'input-error' : '' ?>"
                        id="description"
                        name="description"
                        placeholder="Mô tả ngắn..."><?= e($description) ?></textarea>
                    <?php if (isset($errors['description'])): ?>
                        <p class="field-error"><?= e($errors['description']) ?></p>
                    <?php endif; ?>
                </div>

                <div class="form-actions">
                    <button class="btn" type="submit">Kiểm tra dữ liệu</button>
                    <a class="btn btn-secondary" href="products.php">Quay lại sản phẩm</a>
                </div>
            </form>
        </section>

        <aside>
            <section class="info-card">
                <h2>Yêu cầu</h2>
                <ul>
                    <li>Không copy nguyên logic Product rồi đổi tên biến một cách máy móc.</li>
                    <li>Giải thích được từng bước xử lý POST.</li>
                    <li>Escape khi output dữ liệu user.</li>
                </ul>
            </section>

            <?php if ($isSuccess): ?>
                <section class="preview-card" style="margin-top: 20px;">
                    <h2>Xem trước danh mục</h2>
                    <div class="preview-row">
                        <span class="preview-label">Tên danh mục:</span>
                        <span class="preview-value"><?= e($name) ?></span>
                    </div>
                    <div class="preview-row">
                        <span class="preview-label">Slug:</span>
                        <span class="preview-value"><?= e($slug) ?></span>
                    </div>
                    <div class="preview-row">
                        <span class="preview-label">Mô tả:</span>
                        <span class="preview-value"><?= $description !== '' ? nl2br(e($description)) : '(Không có)' ?></span>
                    </div>
                </section>
            <?php endif; ?>
        </aside>
    </div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>