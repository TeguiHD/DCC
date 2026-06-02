<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Domain\Catalog\Catalog;
use Tests\TestCase;

final class CatalogRoutesTest extends TestCase
{
    public function test_public_pages_load_without_html_links(): void
    {
        foreach (['/', '/servicios', '/productos', '/categorias', '/como-comprar', '/nosotros', '/contacto', '/terminos', '/privacidad'] as $path) {
            $response = $this->get($path);

            $response->assertOk();
            $this->assertStringNotContainsString('.html', $response->getContent());
        }
    }

    public function test_all_product_routes_load(): void
    {
        Catalog::products()->each(function (array $product): void {
            $this->get('/producto/'.$product['slug'])
                ->assertOk()
                ->assertSee($product['name'], false);
        });

        $this->assertCount(29, Catalog::products());
    }

    public function test_all_category_routes_load(): void
    {
        Catalog::categories()->each(function (array $category): void {
            $this->get('/categoria/'.$category['slug'])
                ->assertOk()
                ->assertSee($category['name'], false);
        });

        $this->assertCount(7, Catalog::categories());
    }

    public function test_offers_and_quote_only_rules_are_preserved(): void
    {
        $this->get('/categoria/ofertas')
            ->assertOk()
            ->assertSee('Popular', false);

        $this->get('/producto/instalacion-vinil-pvc')
            ->assertOk()
            ->assertSee('Cotizar', false);
    }

    public function test_legacy_html_routes_redirect(): void
    {
        $this->get('/productos.html')->assertRedirect('/productos');
        $this->get('/producto.html?slug=pendon-roller')->assertRedirect('/producto/pendon-roller');
        $this->get('/servicios.html?cat=ofertas')->assertRedirect('/categoria/ofertas');
    }

    public function test_sitemap_contains_products_and_categories(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertOk()
            ->assertSee('https://ddcpublicidad.cl/producto/pendon-roller', false)
            ->assertSee('https://ddcpublicidad.cl/categoria/ofertas', false);
    }
}
