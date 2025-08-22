<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $navigationLabel = 'Category';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->columnSpanFull()->unique('categories', 'name')->required()->label('Nama'),
                Forms\Components\Select::make('era_id')->relationship('era', 'name')->required()->label('Era'),
                Forms\Components\Select::make('franchise_id')->relationship('franchise', 'name')->required()->label('Franchise'),
                Forms\Components\TextInput::make('description')->columnSpanFull()->label('Deskripsi'),
                Forms\Components\FileUpload::make('img')->columnSpanFull()->label('Gambar')->image()->directory('img'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->label('Nama'),
                Tables\Columns\TextColumn::make('slug')->searchable()->sortable()->label('Slug'),
                Tables\Columns\TextColumn::make('description')
                    ->formatStateUsing(function ($state) {
                        return implode(' ', array_slice(explode(' ', $state), 0, 10));
                    })
                    ->placeholder('No description')
                    ->searchable()
                    ->sortable()
                    ->label('Deskripsi'),
                Tables\Columns\ImageColumn::make('img')
                    ->sortable()
                    ->label('Gambar')
                    ->disk('public')
                    ->placeholder('No Image')
                    ->circular()
                    ->url(fn($record) => asset('storage/' . $record->img)),
                Tables\Columns\TextColumn::make('era.name')->searchable()->label('Era'),
                Tables\Columns\TextColumn::make('franchise.name')->searchable()->label('Franchise'),
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
            'index' => Pages\ListCategories::route('/'),
            // 'create' => Pages\CreateCategory::route('/create'),
            // 'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
