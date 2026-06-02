<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Domain\Catalog\Catalog;
use Tests\TestCase;

final class CatalogDataTest extends TestCase
{
    public function test_catalog_keeps_expected_public_shape(): void
    {
        $this->assertCount(29, Catalog::products());
        $this->assertCount(7, Catalog::categories());
        $this->assertTrue(Catalog::categories()->has('ofertas'));
        $this->assertTrue(Catalog::categories()->has('regalos'));
    }

    public function test_client_catalog_payload_is_trimmed(): void
    {
        $product = Catalog::clientProducts()->first();

        $this->assertArrayHasKey('variants', $product);
        $this->assertArrayNotHasKey('desc', $product);
        $this->assertArrayNotHasKey('image', $product);
    }
}
