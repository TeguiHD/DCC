<x-layouts.app :seo="$seo" :site="$site">
    <section class="page-shell">
        <p class="eyebrow">Contacto</p>
        <h1>Cotiza tu proyecto grafico</h1>
        <p>Comparte medidas, material, cantidad y fecha ideal para recibir orientacion comercial.</p>
    </section>
    <section class="section-band pt-0">
        <div class="grid gap-6 md:grid-cols-[.8fr_1.2fr]">
            <div class="rounded-lg border border-white/10 bg-white/[0.04] p-6">
                <h2 class="text-2xl font800">Datos DDC</h2>
                <div class="mt-5 grid gap-3 text-white/70">
                    <a href="{{ $site['whatsapp'] }}" target="_blank" rel="noopener noreferrer">{{ $site['phone'] }}</a>
                    <a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a>
                    <span>{{ $site['address'] }}</span>
                    <a href="{{ $site['instagram'] }}" target="_blank" rel="noopener noreferrer">@ddcpublicidad</a>
                </div>
            </div>
            <form class="rounded-lg border border-white/10 bg-white/[0.04] p-6" action="mailto:{{ $site['email'] }}" method="post" enctype="text/plain">
                <div class="grid gap-4 md:grid-cols-2">
                    <label class="field-label">Nombre<input name="nombre" required></label>
                    <label class="field-label">Email<input name="email" type="email" required></label>
                    <label class="field-label md:col-span-2">Proyecto<textarea name="proyecto" rows="6" required></textarea></label>
                </div>
                <button class="primary-btn mt-5" type="submit">Enviar cotizacion</button>
            </form>
        </div>
    </section>
</x-layouts.app>
