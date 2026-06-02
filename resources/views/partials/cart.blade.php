<div class="fixed inset-0 z-50 bg-black/58" data-cart-overlay hidden></div>
<aside class="fixed right-0 top-0 z-50 flex h-dvh w-full max-w-md translate-x-full flex-col border-l border-white/10 bg-neutral-950 text-white shadow-2xl transition-transform duration-300" data-cart-drawer aria-hidden="true">
    <div class="flex items-center justify-between border-b border-white/10 px-5 py-4">
        <h2 class="text-lg font-bold">Mi Carrito</h2>
        <button class="icon-btn" type="button" data-cart-close aria-label="Cerrar carrito">X</button>
    </div>
    <div class="flex-1 overflow-y-auto px-5 py-4" data-cart-items></div>
    <div class="border-t border-white/10 px-5 py-4">
        <div class="grid gap-2 text-sm">
            <div class="flex justify-between"><span class="text-white/62">Subtotal</span><strong data-cart-subtotal>$0</strong></div>
            <div class="flex justify-between"><span class="text-white/62">Envio</span><strong data-cart-shipping>$0</strong></div>
            <div class="flex justify-between border-t border-white/10 pt-3 text-lg"><span>Total</span><strong data-cart-total>$0</strong></div>
        </div>
        <button class="mt-4 w-full rounded-md bg-cyan-300 px-4 py-3 font800 text-neutral-950 transition hover:bg-yellow-300" type="button" data-checkout>Flow proximamente</button>
        <button class="mt-2 w-full rounded-md border border-white/14 px-4 py-3 font700 text-white/80 transition hover:border-pink-400" type="button" data-cart-close>Continuar comprando</button>
    </div>
</aside>
<div class="fixed bottom-4 right-4 z-40 rounded-md bg-cyan-300 px-4 py-3 text-sm font-bold text-neutral-950 shadow-xl" data-toast hidden></div>
