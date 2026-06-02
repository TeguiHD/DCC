# Mapa para IA

## Dominios

- `app/Domain/Catalog`: datos, consultas y reglas del catalogo.
- `app/Domain/Seo`: metadata y canonicals.
- `app/Http/Controllers`: controladores livianos para paginas y catalogo.
- `resources/views`: Blade por layouts, parciales, paginas y catalogo.
- `resources/js/modules`: carrito, filtros, pricing y UI.
- `resources/css/app.css`: Tailwind, tokens y componentes.

## Fuente de verdad

Los productos actuales viven en `app/Domain/Catalog/Data/products.php`. Las categorias publicas viven en `app/Domain/Catalog/Data/categories.php`. `ofertas` es una categoria virtual basada en productos con badge.

## Reglas conservadas

- Carrito en `localStorage` con key `ddc_cart_v4`.
- Envio de `$5.000` solo cuando la entrega parte con `Despacho`.
- Productos con `quoteOnly` muestran `Cotizar`.
- `vinil-vehicular` e `instalacion-vinil-pvc` tienen categoria secundaria `vehicular`.

## Diseño

Tailwind CSS es el sistema visual principal. Bootstrap no se usa en v1 para evitar mezclar dos filosofias CSS; puede considerarse solo si se necesita prototipado rapido o componentes administrativos internos.

## Rendimiento

- `public/assets` debe mantenerse WebP-first.
- Las paginas usan `loading`, `decoding`, `fetchpriority` y dimensiones estables en imagenes clave.
- El JSON embebido del catalogo se limita a los campos necesarios para carrito y precios.
- `.htaccess` aplica cache largo a CSS, JS, WebP y fuentes.
