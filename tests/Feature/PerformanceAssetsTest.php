<?php

declare(strict_types=1);

namespace Tests\Feature;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Tests\TestCase;

final class PerformanceAssetsTest extends TestCase
{
    public function test_public_assets_are_webp_first(): void
    {
        $blocked = [];
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(public_path('assets')));

        foreach ($iterator as $file) {
            if (! $file->isFile()) {
                continue;
            }

            if (preg_match('/\.(png|jpe?g|pdf)$/i', $file->getFilename())) {
                $blocked[] = $file->getPathname();
            }
        }

        $this->assertSame([], $blocked);
    }

    public function test_rendered_pages_do_not_reference_legacy_image_formats(): void
    {
        foreach (['/', '/productos', '/categoria/ofertas', '/producto/pendon-roller'] as $path) {
            $content = $this->get($path)->assertOk()->getContent();

            $this->assertDoesNotMatchRegularExpression('/\.(png|jpe?g)(["?\'])/i', $content);
        }
    }
}
