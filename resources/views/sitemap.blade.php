<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($paths as $path)
    <url>
        <loc>{{ $base }}{{ $path === '/' ? '' : $path }}</loc>
        <lastmod>{{ $date }}</lastmod>
        <changefreq>{{ str_starts_with($path, '/producto') || str_starts_with($path, '/categoria') ? 'weekly' : 'monthly' }}</changefreq>
        <priority>{{ $path === '/' ? '1.0' : (str_starts_with($path, '/producto') ? '0.6' : '0.8') }}</priority>
    </url>
@endforeach
</urlset>
