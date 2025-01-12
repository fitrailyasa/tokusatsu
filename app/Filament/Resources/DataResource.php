<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataResource\Pages;
use App\Filament\Resources\DataResource\RelationManagers;
use App\Models\Data;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataResource extends Resource
{
    protected static ?string $model = Data::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $groupedCategories = Category::all()->groupBy('franchise.name');

        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->label('Data'),
                Forms\Components\Select::make('category_id')
                    ->label('Kategori')
                    ->options(
                        $groupedCategories->mapWithKeys(function ($categories, $franchiseName) {
                            return [$franchiseName => $categories->pluck('name', 'id')];
                        })->toArray()
                    )
                    ->required(),
                Forms\Components\FileUpload::make('img')->columnSpanFull()->label('Gambar')->image()->directory('img'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->label('Nama'),
                Tables\Columns\ImageColumn::make('img')
                    ->sortable()
                    ->label('Gambar')
                    ->circular()
                    ->disk('public')
                    ->url(fn($record) => asset('storage/' . $record->img)),
                Tables\Columns\TextColumn::make('category.name')->searchable()->sortable()->label('Kategori'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListData::route('/'),
            // 'create' => Pages\CreateData::route('/create'),
            // 'edit' => Pages\EditData::route('/{record}/edit'),
        ];
    }
}
