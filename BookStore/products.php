<?php

$products = [
    [
        'name' => 'Giáo trình Lập trình Web PHP',
        'price' => 120000,
        'original_price' => 150000,
        'stock' => 25,
        'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=600&q=80'
    ],
    [
        'name' => 'Giáo trình Cấu trúc dữ liệu',
        'price' => 180000,
        'original_price' => null,
        'stock' => 0,
        'image' => 'https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=600&q=80'
    ],
    [
        'name' => 'Sách Trí tuệ nhân tạo nâng cao',
        'price' => 270000,
        'original_price' => 320000,
        'stock' => 8,
        'image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=600&q=80'
    ],
    [
        'name' => 'Tiếng Anh chuyên ngành CNTT',
        'price' => 120000,
        'original_price' => null,
        'stock' => 15,
        'image' => 'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?auto=format&fit=crop&w=600&q=80'
    ],
    [
        'name' => 'Giáo trình Cơ sở dữ liệu',
        'price' => 140000,
        'original_price' => null,
        'stock' => 18,
        'image' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&w=600&q=80'
    ],
    [
        'name' => 'Sách An toàn thông tin mạng',
        'price' => 295000,
        'original_price' => 350000,
        'stock' => 6,
        'image' => 'https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=600&q=80'
    ],
    [
        'name' => 'Sổ tay Lập trình Python',
        'price' => 90000,
        'original_price' => null,
        'stock' => 30,
        'image' => 'https://images.unsplash.com/photo-1535905557558-afc4877a26fc?auto=format&fit=crop&w=600&q=80'
    ],
    [
        'name' => 'Bộ giáo trình Thiết kế UI/UX',
        'price' => 250000,
        'original_price' => 310000,
        'stock' => 5,
        'image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=600&q=80'
    ],
];

$filteredProducts = $products;

$keyword = $_GET['keyword'] ?? null;
if ($keyword !== null && trim($keyword) !== '') {
    $filteredProducts = array_filter(
        $filteredProducts,
        function ($product) use ($keyword) {
            return str_contains(
                strtolower($product['name']),
                strtolower(trim($keyword))
            );
        }
    );
}

$min_price = $_GET['min_price'] ?? null;
if ($min_price !== null && $min_price !== '') {
    $filteredProducts = array_filter(
        $filteredProducts,
        function ($product) use ($min_price) {
            return $product['price'] >= $min_price;
        }
    );
}

$max_price = $_GET['max_price'] ?? null;
if ($max_price !== null && $max_price !== '') {
    $filteredProducts = array_filter(
        $filteredProducts,
        function ($product) use ($max_price) {
            return $product['price'] <= $max_price;
        }
    );
}

