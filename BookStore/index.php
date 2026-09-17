<?php
require_once __DIR__ . '/includes/functions.php';

$courseName = 'Công nghệ và lập trình web';
$school = 'VKU';
$siteName = 'BookStore';
$pageTitle = 'Trang chủ';
$activeNav = 'home';

require __DIR__ . '/includes/header.php';
?>

<main class="main-container">
    <!-- Hero Section: Split 2 columns -->
    <section class="hero-split">
        <div class="hero-content">
            <div class="hero-pill">✨ Học phần <?= e($courseName) ?> • <?= e($school) ?></div>
            <h1 class="hero-title">Không gian tri thức & Sách giáo trình VKU</h1>
            <p class="hero-desc">
                Hệ thống tra cứu và phân phối giáo trình trực tuyến dành cho sinh viên.
                Dự án thực hành Buổi 1 & 2 xây dựng website động tinh gọn với PHP: mảng dữ liệu, tìm kiếm GET, lọc theo khoảng giá, thêm sách với POST và validation an toàn.
            </p>
            <div class="hero-actions">
                <a class="btn" href="products.php">Khám phá tủ sách →</a>
                <a class="btn btn-secondary" href="create-product.php">+ Thêm sách mới</a>
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
                <h3>Quản lý tiện lợi</h3>
                <p>Thêm đầu sách mới với xác thực form chặt chẽ phía server theo chuẩn Buổi 02.</p>
            </div>
        </div>
    </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
