<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-m-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->label('Nama'),
                Forms\Components\TextInput::make('email')->email()->required()->label('Email'),
                Forms\Components\TextInput::make('password')->password()->same('password_confirmation')->required()->label('Password'),
                Forms\Components\TextInput::make('password_confirmation')->password()->required()->label('Konfirmasi Password'),
                Forms\Components\Select::make('role')
                    ->label('Role')
                    ->required()
                    ->options([
                        'admin' => 'Admin',
                        'user' => 'User',
                    ]),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->required()
                    ->options([
                        'aktif' => 'Aktif',
                        'tidak aktif' => 'Tidak Aktif',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->label('Nama'),
                Tables\Columns\TextColumn::make('email')->searchable()->sortable()->label('Email'),
                Tables\Columns\TextColumn::make('role')
                    ->searchable()
                    ->sortable()
                    ->label('Role')
                    ->colors([
                        'primary' => 'admin',
                        'success' => 'user',
                    ]),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->sortable()
                    ->label('Status')
                    ->colors([
                        'success' => 'aktif',
                        'secondary' => 'tidak aktif',
                    ]),
            ])
            ->filters([])
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
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            // 'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
