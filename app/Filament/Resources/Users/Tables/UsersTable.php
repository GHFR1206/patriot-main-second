<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->weight('bold')->label('Nama'),
                TextColumn::make('email')->searchable()->label('Email'),
                TextColumn::make('roles.name')->badge()->color('info')->label('Peran'),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault:true)->label('Dibuat'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
