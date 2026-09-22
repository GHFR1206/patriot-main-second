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
            TextInput::make('name')->required()->live(onBlur:true)->afterStateUpdated(fn($state,$set)=>$set('slug',Str::slug($state)))->label('Nama Tim'),
            TextInput::make('slug')->required()->unique(ignoreRecord:true)->label('Slug'),
            TextInput::make('school')->required()->label('Sekolah'),
            Select::make('age_group')->options(['junior'=>'Junior (7-9) 🧒','middle'=>'Menengah (10-12) 👧','senior'=>'Senior (13-15) 🧑'])->required()->default('middle')->label('Kelompok Usia'),
            TextInput::make('robot_name')->label('Nama Robot'),
            TextInput::make('members_count')->numeric()->required()->default(3)->label('Jumlah Anggota'),
            Textarea::make('members')->helperText('JSON contoh: ["Alice","Bob"]')->columnSpanFull()->rows(2)->label('Anggota'),
            TextInput::make('contact_email')->email()->required()->label('Email Kontak'),
            TextInput::make('contact_phone')->label('No. HP'),
            TextInput::make('emoji')->default('🤖')->label('Emoji Avatar'),
            ColorPicker::make('color')->default('#4ECDC4')->label('Warna'),
            TextInput::make('total_points')->numeric()->default(0)->readOnly()->label('Total Poin'),
            TextInput::make('best_time')->numeric()->suffix('detik')->label('Waktu Terbaik'),
            Select::make('user_id')->relationship('user','email')->searchable()->label('Pemilik Akun'),
        ]);
    }
}
