<x-layouts.app :seo="$seo" :site="$site">
    <section class="mx-auto grid max-w-7xl gap-8 px-4 py-10 md:grid-cols-[.95fr_1.05fr] md:px-6 lg:py-14">
        <div class="overflow-hidden rounded-lg border border-white/10 bg-neutral-900">
            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }} - DDC Publicidad" class="aspect-[4/3] w-full object-cover" width="900" height="675" fetchpriority="high" decoding="async">
        </div>
        <div>
            <p class="eyebrow">{{ $categories[$product['category']]['name'] ?? $product['category'] }}</p>
            <h1 class="mt-3 text-4xl font800 leading-tight text-white md:text-6xl">{{ $product['name'] }}</h1>
            <p class="mt-5 text-lg leading-8 text-white/70">{{ $product['desc'] }}</p>
            <p class="mt-4 rounded-md border border-white/10 bg-white/[0.04] p-4 text-sm leading-6 text-white/62">{{ $product['observations'] ?: 'Produccion sujeta a revision de archivo y confirmacion del asesor.' }}</p>

            <div class="mt-6 rounded-lg border border-white/10 bg-white/[0.04] p-5" data-product-detail="{{ $product['id'] }}">
                <div class="flex items-center justify-between gap-4">
                    <span class="text-sm font-semibold text-white/60">Precio configurado</span>
                    <strong class="text-3xl font800 text-cyan-200" data-detail-price>{{ \App\Domain\Catalog\Pricing::label($product) }}</strong>
                </div>
                <div class="mt-5 grid gap-4 sm:grid-cols-2">
                    @foreach ($product['options'] as $option)
                        <label class="field-label">
                            {{ $option['label'] }}
                            <select name="{{ $option['label'] }}" data-detail-option>
                                @foreach ($option['values'] as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </label>
                    @endforeach
                    <label class="field-label">
                        Entrega
                        <select data-detail-delivery>
                            @foreach ($site['deliveryOptions'] as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="field-label">
                        Pago
                        <select data-detail-payment>
                            @foreach ($site['paymentOptions'] as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <button class="primary-btn mt-5 w-full justify-center" type="button" data-add-detail="{{ $product['id'] }}">Agregar al carrito</button>
            </div>
        </div>
    </section>

    <section class="section-band">
        <div class="section-head">
            <div>
                <p class="eyebrow">Relacionados</p>
                <h2>Tambien te puede servir</h2>
            </div>
            <a href="{{ route('products') }}">Ver catalogo</a>
        </div>
        <div class="products-grid">
            @foreach (($related->isNotEmpty() ? $related : \App\Domain\Catalog\Catalog::products()->where('id', '!=', $product['id'])->take(4)) as $item)
                <x-product-card :product="$item" />
            @endforeach
        </div>
    </section>
</x-layouts.app>
