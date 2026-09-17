<?php
require_once __DIR__ . '/functions.php';

$siteName = $siteName ?? 'BookStore';
$fullTitle = isset($pageTitle) ? $pageTitle . ' - ' . $siteName : $siteName . ' - Nhà sách sinh viên VKU';
$activeNav = $activeNav ?? '';
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($fullTitle) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="site-header">
        <div class="header-inner">
            <a class="brand" href="index.php">
                <span class="brand-icon">📚</span>
                <span><?= e($siteName) ?></span>
            </a>
            <nav class="main-nav">
                <a href="index.php" class="<?= $activeNav === 'home' ? 'active' : '' ?>">Trang chủ</a>
                <a href="products.php" class="<?= $activeNav === 'products' ? 'active' : '' ?>">Tủ sách</a>
                <a href="create-product.php" class="<?= $activeNav === 'create' ? 'active' : '' ?>">Thêm sách</a>
            </nav>
        </div>
    </header>
