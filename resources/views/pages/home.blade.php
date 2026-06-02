<x-layouts.app :seo="$seo" :site="$site">
    <section class="relative overflow-hidden border-b border-white/10 bg-neutral-950">
        <div class="mx-auto grid max-w-7xl items-center gap-8 px-4 py-10 md:grid-cols-[1fr_.9fr] md:px-6 lg:py-14">
            <div>
                <p class="eyebrow">{{ $site['heroSlides'][0]['badge'] }}</p>
                <h1 class="mt-4 max-w-4xl text-5xl font800 leading-none text-white md:text-7xl">Impresion digital y offset en Santiago</h1>
                <p class="mt-5 max-w-2xl text-lg leading-8 text-white/72">Tu marca en grande con pendones, stickers, paneles, letreros y graficas para retail.</p>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a class="primary-btn" href="{{ route('category', 'ofertas') }}">Ver ofertas</a>
                    <a class="secondary-btn" href="{{ route('products') }}">Explorar productos</a>
                </div>
                <div class="mt-8 grid max-w-2xl grid-cols-3 gap-3 text-sm text-white/68">
                    <span class="metric-pill">20.000+ clientes</span>
                    <span class="metric-pill">Envio a Chile</span>
                    <span class="metric-pill">Soporte experto</span>
                </div>
            </div>
            <div class="relative min-h-[420px] overflow-hidden rounded-lg border border-white/10 bg-black">
                <div class="hero-slide is-active" data-hero-slide>
                    <img src="{{ $site['heroSlides'][0]['image'] }}" alt="{{ $site['heroSlides'][0]['tag'] }}" class="h-full min-h-[420px] w-full object-cover" width="760" height="570" fetchpriority="high" decoding="async">
                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black via-black/70 to-transparent p-5">
                        <p class="text-sm font-bold text-yellow-200">{{ $site['heroSlides'][0]['tag'] }}</p>
                        <p class="mt-2 text-2xl font800 text-white">{{ $site['heroSlides'][0]['subtitle'] }}</p>
                    </div>
                </div>
                @foreach (array_slice($site['heroSlides'], 1) as $slide)
                    <div class="hero-slide" data-hero-slide>
                        <img src="{{ $slide['image'] }}" alt="{{ $slide['tag'] }}" class="h-full min-h-[420px] w-full object-cover" width="760" height="570" loading="lazy" decoding="async">
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black via-black/70 to-transparent p-5">
                            <p class="text-sm font-bold text-yellow-200">{{ $slide['tag'] }}</p>
                            <p class="mt-2 text-2xl font800 text-white">{{ $slide['subtitle'] }}</p>
                        </div>
                    </div>
                @endforeach
                <div class="absolute bottom-4 right-4 flex gap-2" data-hero-dots></div>
            </div>
        </div>
    </section>

    <section class="section-band">
        <div class="section-head">
            <div>
                <p class="eyebrow">Categorias</p>
                <h2>Explorar servicios por necesidad</h2>
            </div>
            <a href="{{ route('categories') }}">Ver todas</a>
        </div>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($categories->take(4) as $category)
                <x-category-card :category="$category" />
            @endforeach
        </div>
    </section>

    <section class="section-band">
        <div class="section-head">
            <div>
                <p class="eyebrow">Destacados</p>
                <h2>Productos listos para cotizar</h2>
            </div>
            <a href="{{ route('products') }}">Ver catalogo</a>
        </div>
        <div class="products-grid">
            @foreach ($featured as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </section>

    <section class="section-band">
        <div class="section-head">
            <div>
                <p class="eyebrow">Ofertas</p>
                <h2>Condiciones activas</h2>
            </div>
            <a href="{{ route('category', 'ofertas') }}">Ver ofertas</a>
        </div>
        <div class="products-grid">
            @foreach ($offers as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </section>
</x-layouts.app>
