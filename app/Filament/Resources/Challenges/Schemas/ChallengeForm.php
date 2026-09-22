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
            TextInput::make('name')->required()->live(onBlur:true)->afterStateUpdated(fn($state,$set)=>$set('slug',Str::slug($state)))->label('Nama'),
            TextInput::make('slug')->required()->unique(ignoreRecord:true)->label('Slug'),
            Textarea::make('description')->required()->columnSpanFull()->rows(3)->label('Deskripsi'),
            TextInput::make('short_description')->columnSpanFull()->label('Deskripsi Singkat'),
            TextInput::make('icon')->required()->default('🤖')->label('Ikon Emoji'),
            ColorPicker::make('color')->required()->default('#FF6B6B')->label('Warna'),
            ColorPicker::make('gradient_from')->required()->default('#FF6B6B')->label('Gradien Dari'),
            ColorPicker::make('gradient_to')->required()->default('#FFE66D')->label('Gradien Ke'),
            Select::make('difficulty')->options(['easy'=>'Mudah 🟢','medium'=>'Sedang 🟡','hard'=>'Sulit 🔴'])->required()->default('medium')->label('Tingkat Kesulitan'),
            TextInput::make('max_time_seconds')->numeric()->required()->default(120)->suffix('detik')->label('Waktu Maksimal'),
            TextInput::make('max_points')->numeric()->required()->default(100)->label('Poin Maksimal'),
            Textarea::make('obstacles')->columnSpanFull()->helperText('Array JSON contoh: ["belokan tajam","tanjakan"]')->rows(2)->label('Rintangan'),
            Textarea::make('rules')->columnSpanFull()->rows(3)->label('Aturan'),
            TextInput::make('sort_order')->numeric()->required()->default(0)->label('Urutan'),
            Toggle::make('is_active')->required()->default(true)->label('Aktif'),
        ]);
    }
}
