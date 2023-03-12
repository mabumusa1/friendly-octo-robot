<?php

namespace App\Filament\Resources\LabResource\Pages;

use App\Filament\Resources\LabResource;
use Filament\Resources\Pages\ViewRecord;

class ViewLab extends ViewRecord
{
    protected static string $resource = LabResource::class;
    protected static string $view = 'lab.view';

    protected function getActions(): array
    {
        return [

        ];
    }
}
