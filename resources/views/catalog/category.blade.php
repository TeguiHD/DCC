<x-layouts.app :seo="$seo" :site="$site">
    <section class="relative overflow-hidden border-b border-white/10 bg-neutral-950">
        <div class="mx-auto grid max-w-7xl items-center gap-8 px-4 py-10 md:grid-cols-[.9fr_1fr] md:px-6">
            <img src="{{ $category['image'] }}" alt="{{ $category['name'] }}" class="aspect-[16/10] w-full rounded-lg object-cover" width="760" height="475" fetchpriority="high" decoding="async">
            <div>
                <p class="eyebrow">Categoria</p>
                <h1 class="mt-3 text-5xl font800 leading-none text-white md:text-6xl">{{ $category['name'] }}</h1>
                <p class="mt-5 max-w-2xl text-lg leading-8 text-white/70">{{ $category['description'] }}</p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a class="primary-btn" href="{{ route('contact') }}">Cotizar con asesor</a>
                    <a class="secondary-btn" href="{{ route('products') }}">Ver todo</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-band">
        @if ($products->isEmpty())
            <div class="rounded-lg border border-white/10 bg-white/[0.04] p-8">
                <h2 class="text-2xl font800 text-white">Pronto tendremos productos publicados aqui</h2>
                <p class="mt-3 max-w-2xl text-white/66">La categoria esta disponible para navegacion y cotizaciones personalizadas.</p>
                <a class="primary-btn mt-6 inline-flex" href="{{ route('contact') }}">Solicitar cotizacion</a>
            </div>
        @else
            <div class="products-grid" data-products-grid>
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        @endif
    </section>
</x-layouts.app>
