<?php

namespace App\Filament\Resources\Challenges\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ChallengesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('icon')->label('')->width('40px'),
                TextColumn::make('name')->searchable()->weight('bold'),
                TextColumn::make('difficulty')->badge()->color(fn($state)=>match($state){'easy'=>'success','medium'=>'warning','hard'=>'danger',default=>'gray'}),
                TextColumn::make('max_points')->sortable(),
                TextColumn::make('max_time_seconds')->label('Time')->suffix('s')->sortable(),
                IconColumn::make('is_active')->boolean(),
                TextColumn::make('sort_order')->sortable(),
            ])
            ->filters([])
            ->recordActions([EditAction::make()])
            ->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])])
            ->defaultSort('sort_order');
    }
}
