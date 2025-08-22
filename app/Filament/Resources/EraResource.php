<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EraResource\Pages;
use App\Filament\Resources\EraResource\RelationManagers;
use App\Models\Era;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EraResource extends Resource
{
    protected static ?string $model = Era::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->columnSpanFull()->unique('eras', 'name')->required()->label('Nama'),
                Forms\Components\TextInput::make('description')->columnSpanFull()->label('Deskripsi'),
                Forms\Components\FileUpload::make('img')->columnSpanFull()->label('Gambar')->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->label('Nama'),
                Tables\Columns\TextColumn::make('description')
                    ->formatStateUsing(function ($state) {
                        return implode(' ', array_slice(explode(' ', $state), 0, 10));
                    })
                    ->placeholder('No description')
                    ->searchable()
                    ->sortable()
                    ->label('Deskripsi'),
                Tables\Columns\ImageColumn::make('img')
                    ->label('Gambar')
                    ->placeholder('No Image')
                    ->circular()
                    ->disk('public')
                    ->url(fn($record) => asset('storage/' . $record->img)),
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
            'index' => Pages\ListEras::route('/'),
            // 'create' => Pages\CreateEra::route('/create'),
            // 'edit' => Pages\EditEra::route('/{record}/edit'),
        ];
    }
}
