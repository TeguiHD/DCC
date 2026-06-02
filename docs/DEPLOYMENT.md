# DDC Publicidad Laravel Deployment

## Produccion en Hostinger/cPanel

Publicar preferentemente apuntando el dominio a la carpeta `public/` de Laravel. Si cPanel no permite cambiar el document root, subir la app completa y dejar el `.htaccess` de la raiz redirigiendo todo a `public/`.

## Build local

```bash
composer install --no-dev --optimize-autoloader
npm install
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Seguridad

`archive/`, `docs/`, `.env`, `vendor/`, `resources/`, `routes/`, `storage/` y archivos `.md` no deben ser accesibles publicamente. La credencial FTP que estaba en el proyecto legado debe rotarse antes de despliegue.

## Rutas preservadas

El sitio mantiene `/`, `/servicios`, `/productos`, `/categorias`, `/como-comprar`, `/nosotros`, `/contacto`, `/terminos`, `/privacidad`, `/categoria/{slug}` y `/producto/{slug}`. Las rutas antiguas `.html` redirigen a su equivalente limpio.
