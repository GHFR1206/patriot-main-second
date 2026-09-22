<?php

namespace App\Filament\Resources\Challenges\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ChallengeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->required()->live(onBlur:true)->afterStateUpdated(fn($state,$set)=>$set('slug',Str::slug($state))),
            TextInput::make('slug')->required()->unique(ignoreRecord:true),
            Textarea::make('description')->required()->columnSpanFull()->rows(3),
            TextInput::make('short_description')->columnSpanFull(),
            TextInput::make('icon')->required()->default('🤖')->label('Emoji Icon'),
            ColorPicker::make('color')->required()->default('#FF6B6B'),
            ColorPicker::make('gradient_from')->required()->default('#FF6B6B'),
            ColorPicker::make('gradient_to')->required()->default('#FFE66D'),
            Select::make('difficulty')->options(['easy'=>'Easy 🟢','medium'=>'Medium 🟡','hard'=>'Hard 🔴'])->required()->default('medium'),
            TextInput::make('max_time_seconds')->numeric()->required()->default(120)->suffix('sec'),
            TextInput::make('max_points')->numeric()->required()->default(100),
            Textarea::make('obstacles')->columnSpanFull()->helperText('JSON array e.g. ["sharp turn","ramp"]')->rows(2),
            Textarea::make('rules')->columnSpanFull()->rows(3),
            TextInput::make('sort_order')->numeric()->required()->default(0),
            Toggle::make('is_active')->required()->default(true),
        ]);
    }
}
