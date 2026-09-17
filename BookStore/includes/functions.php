<?php

/**
 * Hàm helper escape ký tự đặc biệt để chống XSS khi render dữ liệu người dùng ra HTML.
 *
 * @param string|null $value
 * @return string
 */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/**
 * Danh sách thể loại sách mẫu của BookStore.
 *
 * @return array<string, string>
 */
function getCategories(): array
{
    return [
        'textbook'   => 'Giáo trình chuẩn',
        'it'         => 'Công nghệ thông tin',
        'language'   => 'Ngoại ngữ chuyên ngành',
        'softskills' => 'Kỹ năng mềm',
    ];
}

/**
 * Helper lấy tên hiển thị của thể loại dựa vào key.
 *
 * @param string $key
 * @return string
 */
function getCategoryName(string $key): string
{
    $categories = getCategories();
    return $categories[$key] ?? $key;
}

/**
 * Helper định dạng số tiền VND theo chuẩn hiển thị của website.
 *
 * @param float|int|string $amount
 * @return string
 */
function formatCurrency(float|int|string $amount): string
{
    $numeric = is_numeric($amount) ? (float) $amount : 0;
    return number_format($numeric, 0, ',', '.') . ' đ';
}
