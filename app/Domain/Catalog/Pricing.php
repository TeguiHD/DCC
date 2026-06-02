<?php

declare(strict_types=1);

namespace App\Domain\Catalog;

final class Pricing
{
    public static function money(int|float $value): string
    {
        return '$'.number_format((float) $value, 0, ',', '.');
    }

    /**
     * @param array<string, mixed> $product
     */
    public static function label(array $product): string
    {
        if (($product['quoteOnly'] ?? false) || (int) ($product['price'] ?? 0) <= 0) {
            return 'Cotizar';
        }

        return 'Desde '.self::money((int) $product['price']);
    }
}
