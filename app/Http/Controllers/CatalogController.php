<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\Catalog\Catalog;
use App\Domain\Seo\Meta;
use Illuminate\Contracts\View\View;

final class CatalogController extends Controller
{
    public function services(): View
    {
        return view('catalog.index', [
            'seo' => Meta::make('Servicios', 'Catalogo de servicios DDC Publicidad: impresion, adhesivos, graficas y letreros.', '/servicios'),
            'site' => Catalog::site(),
            'categories' => Catalog::categories(),
            'products' => Catalog::products(),
            'headline' => 'Catalogo completo de servicios',
            'intro' => 'Filtra, configura y arma tu pedido desde una base profesional de productos graficos.',
            'activeCategory' => 'all',
        ]);
    }

    public function products(): View
    {
        return view('catalog.index', [
            'seo' => Meta::make('Productos', 'Catalogo de productos DDC Publicidad con precios, variantes y cotizacion.', '/productos'),
            'site' => Catalog::site(),
            'categories' => Catalog::categories(),
            'products' => Catalog::products(),
            'headline' => 'Catalogo completo de productos',
            'intro' => 'Productos configurables para impresion, adhesivos, letreros y activaciones.',
            'activeCategory' => 'all',
        ]);
    }

    public function categories(): View
    {
        return view('catalog.categories', [
            'seo' => Meta::make('Categorias', 'Categorias de productos y servicios DDC Publicidad.', '/categorias'),
            'site' => Catalog::site(),
            'categories' => Catalog::categories(),
        ]);
    }

    public function category(string $slug): View
    {
        $category = Catalog::category($slug);
        abort_if($category === null, 404);

        return view('catalog.category', [
            'seo' => Meta::make($category['name'], $category['description'], "/categoria/{$slug}"),
            'site' => Catalog::site(),
            'categories' => Catalog::categories(),
            'category' => $category,
            'products' => Catalog::productsForCategory($slug),
            'activeCategory' => $slug,
        ]);
    }

    public function product(string $slug): View
    {
        $product = Catalog::product($slug);
        abort_if($product === null, 404);

        return view('catalog.product', [
            'seo' => Meta::make($product['name'], str($product['desc'])->limit(155)->toString(), "/producto/{$slug}"),
            'site' => Catalog::site(),
            'categories' => Catalog::categories(),
            'product' => $product,
            'related' => Catalog::related($product),
            'fresh' => Catalog::newProducts()->filter(fn (array $item): bool => $item['id'] !== $product['id'])->take(4)->values(),
        ]);
    }
}
