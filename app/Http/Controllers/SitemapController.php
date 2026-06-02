<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\Catalog\Catalog;
use Illuminate\Http\Response;

final class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $base = rtrim((string) Catalog::site()['baseUrl'], '/');
        $paths = collect(['/', '/servicios', '/productos', '/categorias', '/como-comprar', '/nosotros', '/contacto', '/terminos', '/privacidad'])
            ->merge(Catalog::categories()->keys()->map(fn (string $slug): string => "/categoria/{$slug}"))
            ->merge(Catalog::products()->pluck('slug')->map(fn (string $slug): string => "/producto/{$slug}"));

        return response()
            ->view('sitemap', ['base' => $base, 'paths' => $paths, 'date' => now()->toDateString()])
            ->header('Content-Type', 'application/xml');
    }
}
