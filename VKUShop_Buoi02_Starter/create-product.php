<?php

require_once __DIR__ . '/includes/functions.php';


$name = '';
$price = '';
$category = '';
$description = '';
$errors = [];
$isSuccess = false;
$category_list = ["gift", "shirt", "accessory"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $price = $_POST['price'] ?? '';
    $category = trim($_POST['category'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if ($name === '') {
        $errors['name'] = "Vui lòng nhập tên sản phẩm !";
    }

    if ($price === '') {
        $errors['price'] = "Vui lòng nhập giá !";
    } elseif (!is_numeric($price)) {
        $errors['price'] = "Giá phải là số !";
    } elseif ((float) $price <= 0) {
        $errors['price'] = "Giá phải lớn 0 !";
    }

    if (!in_array($category, $category_list)) {
        $errors['category'] = "Danh mục không hợp lệ !";
    }

    if (count($errors) === 0) {
        $isSuccess = true;
    }
}


$pageTitle = 'Thêm sản phẩm - VKUShop';
require __DIR__ . '/includes/header.php';

?>


<main class="main-container">
    <h1 class="page-heading">Thêm sản phẩm</h1>
    <p class="page-subtitle">
        HTML/CSS của form đã có sẵn. Hãy tập trung vào POST, validation và PHP phía server.
    </p>

    <div class="form-layout">
        <section class="form-card">
            <form method="POST" action="create-product.php" novalidate>
                <div class="form-group">
                    <label for="name">Tên sản phẩm <span class="required">*</span></label>
                    <input
                        class="form-control"
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Ví dụ: Áo polo VKU"
                        value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>" />
                    <?php if (isset($errors['name'])): ?>
                        <p class=" field-error">
                            <?= e($errors['name']) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="price">Giá (VND) <span class="required">*</span></label>
                    <input
                        class="form-control"
                        id="price"
                        name="price"
                        type="text"
                        inputmode="numeric"
                        placeholder="Ví dụ: 250000"
                        value="<?= htmlspecialchars($price) ?>" />
                    <?php if (isset($errors['price'])): ?>
                        <p class="field-error">
                            <?= e($errors['price']) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="category">Danh mục <span class="required">*</span></label>
                    <select class="form-control" id="category" name="category">
                        <option value="">-- Chọn danh mục --</option>
                        <option value="shirt" <?= $category === 'shirt' ? 'selected' : '' ?>>Áo</option>
                        <option value="accessory" <?= $category === 'accessory' ? 'selected' : '' ?>>Phụ kiện</option>
                        <option value="gift" <?= $category === 'gift' ? 'selected' : '' ?>>Quà tặng</option>
                    </select>
                    <?php if (isset($errors['category'])): ?>
                        <p class="field-error">
                            <?= e($errors['category']) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea
                        class="form-control"
                        id="description"
                        name="description"
                        placeholder="Mô tả ngắn về sản phẩm...">
                            <?= e($description) ?>
                        </textarea>
                </div>

                <div class="form-actions">
                    <button class="btn" type="submit">Kiểm tra dữ liệu</button>
                    <a class="btn btn-secondary" href="products.php">Quay lại sản phẩm</a>
                </div>
            </form>
        </section>

        <aside>
            <section class="info-card">
                <h2>Mục tiêu của form</h2>
                <ul>
                    <li>Nhận dữ liệu bằng POST.</li>
                    <li>Không tin dữ liệu từ client.</li>
                    <li>Validate ở phía server.</li>
                    <li>Hiển thị lỗi cạnh đúng field.</li>
                    <li>Giữ lại dữ liệu cũ khi form lỗi.</li>
                </ul>

                <?php if ($isSuccess): ?>
                    <section class="preview-card" style="margin-top: 20px;">
                        <h2>Xem trước sản phẩm</h2>
                        <div class="preview-row">
                            <span class="preview-label">Tên sản phẩm:</span>
                            <span class="preview-value"><?= e($name) ?></span>
                        </div>
                        <div class="preview-row">
                            <span class="preview-label">Giá bán:</span>
                            <span class="preview-value"><?= number_format((float) $price, 0, ',', '.') ?> VND</span>
                        </div>
                        <div class="preview-row">
                            <span class="preview-label">Danh mục:</span>
                            <span class="preview-value"><?= e(getCategoryName($category)) ?></span>
                        </div>
                        <div class="preview-row">
                            <span class="preview-label">Mô tả:</span>
                            <span class="preview-value"><?= $description !== '' ? nl2br(e($description)) : '(Không có)' ?></span>
                        </div>
                    </section>
                <?php endif; ?>
            </section>
        </aside>
    </div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>