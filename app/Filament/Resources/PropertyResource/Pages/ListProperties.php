<?php

namespace App\Filament\Resources\PropertyResource\Pages;

use App\Filament\Resources\PropertyResource;
use App\Filament\Resources\PropertyResource\Widgets\PropertySummaryWidget;
use App\Filament\Resources\PropertyResource\Widgets\PropertyAveragePricePerNight;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProperties extends ListRecords
{
    protected static string $resource = PropertyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // This method is where we place the widget before the table
    protected function getHeaderWidgets(): array {
        return [
            PropertySummaryWidget::class,
            PropertyAveragePricePerNight::class,
        ];
    }
}
