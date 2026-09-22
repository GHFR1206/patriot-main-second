<?php
namespace App\Filament\Resources\Scores\Tables;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
class ScoresTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('team.name')->searchable()->weight('bold')->label('Team'),
                TextColumn::make('challenge.name')->searchable()->label('Challenge'),
                TextColumn::make('points')->sortable()->weight('bold')->badge()->color(fn($v)=>$v>=80?'success':($v>=50?'warning':'danger')),
                TextColumn::make('time_seconds')->label('Time')->suffix('s')->sortable(),
                TextColumn::make('status')->badge()->color(fn($s)=>match($s){'completed'=>'success','pending'=>'warning','disqualified'=>'danger',default=>'gray'}),
                TextColumn::make('judge.name')->toggleable(isToggledHiddenByDefault:true),
            ])
            ->filters([])
            ->recordActions([EditAction::make()])
            ->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])])
            ->defaultSort('points','desc');
    }
}
