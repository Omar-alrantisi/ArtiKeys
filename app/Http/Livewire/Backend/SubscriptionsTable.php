<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Subscription\Models\Subscription;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SubscriptionsTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make(__('Name (English)'), 'name_en')
                ->searchable(),
            Column::make(__('Name (Arabic)'), 'name_ar')
                ->searchable(),
            Column::make(__('Email')),
            Column::make(__('Phone Number')),
            Column::make(__('Date of birth')),
            Column::make(__('Personal Image')),
            Column::make(__('Identification Card')),
            Column::make(__('Vaccination Certificate')),
            Column::make(__('Edit Marks')),
            Column::make(__('Subscription Details')),
            Column::make(__('English Test')),
            Column::make(__('Code Challenge Submission')),
            Column::make(__('Actions'))
        ];
    }

    public function query()
    {
        return Subscription::query();
    }

    public function rowView(): string
    {
        return 'backend.subscription.includes.row';
    }

}
