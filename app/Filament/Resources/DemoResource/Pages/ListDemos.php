<?php

namespace App\Filament\Resources\DemoResource\Pages;

use App\Filament\Resources\DemoResource;
use App\Models\DataCenter;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDemos extends ListRecords
{
    protected static string $resource = DemoResource::class;

    protected static string $view = 'demo.index';

    protected function getActions(): array
    {
        return [
            CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $data['data_center_id'] = DataCenter::first()->id;
                    $data['user_id'] = auth()->id();
                    $data['type'] = 'demo';

                    return $data;
                })
            ->disableCreateAnother()
            ->successNotificationTitle('Demo is being created, we will notify you when it is ready.'),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
