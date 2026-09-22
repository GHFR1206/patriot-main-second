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
            Select::make('team_id')->relationship('team','name')->required()->searchable(),
            Select::make('challenge_id')->relationship('challenge','name')->required()->searchable(),
            TextInput::make('points')->numeric()->required()->default(0),
            TextInput::make('time_seconds')->numeric()->suffix('s')->label('Time (s)'),
            TextInput::make('penalties')->numeric()->default(0),
            TextInput::make('bonuses')->numeric()->default(0),
            Select::make('status')->options(['pending'=>'Pending ⏳','completed'=>'Completed ✅','disqualified'=>'Disqualified ❌'])->required()->default('completed'),
            Textarea::make('notes')->columnSpanFull()->rows(2),
            Select::make('judged_by')->relationship('judge','name')->searchable()->label('Judge'),
        ]);
    }
}
