<?php

require_once __DIR__ . '/includes/functions.php';

$name = '';
$author = '';
$category = '';
$price = '';
$description = '';
$errors = [];
$isSuccess = false;

$categories = getCategories();

// Kiểm tra phương thức gửi dữ liệu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Thu thập và tiền xử lý dữ liệu
    $name = trim($_POST['name'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $price = trim($_POST['price'] ?? '');
    $description = trim($_POST['description'] ?? '');

    // Rule 1: Kiểm tra Tên sách
    if ($name === '') {
        $errors['name'] = 'Vui lòng nhập tên sách.';
    } elseif (mb_strlen($name) < 3) {
        $errors['name'] = 'Tên sách phải có độ dài tối thiểu 3 ký tự.';
    }

    // Rule 2: Kiểm tra Tác giả
    if ($author === '') {
        $errors['author'] = 'Vui lòng nhập tên tác giả hoặc đơn vị biên soạn.';
    }

    // Rule 3: Kiểm tra Thể loại
    if ($category === '') {
        $errors['category'] = 'Vui lòng chọn thể loại cho sách.';
    } elseif (!array_key_exists($category, $categories)) {
        $errors['category'] = 'Thể loại đã chọn không hợp lệ trong hệ thống.';
    }

    // Rule 4: Kiểm tra Giá bán
    if ($price === '') {
        $errors['price'] = 'Vui lòng nhập giá sách.';
    } elseif (!is_numeric($price)) {
        $errors['price'] = 'Giá sách phải là một giá trị số hợp lệ.';
    } elseif ((float) $price <= 0) {
        $errors['price'] = 'Giá sách phải là số dương lớn hơn 0.';
    }

    // Nếu không có lỗi nào thì đánh dấu thành công
    if (count($errors) === 0) {
        $isSuccess = true;
    }
}

$pageTitle = 'Thêm sách mới';
$activeNav = 'create';

require __DIR__ . '/includes/header.php';
?>

<main class="main-container">
    <div class="catalog-header">
        <h1 class="catalog-title">Thêm sách mới vào tủ sách</h1>
        <p class="catalog-subtitle">
            Hệ thống tiếp nhận thông tin giáo trình và ấn phẩm học tập (Buổi 02 — POST & Validation Server).
        </p>
    </div>

    <div class="form-layout">
        <!-- Cột trái: Form nhập thông tin sách -->
        <section class="form-card">
            <?php if ($isSuccess): ?>
                <div class="alert alert-success">
                    <strong>✓ Thành công!</strong> Thông tin sách đã được kiểm tra hợp lệ phía server. Xem trước thông tin chi tiết ở cột bên phải.
                </div>
            <?php endif; ?>

            <form method="POST" action="create-product.php" novalidate>
                <!-- Field 1: Tên sách -->
                <div class="form-group">
                    <label class="form-label" for="name">
                        Tên sách / Giáo trình <span class="required">*</span>
                    </label>
                    <input
                        class="form-control <?= isset($errors['name']) ? 'input-error' : '' ?>"
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Ví dụ: Giáo trình Lập trình Web PHP nâng cao"
                        value="<?= e($name) ?>"
                    >
                    <?php if (isset($errors['name'])): ?>
                        <p class="field-error"><?= e($errors['name']) ?></p>
                    <?php endif; ?>
                </div>

                <!-- Field 2: Tác giả -->
                <div class="form-group">
                    <label class="form-label" for="author">
                        Tác giả / Ban biên soạn <span class="required">*</span>
                    </label>
                    <input
                        class="form-control <?= isset($errors['author']) ? 'input-error' : '' ?>"
                        id="author"
                        name="author"
                        type="text"
                        placeholder="Ví dụ: Khoa Khoa học Máy tính - VKU"
                        value="<?= e($author) ?>"
                    >
                    <?php if (isset($errors['author'])): ?>
                        <p class="field-error"><?= e($errors['author']) ?></p>
                    <?php endif; ?>
                </div>

                <!-- Field 3: Thể loại -->
                <div class="form-group">
                    <label class="form-label" for="category">
                        Thể loại sách <span class="required">*</span>
                    </label>
                    <select
                        class="form-control <?= isset($errors['category']) ? 'input-error' : '' ?>"
                        id="category"
                        name="category"
                    >
                        <option value="">-- Chọn thể loại phù hợp --</option>
                        <?php foreach ($categories as $catKey => $catLabel): ?>
                            <option value="<?= e($catKey) ?>" <?= $category === $catKey ? 'selected' : '' ?>>
                                <?= e($catLabel) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['category'])): ?>
                        <p class="field-error"><?= e($errors['category']) ?></p>
                    <?php endif; ?>
                </div>

                <!-- Field 4: Giá bán -->
                <div class="form-group">
                    <label class="form-label" for="price">
                        Giá bán (VNĐ) <span class="required">*</span>
                    </label>
                    <input
                        class="form-control <?= isset($errors['price']) ? 'input-error' : '' ?>"
                        id="price"
                        name="price"
                        type="number"
                        min="0"
                        step="1000"
                        placeholder="Ví dụ: 150000"
                        value="<?= e($price) ?>"
                    >
                    <p class="field-hint">Đơn vị VNĐ, phải lớn hơn 0 (ví dụ: 120000).</p>
                    <?php if (isset($errors['price'])): ?>
                        <p class="field-error"><?= e($errors['price']) ?></p>
                    <?php endif; ?>
                </div>

                <!-- Field 5: Mô tả tóm tắt -->
                <div class="form-group">
                    <label class="form-label" for="description">
                        Mô tả tóm tắt nội dung
                    </label>
                    <textarea
                        class="form-control <?= isset($errors['description']) ? 'input-error' : '' ?>"
                        id="description"
                        name="description"
                        rows="4"
                        placeholder="Giới thiệu sơ lược về mục tiêu, đối tượng người đọc hoặc nội dung của cuốn sách..."
                    ><?= e($description) ?></textarea>
                    <?php if (isset($errors['description'])): ?>
                        <p class="field-error"><?= e($errors['description']) ?></p>
                    <?php endif; ?>
                </div>

                <div class="form-actions">
                    <button class="btn" type="submit">
                        <span>💾</span> Lưu thông tin sách
                    </button>
                    <a class="btn btn-outline" href="products.php">
                        Quay lại tủ sách
                    </a>
                </div>
            </form>
        </section>

        <!-- Cột phải: Hướng dẫn kỹ thuật và Khung xem trước khi hợp lệ -->
        <aside class="form-sidebar">
            <section class="info-card">
                <h2>📋 Quy tắc kiểm tra dữ liệu</h2>
                <ul>
                    <li>Phương thức truyền: <code>POST</code>.</li>
                    <li>Validate chặt chẽ ở server trước khi chấp nhận.</li>
                    <li>Bảo toàn dữ liệu đã nhập (old values) khi có lỗi.</li>
                    <li>Hiển thị thông báo lỗi tương ứng bên dưới từng ô nhập.</li>
                    <li>Mọi dữ liệu hiển thị ra ngoài đều được chống XSS bằng hàm <code>e()</code>.</li>
                </ul>
            </section>

            <?php if ($isSuccess): ?>
                <section class="preview-card" style="margin-top: 20px;">
                    <div class="preview-card-header">
                        <h2>📖 Xem trước sách vừa thêm</h2>
                        <span class="badge badge-in-stock">Hợp lệ</span>
                    </div>

                    <div class="preview-row">
                        <span class="preview-label">Tên sách:</span>
                        <span class="preview-value"><?= e($name) ?></span>
                    </div>

                    <div class="preview-row">
                        <span class="preview-label">Tác giả:</span>
                        <span class="preview-value"><?= e($author) ?></span>
                    </div>

                    <div class="preview-row">
                        <span class="preview-label">Thể loại:</span>
                        <span class="preview-value"><?= e(getCategoryName($category)) ?></span>
                    </div>

                    <div class="preview-row">
                        <span class="preview-label">Giá niêm yết:</span>
                        <span class="preview-value" style="color: var(--primary);">
                            <?= e(formatCurrency($price)) ?>
                        </span>
                    </div>

                    <div class="preview-row">
                        <span class="preview-label">Mô tả:</span>
                        <span class="preview-value">
                            <?= $description !== '' ? nl2br(e($description)) : '<em style="color: var(--text-muted); font-weight: normal;">(Chưa có mô tả)</em>' ?>
                        </span>
                    </div>
                </section>
            <?php endif; ?>
        </aside>
    </div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
