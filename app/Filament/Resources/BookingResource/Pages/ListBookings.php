<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use App\Filament\Resources\BookingResource\Widgets\BookingSummaryWidget;
use App\Filament\Resources\BookingResource\Widgets\BookingAverageRevenue;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBookings extends ListRecords
{
    protected static string $resource = BookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // This method is where we place the widget before the table
    protected function getHeaderWidgets(): array {
        return [
            BookingSummaryWidget::class,
            BookingAverageRevenue::class,
        ];
    }
}
