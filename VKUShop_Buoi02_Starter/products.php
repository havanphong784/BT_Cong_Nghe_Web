<?php

$products = [
    ['name' => 'Áo thun VKU', 'price' => 150000, 'stock' => 20, 'icon' => '👕'],
    ['name' => 'Bình nước VKU', 'price' => 120000, 'stock' => 0, 'icon' => '🥤'],
    ['name' => 'Balo VKU', 'price' => 350000, 'stock' => 8, 'icon' => '🎒'],
    ['name' => 'Sổ tay VKU', 'price' => 50000, 'stock' => 35, 'icon' => '📒'],
    ['name' => 'Mũ lưỡi trai VKU', 'price' => 110000, 'stock' => 12, 'icon' => '🧢'],
    ['name' => 'Áo khoác VKU', 'price' => 420000, 'stock' => 5, 'icon' => '🧥'],
    ['name' => 'Túi tote VKU', 'price' => 90000, 'stock' => 18, 'icon' => '👜'],
    ['name' => 'Bộ quà tặng VKU', 'price' => 300000, 'stock' => 6, 'icon' => '🎁'],
];

$keyword = trim($_GET['keyword'] ?? '');
$minPriceInput = trim($_GET['min_price'] ?? '');
$maxPriceInput = trim($_GET['max_price'] ?? '');

$minPrice = $minPriceInput === '' ? null : (int) $minPriceInput;
$maxPrice = $maxPriceInput === '' ? null : (int) $maxPriceInput;

$filteredProducts = [];

foreach ($products as $product) {
    $matchesKeyword = $keyword === '' || stripos($product['name'], $keyword) !== false;
    $matchesMinPrice = $minPrice === null || $product['price'] >= $minPrice;
    $matchesMaxPrice = $maxPrice === null || $product['price'] <= $maxPrice;

    if ($matchesKeyword && $matchesMinPrice && $matchesMaxPrice) {
        $filteredProducts[] = $product;
    }
}
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sản phẩm - VKUShop</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header"><div class="header-inner"><a class="brand" href="index.php"><span class="brand-mark">V</span><span>VKUShop</span></a><nav class="main-nav"><a href="index.php">Trang chủ</a><a href="products.php">Sản phẩm</a><a href="create-product.php">Thêm sản phẩm</a><a href="create-category.php">Thêm danh mục</a></nav></div></header>
<main class="main-container">
    <h1 class="page-heading">Sản phẩm VKUShop</h1>
    <p class="page-subtitle">Dữ liệu hiện đang nằm trong PHP array. Database sẽ xuất hiện ở các buổi sau.</p>
    <section class="search-box">
        <form class="search-form" method="GET" action="products.php">
            <input class="form-control" type="text" name="keyword" placeholder="Tìm sản phẩm..." value="<?= htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') ?>">
            <input class="form-control" type="number" min="0" name="min_price" placeholder="Giá từ" value="<?= htmlspecialchars($minPriceInput, ENT_QUOTES, 'UTF-8') ?>">
            <input class="form-control" type="number" min="0" name="max_price" placeholder="Giá đến" value="<?= htmlspecialchars($maxPriceInput, ENT_QUOTES, 'UTF-8') ?>">
            <button class="btn" type="submit">Lọc sản phẩm</button>
        </form>
        <p class="search-note">Có thể kết hợp keyword + khoảng giá trên cùng một URL GET.</p>
    </section>

    <?php if (count($filteredProducts) === 0): ?>
        <div class="empty-state">Không tìm thấy sản phẩm phù hợp.</div>
    <?php else: ?>
        <section class="product-grid">
            <?php foreach ($filteredProducts as $product): ?>
                <article class="product-card">
                    <div class="product-thumb"><?= htmlspecialchars($product['icon'], ENT_QUOTES, 'UTF-8') ?></div>
                    <div class="product-body">
                        <h2 class="product-name"><?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <p class="product-price"><?= number_format($product['price'], 0, ',', '.') ?> đ</p>
                        <div class="product-meta">
                            <?php if ($product['stock'] > 0): ?>
                                <span class="badge badge-in-stock">Còn hàng: <?= $product['stock'] ?></span>
                            <?php else: ?>
                                <span class="badge badge-out-stock">Hết hàng</span>
                            <?php endif; ?>

                            <?php if ($product['price'] >= 300000): ?>
                                <span class="badge badge-premium">Cao cấp</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>
</main>
<footer class="site-footer"><div class="footer-inner">VKUShop • Công nghệ và lập trình web • VKU</div></footer>
</body>
</html>
