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
                TextColumn::make('team.name')->searchable()->weight('bold')->label('Tim'),
                TextColumn::make('challenge.name')->searchable()->label('Tantangan'),
                TextColumn::make('points')->sortable()->weight('bold')->badge()->color(fn($v)=>$v>=80?'success':($v>=50?'warning':'danger'))->label('Poin'),
                TextColumn::make('time_seconds')->label('Waktu')->suffix(' dtk')->sortable()->formatStateUsing(fn($v)=>$v ? $v.' dtk' : '—'),
                TextColumn::make('status')->badge()->color(fn($s)=>match($s){'completed'=>'success','pending'=>'warning','disqualified'=>'danger',default=>'gray'})->label('Status')->formatStateUsing(fn($s)=>match($s){'completed'=>'Selesai','pending'=>'Menunggu','disqualified'=>'Didiskualifikasi',default=>$s}),
                TextColumn::make('judge.name')->toggleable(isToggledHiddenByDefault:true)->label('Juri'),
            ])
            ->filters([])
            ->recordActions([EditAction::make()])
            ->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])])
            ->defaultSort('points','desc');
    }
}
