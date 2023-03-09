<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Prod extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-globe';

    protected static string $view = 'filament.pages.prod';

    protected static ?string $title = 'Production Installations';

    protected static ?string $navigationLabel = 'Production';

    protected static ?string $slug = 'prod';

    protected static ?int $navigationSort = 3;
}
