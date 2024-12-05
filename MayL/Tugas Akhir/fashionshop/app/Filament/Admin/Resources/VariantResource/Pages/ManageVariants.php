<?php

namespace App\Filament\Admin\Resources\VariantResource\Pages;

use App\Filament\Admin\Resources\VariantResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageVariants extends ManageRecords
{
    protected static string $resource = VariantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
