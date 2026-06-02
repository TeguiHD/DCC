<?php

declare(strict_types=1);

namespace App\Domain\Catalog;

use Illuminate\Support\Collection;

final class Catalog
{
    /**
     * @return Collection<int, array<string, mixed>>
     */
    public static function products(): Collection
    {
        return collect(require app_path('Domain/Catalog/Data/products.php'));
    }

    /**
     * @return Collection<string, array<string, mixed>>
     */
    public static function categories(): Collection
    {
        return collect(require app_path('Domain/Catalog/Data/categories.php'));
    }

    /**
     * @return array<string, mixed>
     */
    public static function site(): array
    {
        return require app_path('Domain/Catalog/Data/site.php');
    }

    /**
     * @return array<string, mixed>|null
     */
    public static function product(string $slug): ?array
    {
        return self::products()->firstWhere('slug', $slug);
    }

    /**
     * @return array<string, mixed>|null
     */
    public static function category(string $slug): ?array
    {
        return self::categories()->get($slug);
    }

    /**
     * @return Collection<int, array<string, mixed>>
     */
    public static function productsForCategory(string $slug): Collection
    {
        if ($slug === 'ofertas') {
            return self::offers();
        }

        return self::products()
            ->filter(fn (array $product): bool => ($product['category'] ?? null) === $slug
                || in_array($slug, $product['secondaryCategories'] ?? [], true))
            ->values();
    }

    /**
     * @return Collection<int, array<string, mixed>>
     */
    public static function offers(): Collection
    {
        return self::products()
            ->filter(fn (array $product): bool => filled($product['badge'] ?? null))
            ->values();
    }

    /**
     * @return Collection<int, array<string, mixed>>
     */
    public static function featured(): Collection
    {
        $ids = self::site()['featuredIds'];

        return self::products()
            ->filter(fn (array $product): bool => in_array($product['id'], $ids, true))
            ->values();
    }

    /**
     * @return Collection<int, array<string, mixed>>
     */
    public static function newProducts(): Collection
    {
        return self::products()
            ->filter(fn (array $product): bool => ($product['isNew'] ?? false) || ($product['badge'] ?? null) === 'Nuevo')
            ->values();
    }

    /**
     * @return Collection<int, array<string, mixed>>
     */
    public static function related(array $product, int $limit = 4): Collection
    {
        return self::products()
            ->filter(fn (array $item): bool => $item['id'] !== $product['id'] && $item['category'] === $product['category'])
            ->take($limit)
            ->values();
    }

    /**
     * @return Collection<int, array<string, mixed>>
     */
    public static function clientProducts(): Collection
    {
        return self::products()
            ->map(fn (array $product): array => [
                'id' => $product['id'],
                'slug' => $product['slug'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quoteOnly' => $product['quoteOnly'] ?? false,
                'options' => $product['options'] ?? [],
                'variants' => $product['variants'] ?? [],
            ])
            ->values();
    }
}
