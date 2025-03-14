<?php

namespace App\Filament\Resources\PropertyResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;

class PropertySummaryWidget extends Widget
{
    protected static string $view = 'filament.resources.property-resource.widgets.property-summary-widget'; //Needs to match the blade file
   
    public function render(): View {
        return view(static::$view, [
            'propertyCount' => \App\Models\Properties::count(),
        ]);
    }
}
