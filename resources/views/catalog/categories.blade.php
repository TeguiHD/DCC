<x-layouts.app :seo="$seo" :site="$site">
    <section class="page-shell">
        <p class="eyebrow">Categorias</p>
        <h1>Servicios organizados por dominio</h1>
        <p>Una estructura clara para navegar, mantener y ampliar el catalogo DDC.</p>
    </section>
    <section class="section-band pt-0">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($categories as $category)
                <x-category-card :category="$category" />
            @endforeach
        </div>
    </section>
</x-layouts.app>
