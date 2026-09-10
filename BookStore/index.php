<?php
$courseName = 'Công nghệ và lập trình web';
$school = 'VKU';
$siteName = 'BookStore';
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($siteName) ?> - Nhà sách sinh viên VKU</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="site-header">
        <div class="header-inner">
            <a class="brand" href="index.php">
                <span class="brand-icon">📚</span>
                <span><?= htmlspecialchars($siteName) ?></span>
            </a>
            <nav class="main-nav">
                <a href="index.php" class="active">Trang chủ</a>
                <a href="products.php">Tủ sách</a>
            </nav>
        </div>
    </header>

    <main class="main-container">
        <!-- Hero Section: Split 2 columns -->
        <section class="hero-split">
            <div class="hero-content">
                <div class="hero-pill">✨ Học phần <?= htmlspecialchars($courseName) ?> • <?= htmlspecialchars($school) ?></div>
                <h1 class="hero-title">Không gian tri thức & Sách giáo trình VKU</h1>
                <p class="hero-desc">
                    Hệ thống tra cứu và phân phối giáo trình trực tuyến dành cho sinh viên. 
                    Dự án thực hành Buổi 1 xây dựng website động tinh gọn với PHP: mảng dữ liệu, tìm kiếm bằng GET và lọc theo khoảng giá.
                </p>
                <div class="hero-actions">
                    <a class="btn" href="products.php">Khám phá tủ sách →</a>
                    <a class="btn btn-secondary" href="products.php?keyword=PHP">Giáo trình Web PHP</a>
                </div>
            </div>

            <div class="hero-preview">
                <div class="preview-item">
                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=120&q=80" 
                         alt="PHP" class="preview-item-img" loading="lazy">
                    <div>
                        <div class="preview-item-title">Lập trình Web PHP</div>
                        <div class="preview-item-price">120.000 đ • <span style="color: var(--accent);">Giảm 20%</span></div>
                    </div>
                </div>
                <div class="preview-item">
                    <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=120&q=80" 
                         alt="AI" class="preview-item-img" loading="lazy">
                    <div>
                        <div class="preview-item-title">Trí tuệ nhân tạo nâng cao</div>
                        <div class="preview-item-price">270.000 đ • <span style="color: var(--accent);">Giảm 15%</span></div>
                    </div>
                </div>
                <div class="preview-item">
                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=120&q=80" 
                         alt="UI/UX" class="preview-item-img" loading="lazy">
                    <div>
                        <div class="preview-item-title">Bộ giáo trình Thiết kế UI/UX</div>
                        <div class="preview-item-price">250.000 đ • <span style="color: var(--accent);">Giảm 19%</span></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3 Feature highlight boxes -->
        <section class="features-grid">
            <div class="feature-box">
                <div class="feature-box-icon">📖</div>
                <div>
                    <h3>100% Giáo trình chuẩn</h3>
                    <p>Biên soạn và lưu hành nội bộ theo khung chương trình đào tạo của nhà trường.</p>
                </div>
            </div>

            <div class="feature-box">
                <div class="feature-box-icon">⚡</div>
                <div>
                    <h3>Tra cứu thông minh</h3>
                    <p>Tìm kiếm theo từ khóa và lọc theo khoảng giá nhanh chóng thông qua phương thức GET.</p>
                </div>
            </div>

            <div class="feature-box">
                <div class="feature-box-icon">🏷️</div>
                <div>
                    <h3>Ưu đãi giảm giá</h3>
                    <p>Nhiều đầu sách giáo trình được trợ giá và giảm giá hấp dẫn dành cho sinh viên.</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="footer-inner">
            <?= htmlspecialchars($siteName) ?> • <?= htmlspecialchars($courseName) ?> • Trường Đại học CNTT & TT Việt - Hàn (<?= htmlspecialchars($school) ?>)
        </div>
    </footer>
</body>

</html>
