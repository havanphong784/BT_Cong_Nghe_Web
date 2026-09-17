<?php
$courseName = 'Công nghệ và lập trình web';
$school = 'VKU';
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VKUShop - Buổi 2</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="header-inner">
        <a class="brand" href="index.php"><span class="brand-mark">V</span><span>VKUShop</span></a>
        <nav class="main-nav">
            <a href="index.php">Trang chủ</a>
            <a href="products.php">Sản phẩm</a>
            <a href="create-product.php">Thêm sản phẩm</a>
            <a href="create-category.php">Thêm danh mục</a>
        </nav>
    </div>
</header>

<main class="main-container">
    <section class="hero">
        <h1>VKUShop — Buổi 2</h1>
        <p>
            Form, POST, validation phía server và tổ chức code dùng lại.
            Dữ liệu hợp lệ mới chỉ được preview; chúng ta chưa lưu database ở buổi này.
        </p>
        <div class="hero-actions">
            <a class="btn" href="create-product.php">Thực hành thêm sản phẩm</a>
            <a class="btn btn-secondary" href="products.php">Xem sản phẩm Buổi 1</a>
        </div>
    </section>
</main>

<footer class="site-footer"><div class="footer-inner">VKUShop • Công nghệ và lập trình web • VKU</div></footer>
</body>
</html>
