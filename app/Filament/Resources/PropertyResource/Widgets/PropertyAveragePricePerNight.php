<?php

namespace App\Filament\Resources\PropertyResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;

class PropertyAveragePricePerNight extends Widget
{
    protected static string $view = 'filament.resources.property-resource.widgets.property-average-price-per-night';

    public function render(): View {
        return view(static::$view, [
            'propertyAveragePrice' => \App\Models\Properties::avg('price_per_night'),
        ]);
    }
}
