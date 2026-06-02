import { getCatalog } from './catalog';
import { currency, getDefaultOptions, getDetailOptions, getPriceForOptions } from './pricing';

const CART_STORAGE_KEY = 'ddc_cart_v4';
const SHIPPING = 5000;
const DELIVERY_DEFAULT = 'Retiro en tienda DDC';
const PAYMENT_DEFAULT = 'Flow proximamente';

let cart = loadCart();
let productsById = new Map();

function loadCart() {
    try {
        const parsed = JSON.parse(window.localStorage.getItem(CART_STORAGE_KEY) || '[]');
        return Array.isArray(parsed) ? parsed : [];
    } catch {
        return [];
    }
}

function saveCart() {
    window.localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(cart));
}

function itemKey(productId, selectedOptions, extras = {}) {
    return `${productId}|${selectedOptions.join('|')}|${extras.delivery || DELIVERY_DEFAULT}|${extras.payment || PAYMENT_DEFAULT}`;
}

function toast(text) {
    const node = document.querySelector('[data-toast]');
    if (!node) return;
    node.textContent = text;
    node.hidden = false;
    window.clearTimeout(node._timer);
    node._timer = window.setTimeout(() => {
        node.hidden = true;
    }, 2400);
}

function totals() {
    const subtotal = cart.reduce((acc, item) => acc + item.quantity * item.price, 0);
    const needsShipping = cart.some((item) => item.delivery?.startsWith('Despacho'));
    const shipping = subtotal > 0 && needsShipping ? SHIPPING : 0;
    return { subtotal, shipping, total: subtotal + shipping };
}

function addToCart(productId, selectedOptions = null, extras = {}) {
    const product = productsById.get(Number(productId));
    if (!product) return;

    const options = selectedOptions?.length ? selectedOptions : getDefaultOptions(product);
    const delivery = extras.delivery || DELIVERY_DEFAULT;
    const payment = extras.payment || PAYMENT_DEFAULT;
    const price = getPriceForOptions(product, options);
    const key = itemKey(product.id, options, { delivery, payment });
    const existing = cart.find((item) => item.key === key);

    if (existing) {
        existing.quantity += 1;
    } else {
        cart.push({
            key,
            id: product.id,
            slug: product.slug,
            name: product.name,
            price,
            options,
            delivery,
            payment,
            quantity: 1,
        });
    }

    saveCart();
    renderCart();
    openCart();
    toast('Producto agregado al carrito.');
}

function updateQuantity(key, delta) {
    const item = cart.find((entry) => entry.key === key);
    if (!item) return;

    item.quantity += delta;
    if (item.quantity <= 0) {
        cart = cart.filter((entry) => entry.key !== key);
    }

    saveCart();
    renderCart();
}

function renderCart() {
    const count = document.querySelector('[data-cart-count]');
    const items = document.querySelector('[data-cart-items]');
    const subtotal = document.querySelector('[data-cart-subtotal]');
    const shipping = document.querySelector('[data-cart-shipping]');
    const total = document.querySelector('[data-cart-total]');
    if (!items || !count || !subtotal || !shipping || !total) return;

    count.textContent = String(cart.reduce((acc, item) => acc + item.quantity, 0));
    items.innerHTML = '';

    if (!cart.length) {
        const empty = document.createElement('p');
        empty.className = 'rounded-md border border-white/10 bg-white/[0.04] p-4 text-white/62';
        empty.textContent = 'Tu carrito esta vacio.';
        items.appendChild(empty);
    } else {
        cart.forEach((item) => {
            const row = document.createElement('article');
            row.className = 'cart-line';
            row.innerHTML = `
                <h3 class="font800 text-white">${item.name}</h3>
                <p class="mt-2 text-xs leading-5 text-white/55">${item.options.join(' | ')}</p>
                <p class="mt-2 text-xs text-white/55">Entrega: ${item.delivery || DELIVERY_DEFAULT}</p>
                <div class="mt-4 flex items-center justify-between gap-3">
                    <div class="flex items-center gap-2">
                        <button class="icon-btn" type="button" data-cart-minus="${item.key}">-</button>
                        <span class="min-w-6 text-center font800">${item.quantity}</span>
                        <button class="icon-btn" type="button" data-cart-plus="${item.key}">+</button>
                    </div>
                    <strong>${item.price > 0 ? currency.format(item.price * item.quantity) : 'Cotizar'}</strong>
                </div>
                <button class="mt-3 text-sm font800 text-pink-300" type="button" data-cart-remove="${item.key}">Eliminar</button>
            `;
            items.appendChild(row);
        });
    }

    const summary = totals();
    subtotal.textContent = currency.format(summary.subtotal);
    shipping.textContent = currency.format(summary.shipping);
    total.textContent = currency.format(summary.total);
}

function openCart() {
    document.body.classList.add('cart-open');
    document.querySelector('[data-cart-drawer]')?.setAttribute('aria-hidden', 'false');
    const overlay = document.querySelector('[data-cart-overlay]');
    if (overlay) overlay.hidden = false;
}

function closeCart() {
    document.body.classList.remove('cart-open');
    document.querySelector('[data-cart-drawer]')?.setAttribute('aria-hidden', 'true');
    const overlay = document.querySelector('[data-cart-overlay]');
    if (overlay) overlay.hidden = true;
}

function initDetailPricing() {
    const detail = document.querySelector('[data-product-detail]');
    if (!detail) return;

    const product = productsById.get(Number(detail.dataset.productDetail));
    const price = detail.querySelector('[data-detail-price]');
    if (!product || !price) return;

    const update = () => {
        const selected = getDetailOptions(detail);
        const value = getPriceForOptions(product, selected);
        price.textContent = value > 0 ? currency.format(value) : 'Cotizar';
    };

    detail.querySelectorAll('[data-detail-option]').forEach((select) => select.addEventListener('change', update));
    update();
}

export function initCart() {
    productsById = new Map(getCatalog().map((product) => [Number(product.id), product]));

    document.addEventListener('click', (event) => {
        const add = event.target.closest('[data-add-product]');
        const addDetail = event.target.closest('[data-add-detail]');
        const plus = event.target.closest('[data-cart-plus]');
        const minus = event.target.closest('[data-cart-minus]');
        const remove = event.target.closest('[data-cart-remove]');

        if (add) addToCart(add.dataset.addProduct);
        if (addDetail) {
            const detail = document.querySelector('[data-product-detail]');
            addToCart(addDetail.dataset.addDetail, getDetailOptions(detail), {
                delivery: detail.querySelector('[data-detail-delivery]')?.value,
                payment: detail.querySelector('[data-detail-payment]')?.value,
            });
        }
        if (plus) updateQuantity(plus.dataset.cartPlus, 1);
        if (minus) updateQuantity(minus.dataset.cartMinus, -1);
        if (remove) {
            cart = cart.filter((item) => item.key !== remove.dataset.cartRemove);
            saveCart();
            renderCart();
        }
    });

    document.querySelectorAll('[data-cart-open]').forEach((button) => button.addEventListener('click', openCart));
    document.querySelectorAll('[data-cart-close], [data-cart-overlay]').forEach((button) => button.addEventListener('click', closeCart));
    document.querySelector('[data-checkout]')?.addEventListener('click', () => toast('Flow quedara conectado en el siguiente paso.'));

    initDetailPricing();
    renderCart();
}
