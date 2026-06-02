<footer class="border-t border-white/10 bg-neutral-950">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 py-10 md:grid-cols-[1.3fr_.8fr_.8fr] md:px-6">
        <div>
            <img src="{{ $site['logo'] }}" alt="DDC Publicidad" class="h-14 w-40 object-contain" width="160" height="56" loading="lazy" decoding="async">
            <p class="mt-4 max-w-xl text-sm leading-6 text-white/66">Soluciones de impresion digital, graficas publicitarias, letreros y material corporativo para marcas que necesitan destacar.</p>
            <p class="mt-4 text-sm text-white/72">{{ $site['address'] }}</p>
        </div>
        <nav class="grid gap-2 text-sm text-white/72" aria-label="Navegacion del pie">
            <h2 class="text-base font-bold text-white">Navegacion</h2>
            <a href="{{ route('home') }}">Inicio</a>
            <a href="{{ route('services') }}">Servicios</a>
            <a href="{{ route('category', 'ofertas') }}">Ofertas</a>
            <a href="{{ route('how-to-buy') }}">Como Comprar</a>
            <a href="{{ route('terms') }}">Terminos</a>
            <a href="{{ route('privacy') }}">Privacidad</a>
        </nav>
        <div class="grid gap-2 text-sm text-white/72">
            <h2 class="text-base font-bold text-white">Contacto</h2>
            <a href="{{ $site['whatsapp'] }}" target="_blank" rel="noopener noreferrer">{{ $site['phone'] }}</a>
            <a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a>
            <a href="{{ $site['instagram'] }}" target="_blank" rel="noopener noreferrer">@ddcpublicidad</a>
        </div>
    </div>
    <div class="border-t border-white/10 px-4 py-4 text-center text-xs text-white/55">
        2026 DDC Publicidad. Desarrollado por NETLINKS.
    </div>
</footer>
