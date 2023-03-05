<?php

namespace App\Http\Livewire\Auth;
use JeffGreco13\FilamentBreezy\Http\Livewire\Auth\Register as FilamentBreezyRegister;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use JeffGreco13\FilamentBreezy\FilamentBreezy;
use Illuminate\Support\Facades\Hash;

class Register extends FilamentBreezyRegister
{

    public bool $consent_to_terms;
    public string $first_name, $last_name;

    protected function getFormSchema(): array
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
        TextInput::make('email')
            ->label(__('filament-breezy::default.fields.email'))
            ->required()
            ->email()
            ->unique(table: config('filament-breezy.user_model')),
        TextInput::make('password')
            ->label(__('filament-breezy::default.fields.password'))
            ->required()
            ->password()
            ->rules(app(FilamentBreezy::class)->getPasswordRules()),
        TextInput::make('password_confirm')
            ->label(__('filament-breezy::default.fields.password_confirm'))
            ->required()
            ->password()
            ->same('password'),
            Checkbox::make('consent_to_terms')->label(__('app.consent_to_terms'))->required(),
        ];
    }


    protected function prepareModelData($data): array
    {
        $preparedData = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ];

        return $preparedData;
    }
}
