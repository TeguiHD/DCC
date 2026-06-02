# DDC Publicidad Laravel Deployment

## Produccion en BlueHosting/cPanel

Publicar preferentemente apuntando el dominio a la carpeta `public/` de Laravel. Si cPanel no permite cambiar el document root, subir la app completa y dejar el `.htaccess` de la raiz redirigiendo todo a `public/`.

El hosting actual no tiene SSH ni terminal, por lo que el flujo estable es compilar localmente, preparar el paquete con `vendor/` incluido y subirlo por FTPS.

## Build local

```bash
npm install
npm run build
composer install --no-dev --optimize-autoloader
```

No generar `php artisan config:cache` ni `php artisan view:cache` localmente para este cPanel: esos archivos guardan rutas absolutas de la maquina local y pueden romper sesiones/cache en produccion. Mantener ausente `bootstrap/cache/config.php` salvo que se regenere dentro del servidor.

Tampoco usar `route:cache` mientras existan rutas con closures para redirecciones heredadas.

## Seguridad

`archive/`, `docs/`, `.env`, `vendor/`, `resources/`, `routes/`, `storage/` y archivos `.md` no deben ser accesibles publicamente. La credencial FTP que estaba en el proyecto legado debe rotarse antes de despliegue.

## Rutas preservadas

El sitio mantiene `/`, `/servicios`, `/productos`, `/categorias`, `/como-comprar`, `/nosotros`, `/contacto`, `/terminos`, `/privacidad`, `/categoria/{slug}` y `/producto/{slug}`. Las rutas antiguas `.html` redirigen a su equivalente limpio.
