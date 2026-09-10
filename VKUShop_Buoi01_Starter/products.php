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
    <title>Sản phẩm - VKUShop</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <header class="site-header">
        <div class="header-inner"><a class="brand" href="index.php"><span
                    class="brand-mark">V</span><span>VKUShop</span></a>
            <nav class="main-nav"><a href="index.php">Trang chủ</a><a href="products.php">Sản phẩm</a></nav>
        </div>
    </header>
    <main class="main-container">
        <h1 class="page-heading">Sản phẩm VKUShop</h1>
        <p class="page-subtitle">Dữ liệu hiện đang nằm trong PHP array. Database sẽ xuất hiện ở các buổi sau.</p>
        <section class="search-box">
            <form class="search-form" method="GET" action="products.php?key">
                <input class="form-control" type="text" name="keyword"
                    value="<?= htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') ?>" placeholder="Tìm sản phẩm...">
                <input class="form-control" type="number" min=0 name="min_price"
                    value="<?= htmlspecialchars($min_price ?? '') ?>" placeholder="Gía nhỏ nhất">
                <input class="form-control" type="number" min=0 name="max_price"
                    value="<?= htmlspecialchars($max_price ?? '') ?>" placeholder="Gía lớn nhất">
                <button class="btn" type="submit">Tìm kiếm</button>
            </form>
            <p class="search-note">Ví dụ: <strong>vku</strong>, <strong>áo</strong>, <strong>balo</strong>.</p>
        </section>

        <?php if (sizeof($filteredProducts) === 0): ?>
            <h4>Không tìm thấy sản phẩm phù hợp.</h4>

        <?php else: ?>
            <section class="product-grid">
                <?php foreach ($filteredProducts as $product): ?>
                    <article class="product-card">
                        <div class="product-thumb">
                            <?= htmlspecialchars($product['icon']) ?>
                        </div>

                        <div class="product-body">
                            <h2 class="product-name">
                                <?= htmlspecialchars($product['name']) ?>
                            </h2>

                            <p class="product-price">
                                <?= htmlspecialchars(number_format($product['price'], 0, ",", ".")) ?>
                            </p>

                            <div class="product-meta">
                                <?php if ($product['stock']): ?>
                                    <span class="badge badge-in-stock">
                                        <span>Còn hàng: </span>
                                        <?= htmlspecialchars($product['stock']) ?>
                                    </span>
                                <?php else: ?>
                                    <span class="badge badge-out-stock">
                                        <span>Hết hàng</span>
                                    </span>
                                <?php endif; ?>
                                <?php if ($product['price'] > 300000): ?>
                                    <span class="badge badge-premium">
                                        Cao cấp
                                    </span>
                                <?php endif ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach ?>
            </section>
        <?php endif; ?>

    </main>
    <footer class="site-footer">
        <div class="footer-inner">VKUShop • Công nghệ và lập trình web • VKU</div>
    </footer>
</body>

</html>