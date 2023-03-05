<?php

namespace App\Filament\Pages;

use JeffGreco13\FilamentBreezy\Pages\MyProfile as BaseProfile;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;

class MyProfile extends BaseProfile
{

   protected function getUpdateProfileFormSchema(): array
    {
        return [
            Grid::make()
            ->columns(2)
            ->schema([
                TextInput::make('first_name')
                    ->label(__('app.first_name'))
                    ->required(),
                TextInput::make('last_name')
                    ->label(__('app.last_name'))
                    ->required(),
            ]),


            TextInput::make($this->loginColumn)
                ->required()
                ->email(fn () => $this->loginColumn === 'email')
                ->unique(config('filament-breezy.user_model'), ignorable: $this->user)
                ->label(__('filament-breezy::default.fields.email')),
        ];
    }
}
