<?php

declare(strict_types=1);

return [
    'brand' => 'DDC Publicidad',
    'baseUrl' => env('APP_URL', 'https://ddcpublicidad.cl'),
    'phone' => '+56 9 8805 1134',
    'whatsapp' => 'https://wa.me/56988051134',
    'instagram' => 'https://www.instagram.com/ddcpublicidad/',
    'email' => 'venta@ddcpublicidad.cl',
    'address' => 'Septima Avenida #1114, San Miguel, Santiago de Chile',
    'logo' => '/assets/logo/logo-ddc-white.webp',
    'defaultImage' => '/assets/flyers/impresion%20de%20gran%20formato.webp',
    'shipping' => 5000,
    'deliveryOptions' => [
        'Retiro en tienda DDC',
        'Despacho Santiago',
        'Despacho a regiones',
        'Coordinar con asesor',
    ],
    'paymentOptions' => [
        'Flow proximamente',
        'Transferencia bancaria',
        'Pago contra cotizacion',
    ],
    'featuredIds' => [1, 3, 5, 6, 9, 15],
    'heroSlides' => [
        [
            'badge' => 'Ofertas disponibles',
            'title' => 'Imprenta digital y offset en Santiago',
            'subtitle' => 'Tu marca en grande: impresion profesional con descuentos activos.',
            'description' => 'Pendones, stickers, paneles y graficas para retail con entrega rapida.',
            'cta' => 'Ver ofertas',
            'url' => '/categoria/ofertas',
            'image' => '/assets/flyers/flyer-gran-formato-web.webp',
            'tag' => 'Impresion de gran formato',
        ],
        [
            'badge' => 'Produccion grafica',
            'title' => 'Piezas listas para vitrinas, ferias y activaciones',
            'subtitle' => 'Soluciones visuales con soporte experto desde la cotizacion.',
            'description' => 'Pendones roller, telas PVC, adhesivos y senaletica para marcas en movimiento.',
            'cta' => 'Explorar catalogo',
            'url' => '/productos',
            'image' => '/assets/stand/Pendon%20roller.webp',
            'tag' => 'Graficas Publicitarias',
        ],
        [
            'badge' => 'Instalacion profesional',
            'title' => 'Branding para retail y vehiculos comerciales',
            'subtitle' => 'Materiales resistentes, terminaciones claras y acompanamiento real.',
            'description' => 'Vinilos, rotulacion, floorgraphics y soportes rigidos para alto impacto.',
            'cta' => 'Cotizar proyecto',
            'url' => '/contacto',
            'image' => '/assets/stand/Vinil%20vehicular%202.webp',
            'tag' => 'Branding Vehicular',
        ],
    ],
];