?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tủ sách giáo trình - BookStore</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <header class="site-header">
        <div class="header-inner">
            <a class="brand" href="index.php">
                <span class="brand-icon">📚</span>
                <span>BookStore</span>
            </a>
            <nav class="main-nav">
                <a href="index.php">Trang chủ</a>
                <a href="products.php" class="active">Tủ sách</a>
            </nav>
        </div>
    </header>

    <main class="main-container">
        <div class="catalog-header">
            <h1 class="catalog-title">Tủ sách giáo trình VKU</h1>
            <p class="catalog-subtitle">Tra cứu học liệu giáo trình động với PHP thuần (Buổi 01).</p>
        </div>

        <!-- Layout 2 cột: Sidebar lọc bên trái, Danh sách sách bên phải -->
        <div class="catalog-layout">
            <!-- Sidebar: Bộ lọc tìm kiếm -->
            <aside class="filter-card">
                <h2 class="filter-title">
                    <span>🔍</span> Bộ lọc tìm kiếm
                </h2>

                <form method="GET" action="products.php">
                    <div class="filter-group">
                        <label class="filter-label" for="keyword">Từ khóa</label>
                        <input class="form-control" type="text" id="keyword" name="keyword"
                            value="<?= htmlspecialchars($keyword ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            placeholder="Tên sách...">
                    </div>

                    <div class="filter-group">
                        <label class="filter-label" for="min_price">Giá nhỏ nhất (đ)</label>
                        <input class="form-control" type="number" id="min_price" name="min_price" min="0" step="5000"
                            value="<?= htmlspecialchars($min_price ?? '') ?>" placeholder="Ví dụ: 100000">
                    </div>

                    <div class="filter-group">
                        <label class="filter-label" for="max_price">Giá lớn nhất (đ)</label>
                        <input class="form-control" type="number" id="max_price" name="max_price" min="0" step="5000"
                            value="<?= htmlspecialchars($max_price ?? '') ?>" placeholder="Ví dụ: 250000">
                    </div>

                    <div class="filter-actions">
                        <button class="btn" type="submit">Áp dụng bộ lọc</button>
                        <a class="btn btn-outline" href="products.php">Xóa bộ lọc</a>
                    </div>
                </form>

                <div class="quick-tags">
                    <div class="quick-tags-title">Gợi ý từ khóa:</div>
                    <div class="tag-list">
                        <a class="tag-link" href="products.php?keyword=PHP">PHP</a>
                        <a class="tag-link" href="products.php?keyword=Python">Python</a>
                        <a class="tag-link" href="products.php?keyword=Web">Web</a>
                        <a class="tag-link" href="products.php?keyword=giáo+trình">Giáo trình</a>
                        <a class="tag-link" href="products.php?max_price=150000">Sách <= 150k</a>
                    </div>
                </div>
            </aside>

            <!-- Cột nội dung chính: Danh sách sản phẩm -->
            <section class="catalog-main">
                <div class="catalog-content-header">
                    <span class="result-count">
                        Tìm thấy <strong><?= count($filteredProducts) ?></strong> cuốn sách
                    </span>
                    <?php if (($keyword !== null && trim($keyword) !== '') || ($min_price !== null && $min_price !== '') || ($max_price !== null && $max_price !== '')): ?>
                        <a href="products.php" style="font-size: 0.88rem; color: var(--accent); font-weight: 600;">✕ Bỏ lọc</a>
                    <?php endif; ?>
                </div>

                <?php if (sizeof($filteredProducts) === 0): ?>
                    <div class="empty-state">
                        <div class="empty-icon">🔎</div>
                        <h3 class="empty-title">Không tìm thấy sách phù hợp</h3>
                        <p class="empty-desc">Thử tìm kiếm với từ khóa khác hoặc điều chỉnh lại khoảng giá.</p>
                        <a class="btn btn-outline" href="products.php">Xem toàn bộ tủ sách</a>
                    </div>
                <?php else: ?>
                    <div class="product-grid">
                        <?php foreach ($filteredProducts as $product): ?>
                            <article class="product-card">
                                <div class="product-thumb">
                                    <img src="<?= htmlspecialchars($product['image'], ENT_QUOTES, 'UTF-8') ?>"
                                        alt="<?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?>"
                                        class="product-img"
                                        loading="lazy">
                                </div>

                                <div class="product-body">
                                    <h3 class="product-name">
                                        <?= htmlspecialchars($product['name']) ?>
                                    </h3>

                                    <div class="product-price-box">
                                        <span class="product-price">
                                            <?= htmlspecialchars(number_format($product['price'], 0, ",", ".")) ?> đ
                                        </span>
                                        <?php if (!empty($product['original_price']) && $product['original_price'] > $product['price']): ?>
                                            <span class="product-old-price">
                                                <del><?= htmlspecialchars(number_format($product['original_price'], 0, ",", ".")) ?> đ</del>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="product-meta">
                                        <?php if ($product['stock']): ?>
                                            <span class="badge badge-in-stock">
                                                Còn hàng (<?= htmlspecialchars($product['stock']) ?>)
                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-out-stock">
                                                Hết hàng
                                            </span>
                                        <?php endif; ?>

                                        <?php if (!empty($product['original_price']) && $product['original_price'] > $product['price']): ?>
                                            <span class="badge badge-discount">
                                                Giảm <?= round((($product['original_price'] - $product['price']) / $product['original_price']) * 100) ?>%
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </main>

    <footer class="site-footer">
        <div class="footer-inner">
            BookStore
        </div>
    </footer>
</body>

</html>