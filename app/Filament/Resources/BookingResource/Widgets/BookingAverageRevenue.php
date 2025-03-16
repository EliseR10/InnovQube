<?php

namespace App\Filament\Resources\BookingResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;

class BookingAverageRevenue extends Widget
{
    protected static string $view = 'filament.resources.booking-resource.widgets.booking-average-revenue';

    public function render(): View {
        return view(static::$view, [
            'bookingAveragePrice' => \App\Models\Bookings::avg('total_price'),
        ]);
    }
}
