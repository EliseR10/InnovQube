<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PropertyResource\Widgets\PropertySummaryWidget;
use App\Models\Properties;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Storage;

//Forms
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;

//Table
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\Filter;


class PropertyResource extends Resource
{
    protected static ?string $model = \App\Models\Properties::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            //Define Forms input for the add properties
            Section::make('')
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->label(_('Property Name'))
                        ->placeholder('Property Name'),
                    RichEditor::make('description')
                        ->required()
                        ->toolbarButtons([
                            'bold', 'italic', 'underline', 'strike', 'h2', 'h3', 'bulletList', 'orderedList', 'link', 'blockquote'
                        ])
                        ->label(_('Property Description'))
                        ->placeholder('This property is located...'),
                ]),
            
            Section::make('Pricing')
                ->schema([
                    TextInput::make('price_per_night')
                        ->required()
                        ->label(_('Price per Night'))
                        ->placeholder('£ 0.00'),
                ]),
            
            Section::make('Image')
                ->schema([
                    FileUpload::make('image')
                        ->image() //only allow images
                        ->label('Property Image'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //Define Columns for the Property Table
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->searchable()->label('Property Name'),
                TextColumn::make('description')
                    ->wrap() //ensure text wraps within the column
                    ->extraAttributes(['style' => 'max-width: 500px, white-space: normal; text-align: justify']),
                TextColumn::make('price_per_night')->sortable()->money('GBP'), //display as currency
                ImageColumn::make('image_url')
                    ->size(150)
                    ->disk('public')
                    ->visibility('public')
                    ->label('Image')
                    ->url(function ($record) {
                        //dump(asset('storage/' . $record->image_url)); // Debug output
                        return asset('storage/' . $record->image_url);
                    }),
                    //->getStateUsing(fn ($record) => asset('storage/' . $record->image_url)),
                TextColumn::make('created_at')->dateTime('d/m/Y')->sortable(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getWidgets():array{
        return [
            PropertySummaryWidget::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'), //the widget will appear on this page
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }

}
 