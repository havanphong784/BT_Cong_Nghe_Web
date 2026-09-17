<?php function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}


function getCategoryName(string $key): string
{
    $categories = [
        'shirt' => 'Áo',
        'accessory' => 'Phụ kiện',
        'gift' => 'Quà tặng',
    ];

    return $categories[$key] ?? $key;
}
