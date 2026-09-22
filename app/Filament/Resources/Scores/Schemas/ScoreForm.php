<?php
namespace App\Filament\Resources\Scores\Schemas;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
class ScoreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('team_id')->relationship('team','name')->required()->searchable()->label('Tim'),
            Select::make('challenge_id')->relationship('challenge','name')->required()->searchable()->label('Tantangan'),
            TextInput::make('points')->numeric()->required()->default(0)->label('Poin'),
            TextInput::make('time_seconds')->numeric()->suffix('detik')->label('Waktu (detik)'),
            TextInput::make('penalties')->numeric()->default(0)->label('Penalti'),
            TextInput::make('bonuses')->numeric()->default(0)->label('Bonus'),
            Select::make('status')->options(['pending'=>'Menunggu ⏳','completed'=>'Selesai ✅','disqualified'=>'Didiskualifikasi ❌'])->required()->default('completed')->label('Status'),
            Textarea::make('notes')->columnSpanFull()->rows(2)->label('Catatan'),
            Select::make('judged_by')->relationship('judge','name')->searchable()->label('Juri'),
        ]);
    }
}
