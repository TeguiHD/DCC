@props(['product'])

<article class="product-card" data-product-card data-category="{{ $product['category'] }}" data-secondary="{{ implode(' ', $product['secondaryCategories'] ?? []) }}" data-offer="{{ filled($product['badge'] ?? null) ? '1' : '0' }}" data-search="{{ strtolower($product['name'].' '.$product['desc'].' '.$product['category']) }}">
    <a href="{{ route('product', $product['slug']) }}" class="block overflow-hidden rounded-md bg-neutral-900">
        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }} - DDC Publicidad" class="aspect-[4/3] w-full object-cover transition duration-300 hover:scale-105" width="640" height="480" loading="lazy" decoding="async">
    </a>
    <div class="mt-4 flex min-h-[28px] items-center justify-between gap-2">
        <span class="badge {{ filled($product['badge'] ?? null) ? '' : 'invisible' }}">{{ $product['badge'] ?? 'Sin badge' }}</span>
        <span class="text-xs font-semibold text-white/50">{{ $product['quoteOnly'] ? 'Cotizacion' : 'Online' }}</span>
    </div>
    <h3 class="mt-3 text-lg font800 leading-6 text-white">
        <a href="{{ route('product', $product['slug']) }}">{{ $product['name'] }}</a>
    </h3>
    <p class="mt-2 line-clamp-3 min-h-[72px] text-sm leading-6 text-white/62">{{ $product['desc'] }}</p>
    <p class="mt-3 text-xs font-semibold uppercase text-white/42">Opciones: {{ collect($product['options'])->pluck('label')->join(' / ') }}</p>
    <div class="mt-4 flex items-end justify-between gap-3">
        <div>
            @if (($product['oldPrice'] ?? 0) > 0)
                <p class="text-sm text-white/42 line-through">{{ \App\Domain\Catalog\Pricing::money($product['oldPrice']) }}</p>
            @endif
            <p class="text-xl font800 text-cyan-200">{{ \App\Domain\Catalog\Pricing::label($product) }}</p>
        </div>
        <button class="rounded-md bg-pink-500 px-3 py-2 text-sm font800 text-white transition hover:bg-yellow-300 hover:text-neutral-950" type="button" data-add-product="{{ $product['id'] }}">Agregar</button>
    </div>
</article>
