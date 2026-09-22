<?php
namespace App\Filament\Resources\Teams\Schemas;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
class TeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->required()->live(onBlur:true)->afterStateUpdated(fn($state,$set)=>$set('slug',Str::slug($state))),
            TextInput::make('slug')->required()->unique(ignoreRecord:true),
            TextInput::make('school')->required(),
            Select::make('age_group')->options(['junior'=>'Junior (7-9) 🧒','middle'=>'Middle (10-12) 👧','senior'=>'Senior (13-15) 🧑'])->required()->default('middle'),
            TextInput::make('robot_name')->label('Robot Name'),
            TextInput::make('members_count')->numeric()->required()->default(3),
            Textarea::make('members')->helperText('JSON e.g. ["Alice","Bob"]')->columnSpanFull()->rows(2),
            TextInput::make('contact_email')->email()->required(),
            TextInput::make('contact_phone'),
            TextInput::make('emoji')->default('🤖')->label('Avatar Emoji'),
            ColorPicker::make('color')->default('#4ECDC4'),
            TextInput::make('total_points')->numeric()->default(0)->readOnly(),
            TextInput::make('best_time')->numeric()->suffix('s'),
            Select::make('user_id')->relationship('user','email')->searchable()->label('Owner User'),
        ]);
    }
}
