<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LabResource\Pages;
use App\Filament\Resources\LabResource\RelationManagers;
use App\Models\Lab;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Pages\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Carbon\Carbon;


class LabResource extends Resource
{
    protected static ?string $model = Lab::class;

    protected static ?string $modelLabel = 'Lab';

    protected static ?string $pluralModelLabel = 'Labs';

    protected static ?string $navigationLabel = 'Labs';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-beaker';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                TextInput::make('name')
                ->label(__('Lab Name'))
                ->placeholder(__('Lab Name'))
                ->helperText(__('Lab names are used for your reference.'))
                ->required()
                ->minLength(2)
                ->maxLength(255)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {

        return [
            'index' => Pages\ListLabs::route('/'),
            'view' => Pages\ViewLab::route('/{record}'),
        ];
    }


}
