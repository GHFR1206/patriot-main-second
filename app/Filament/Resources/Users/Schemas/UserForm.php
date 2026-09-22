<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
                TextInput::make('password')->password()->dehydrateStateUsing(fn($s)=>filled($s)?Hash::make($s):null)->dehydrated(fn($s)=>filled($s))->required(fn(string $op)=>$op==='create')->revealable(),
                Select::make('roles')->relationship('roles','name')->multiple()->preload()->label('Roles'),
            ]);
    }
}
