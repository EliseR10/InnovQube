<?php

namespace App\Filament\Resources\BookingResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;

class BookingSummaryWidget extends Widget
{
    protected static string $view = 'filament.resources.booking-resource.widgets.booking-summary-widget';

    public function render(): View {
        return view(static::$view, [
            'bookingCount' => \App\Models\Bookings::count(),
        ]);
    }
}
