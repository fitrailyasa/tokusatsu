<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FranchiseResource\Pages;
use App\Filament\Resources\FranchiseResource\RelationManagers;
use App\Models\Franchise;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FranchiseResource extends Resource
{
    protected static ?string $model = Franchise::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->columnSpanFull()->unique('franchises', 'name')->required()->label('Nama'),
                Forms\Components\TextInput::make('desc')->columnSpanFull()->label('Deskripsi'),
                Forms\Components\FileUpload::make('img')->columnSpanFull()->label('Gambar')->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->label('Nama'),
                Tables\Columns\TextColumn::make('desc')
                    ->formatStateUsing(function ($state) {
                        return implode(' ', array_slice(explode(' ', $state), 0, 10));
                    })
                    ->placeholder('No Desc')
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
            'index' => Pages\ListFranchises::route('/'),
            // 'create' => Pages\CreateFranchise::route('/create'),
            // 'edit' => Pages\EditFranchise::route('/{record}/edit'),
        ];
    }
}
