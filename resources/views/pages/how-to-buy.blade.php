<x-layouts.app :seo="$seo" :site="$site">
    <section class="page-shell">
        <p class="eyebrow">Compra</p>
        <h1>Como comprar en DDC</h1>
        <p>El pedido parte con una configuracion clara y termina con validacion de archivo, entrega y pago coordinado.</p>
    </section>
    <section class="section-band pt-0">
        <div class="grid gap-4 md:grid-cols-3">
            @foreach ([['Configura', 'Elige producto, opciones, entrega y metodo de pago.'], ['Valida', 'Un asesor revisa archivos, disponibilidad y tiempos.'], ['Produce', 'DDC confirma el pedido y prepara entrega o retiro.']] as [$title, $copy])
                <article class="rounded-lg border border-white/10 bg-white/[0.04] p-6">
                    <h2 class="text-2xl font800 text-white">{{ $title }}</h2>
                    <p class="mt-3 text-white/66">{{ $copy }}</p>
                </article>
            @endforeach
        </div>
    </section>
</x-layouts.app>
