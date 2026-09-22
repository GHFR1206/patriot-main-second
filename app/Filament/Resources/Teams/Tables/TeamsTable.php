<?php
namespace App\Filament\Resources\Teams\Tables;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
class TeamsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('emoji')->label('')->width('40px'),
                TextColumn::make('name')->searchable()->weight('bold')->label('Nama Tim'),
                TextColumn::make('school')->searchable()->toggleable()->label('Sekolah'),
                TextColumn::make('age_group')->badge()->color(fn($s)=>match($s){'junior'=>'info','middle'=>'warning','senior'=>'success',default=>'gray'})->label('Usia')->formatStateUsing(fn($s)=>match($s){'junior'=>'Junior','middle'=>'Menengah','senior'=>'Senior',default=>$s}),
                TextColumn::make('robot_name')->searchable()->label('Robot'),
                TextColumn::make('total_points')->sortable()->weight('bold')->badge()->color('success')->label('Total Poin'),
                TextColumn::make('best_time')->suffix(' dtk')->sortable()->label('Waktu Terbaik'),
            ])
            ->filters([])
            ->recordActions([EditAction::make()])
            ->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])])
            ->defaultSort('total_points','desc');
    }
}
