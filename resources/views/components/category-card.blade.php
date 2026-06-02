@props(['category'])

<a href="{{ route('category', $category['slug']) }}" class="group block rounded-lg border border-white/10 bg-white/[0.04] p-3 transition hover:border-cyan-300 hover:bg-white/[0.07]">
    <img src="{{ $category['image'] }}" alt="{{ $category['name'] }}" class="aspect-[16/10] w-full rounded-md object-cover" width="640" height="400" loading="lazy" decoding="async">
    <div class="mt-4">
        <h3 class="text-xl font800 text-white">{{ $category['name'] }}</h3>
        <p class="mt-2 text-sm leading-6 text-white/62">{{ $category['description'] }}</p>
    </div>
</a>
