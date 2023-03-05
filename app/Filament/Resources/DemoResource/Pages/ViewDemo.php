<?php

namespace App\Filament\Resources\DemoResource\Pages;

use App\Filament\Resources\DemoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDemo extends ViewRecord
{
    protected static string $resource = DemoResource::class;
    protected static string $view = 'demo.view';

    protected function getActions(): array
    {
        return [

        ];
    }
}
