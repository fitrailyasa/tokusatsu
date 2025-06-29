<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-m-user-group';
    protected static ?string $navigationGroup = 'User Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nama'),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->label('Email'),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->label('Password')
                    ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                    ->required(fn(string $context) => $context === 'create')
                    ->dehydrated(fn($state) => filled($state)),

                Forms\Components\Select::make('roles')
                    ->label('Roles')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->preload()
                    ->searchable(),

                Forms\Components\Toggle::make('email_verified_at')
                    ->label('Status Aktif')
                    ->onColor('success')
                    ->offColor('danger')
                    ->default(fn($record) => $record && $record->email_verified_at ? true : false)
                    ->dehydrateStateUsing(fn($state) => $state ? now() : null)
                    ->afterStateHydrated(function ($component, $state) {
                        $component->state(!is_null($state));
                    })
                    ->dehydrated(true)
                    ->required()
                    ->hiddenOn('view'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Nama'),

                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->label('Email'),

                Tables\Columns\BadgeColumn::make('roles.name')
                    ->label('Roles')
                    ->colors([
                        'primary' => 'admin',
                        'success' => 'user',
                    ]),

                Tables\Columns\BadgeColumn::make('email_verified_at')
                    ->label('Status')
                    ->getStateUsing(fn($record) => $record->email_verified_at ? 'Aktif' : 'Tidak Aktif')
                    ->colors([
                        'success' => 'Aktif',
                        'danger' => 'Tidak Aktif',
                    ])
                    ->icons([
                        'heroicon-o-check-circle' => 'Aktif',
                        'heroicon-o-x-circle' => 'Tidak Aktif',
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
        return [];
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
