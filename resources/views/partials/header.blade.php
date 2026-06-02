<header class="sticky top-0 z-40 border-b border-white/10 bg-neutral-950/92 backdrop-blur">
    <div class="mx-auto grid max-w-7xl grid-cols-[auto_1fr_auto] items-center gap-4 px-4 py-3 md:px-6">
        <a href="{{ route('home') }}" class="inline-flex items-center" aria-label="Ir al inicio">
            <img src="{{ $site['logo'] }}" alt="DDC Publicidad" class="h-12 w-36 object-contain" width="144" height="48" fetchpriority="high" decoding="async">
        </a>

        <nav id="main-menu" class="hidden items-center justify-center gap-1 text-sm font-semibold text-white/82 lg:flex" aria-label="Menu principal">
            <a class="nav-link" href="{{ route('category', 'ofertas') }}">Ofertas</a>
            <a class="nav-link" href="{{ route('services') }}">Servicios</a>
            <a class="nav-link" href="{{ route('products') }}">Productos</a>
            <a class="nav-link" href="{{ route('categories') }}">Categorias</a>
            <a class="nav-link" href="{{ route('about') }}">Nosotros</a>
            <a class="nav-link" href="{{ route('contact') }}">Contacto</a>
        </nav>

        <div class="flex items-center justify-end gap-2">
            <button class="icon-text-btn lg:hidden" type="button" data-menu-toggle aria-controls="mobile-menu" aria-expanded="false">
                <span>Menu</span>
            </button>
            <a class="hidden rounded-md border border-white/15 px-3 py-2 text-sm font700 text-white/86 transition hover:border-cyan-300 hover:text-cyan-100 md:inline-flex" href="{{ route('how-to-buy') }}">Mi cuenta</a>
            <button class="cart-trigger" type="button" data-cart-open aria-label="Abrir carrito">
                Carrito <span data-cart-count>0</span>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden border-t border-white/10 bg-neutral-950 px-4 py-3 lg:hidden">
        <nav class="grid gap-2 text-sm font-semibold text-white/84" aria-label="Menu movil">
            <a href="{{ route('category', 'ofertas') }}">Ofertas</a>
            <a href="{{ route('services') }}">Servicios</a>
            <a href="{{ route('products') }}">Productos</a>
            <a href="{{ route('categories') }}">Categorias</a>
            <a href="{{ route('about') }}">Nosotros</a>
            <a href="{{ route('contact') }}">Contacto</a>
        </nav>
    </div>
</header>
