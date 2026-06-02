<x-layouts.app :seo="$seo" :site="$site">
    <section class="page-shell">
        <p class="eyebrow">Tienda online</p>
        <h1>{{ $headline }}</h1>
        <p>{{ $intro }}</p>
    </section>

    <section class="section-band pt-0">
        @include('catalog.partials.filters', ['categories' => $categories, 'activeCategory' => $activeCategory])
        <div class="products-grid mt-7" data-products-grid>
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
        <p class="hidden rounded-md border border-white/10 bg-white/[0.04] p-6 text-white/70" data-empty-products>No se encontraron productos para este filtro.</p>
    </section>
</x-layouts.app>
