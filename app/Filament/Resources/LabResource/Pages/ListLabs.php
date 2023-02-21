<?php

namespace App\Filament\Resources\LabResource\Pages;

use App\Filament\Resources\LabResource;
use Filament\Pages\Actions\DeleteAction;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Models\DataCenter;
class ListLabs extends ListRecords
{
    protected static string $resource = LabResource::class;

    protected static string $view = 'lab.index';


    protected function getActions(): array
    {
        return [
            CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $data['data_center_id'] = DataCenter::first()->id;
                    $data['user_id'] = auth()->id();
                    $data['type'] = 'lab';
                    return $data;
            })
            ->disableCreateAnother()
            ->successNotificationTitle('Lab is being created, we will notify you when it is ready.'),
        ];
    }
    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }

}
