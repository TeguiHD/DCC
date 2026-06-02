<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\Catalog\Catalog;
use App\Domain\Seo\Meta;
use Illuminate\Contracts\View\View;

final class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'seo' => Meta::make('Inicio', 'Impresion digital, adhesivos, graficas publicitarias y letreros para marcas en Chile.'),
            'site' => Catalog::site(),
            'categories' => Catalog::categories(),
            'featured' => Catalog::featured(),
            'offers' => Catalog::offers()->take(6),
        ]);
    }

    public function howToBuy(): View
    {
        return view('pages.how-to-buy', [
            'seo' => Meta::make('Como Comprar', 'Proceso de compra, cotizacion, entrega y pago para pedidos DDC Publicidad.', '/como-comprar'),
            'site' => Catalog::site(),
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'seo' => Meta::make('Nosotros', 'Equipo DDC Publicidad, imprenta y produccion grafica en Santiago.', '/nosotros'),
            'site' => Catalog::site(),
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', [
            'seo' => Meta::make('Contacto', 'Contacta a DDC Publicidad para cotizar impresion digital, letreros y graficas.', '/contacto'),
            'site' => Catalog::site(),
        ]);
    }

    public function terms(): View
    {
        return view('legal.terms', [
            'seo' => Meta::make('Terminos y Condiciones', 'Terminos comerciales de DDC Publicidad.', '/terminos'),
            'site' => Catalog::site(),
        ]);
    }

    public function privacy(): View
    {
        return view('legal.privacy', [
            'seo' => Meta::make('Politica de Privacidad', 'Politica de privacidad de DDC Publicidad.', '/privacidad'),
            'site' => Catalog::site(),
        ]);
    }
}
