<?php

declare(strict_types=1);

namespace App\Domain\Seo;

use App\Domain\Catalog\Catalog;

final class Meta
{
    /**
     * @return array{title: string, description: string, canonical: string}
     */
    public static function make(string $title, string $description, string $path = '/'): array
    {
        $base = rtrim((string) Catalog::site()['baseUrl'], '/');

        return [
            'title' => str_starts_with($title, 'DDC Publicidad') ? $title : "DDC Publicidad | {$title}",
            'description' => $description,
            'canonical' => $base.'/'.ltrim($path, '/'),
        ];
    }
}
