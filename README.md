# DDC Publicidad

Sitio Laravel + Blade + Tailwind CSS para el catalogo online de DDC Publicidad.

## Stack

- Laravel 13
- Blade
- Tailwind CSS 4
- Vite
- Catalogo en archivos PHP, sin base de datos obligatoria en esta fase

## Desarrollo local

```bash
composer install
npm install
npm run build
php artisan test
php artisan serve
```

El sitio queda disponible en `http://127.0.0.1:8000`.

## Estructura

- `app/Domain/Catalog`: productos, categorias y reglas de precios.
- `app/Domain/Seo`: metadata y canonical.
- `resources/views`: layouts, paginas, catalogo y componentes Blade.
- `resources/js/modules`: carrito, filtros, pricing y UI.
- `resources/css/app.css`: Tailwind, tokens y componentes.
- `public/assets`: assets optimizados WebP-first.
- `docs`: mapa para IA y despliegue cPanel.

## Produccion

El repositorio incluye `public/build` compilado para facilitar despliegue en hosting LAMP/cPanel. El document root ideal es `public/`. Si cPanel no permite cambiarlo, el `.htaccess` raiz redirige al front controller de Laravel.

No publicar `.env`, `archive/`, `vendor/`, `node_modules`, caches ni credenciales.

## Validacion

```bash
npm run build
php artisan test
```

La suite valida rutas publicas, redirecciones legacy, sitemap, reglas de ofertas, productos `quoteOnly` y que `public/assets` no tenga PNG/JPG/PDF.
