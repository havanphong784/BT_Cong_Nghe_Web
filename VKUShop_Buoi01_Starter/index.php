<?php
$courseName = 'Công nghệ và lập trình web';
$school = 'VKU';
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VKUShop</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header"><div class="header-inner"><a class="brand" href="index.php"><span class="brand-mark">V</span><span>VKUShop</span></a><nav class="main-nav"><a href="index.php">Trang chủ</a><a href="products.php">Sản phẩm</a></nav></div></header>
<main class="main-container"><section class="hero"><h1>Chào mừng đến với VKUShop</h1><p>Project mẫu xuyên suốt học phần <?= htmlspecialchars($courseName) ?> tại <?= htmlspecialchars($school) ?>. Buổi 1 bắt đầu từ một website động rất nhỏ bằng PHP.</p><a class="btn" href="products.php">Xem sản phẩm</a></section></main>
<footer class="site-footer"><div class="footer-inner">VKUShop • Công nghệ và lập trình web • VKU</div></footer>
</body>
</html>
