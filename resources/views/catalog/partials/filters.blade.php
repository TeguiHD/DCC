<div class="rounded-lg border border-white/10 bg-white/[0.04] p-4">
    <div class="grid gap-3 md:grid-cols-[1fr_auto]">
        <label class="sr-only" for="catalog-search">Buscar productos</label>
        <input id="catalog-search" class="search-input" type="search" placeholder="Buscar: stickers, pendon, letrero, tarjetas..." data-product-search>
        <a class="secondary-btn justify-center" href="{{ route('contact') }}">Hablar con asesor</a>
    </div>
    <div class="mt-4 flex flex-wrap gap-2" aria-label="Filtros de categorias">
        <button class="filter-pill {{ $activeCategory === 'all' ? 'is-active' : '' }}" type="button" data-filter-category="all">Todas</button>
        @foreach ($categories as $category)
            <button class="filter-pill {{ $activeCategory === $category['slug'] ? 'is-active' : '' }}" type="button" data-filter-category="{{ $category['slug'] }}">{{ $category['shortName'] }}</button>
        @endforeach
    </div>
</div>
