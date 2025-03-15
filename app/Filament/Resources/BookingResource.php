<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Bookings;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Carbon\Carbon;

//Forms
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput\readOnly;

//Table
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\Filter;

class BookingResource extends Resource
{
    protected static ?string $model = Bookings::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //Define forms input for the edit bookings
                    Section::make('Customer Details')
                    ->schema([
                        Select::make('user.name')
                            ->relationship(name: 'user', titleAttribute:'name')
                            ->label('Full Name')
                            ->required(),
                    ]),

                    Section::make('Property Details')
                    ->schema([
                        Select::make('property.name')
                            ->relationship(name: 'property', titleAttribute:'name')
                            ->required()
                            ->live() //enables real-time updates
                            //When property is changed, update the price per night and calculate total price
                            ->afterStateUpdated(fn ($state, callable $set, callable $get) =>
                                //update price per night
                                $set('price_per_night', \App\Models\Properties::find($state) ?->price_per_night ?? 0)

                                //recalculate and update total price
                                && $set('total_price', number_format(self::calculateTotalPrice($get), 2))
                            ),
                    ]),
                
                    Section::make('Reservation Details')
                    ->schema([
                        DatePicker::make('start_date')
                            ->required()
                            ->reactive() //triggers updates when changed
                            ->afterStateUpdated(fn ($state, callable $set, callable $get) =>
                                $set('total_price', self::calculateTotalPrice($get))    
                            ),
                        DatePicker::make('end_date')
                            ->required()
                            ->reactive() //triggers updates when changed
                            ->afterStateUpdated(fn ($state, callable $set, callable $get) =>
                                $set('total_price', self::calculateTotalPrice($get))    
                            ),
                        TextInput::make('price_per_night')
                            ->label('Price Per Night')
                            ->placeholder('£ 0.00')
                            ->autocomplete('price_per_night')
                            ->readOnly(),
                        TextInput::make('total_price')
                            ->label('Total Price')
                            ->placeholder('£ 0.00')
                            ->autocomplete('total_price')
                            ->readOnly(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //Define Columns for The Property Table
                TextColumn::make('id')->sortable(),
                TextColumn::make('user.name')->searchable()->label('Guest Name'),
                TextColumn::make('property.name')->label('Property Name'),
                TextColumn::make('start_date')->dateTime('d/m/Y')->sortable(),
                TextColumn::make('end_date')->dateTime('d/m/Y')->sortable(),
                TextColumn::make('total_price')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    //Calculate total price function
    public static function calculateTotalPrice(callable $get): float {
        $start = $get('start_date');
        $end = $get('end_date');
        $pricePerNight = $get('price_per_night');

        if (!$start || !$end || !$pricePerNight) {
            return 0;
        }

        $days = \Carbon\Carbon::parse($start)->diffInDays(\Carbon\Carbon::parse($end));

        return $days > 0 ? $days * $pricePerNight : 0;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }

    //Make the add booking button disappear
    public static function canCreate(): bool {
        return false;
    }

}
