<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Lookups\Models\Country;
use App\Models\Test;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use function view;

class TestsTable extends DataTableComponent
{

    //public bool $perPageAll = true;
//    public int $perPage = 50;

    /**
     * @return array
     */


    public function columns():array
    {
        return [
            Column::make(__('ID'),'id')
                ->searchable()
                ->sortable(),
            Column::make(__('Question'),'question')
                ->searchable()
                ->sortable(),
            Column::make(__('Category'), 'category')
                ->searchable()
                ->sortable(),
            Column::make(__('First Choice'), 'first_choice')
                ->searchable()
                ->sortable(),
            Column::make(__('Second Choice'), 'second_choice')
                ->searchable()
                ->sortable(),
            Column::make(__('Third Choice'), 'third_choice')
                ->searchable()
                ->sortable(),
            Column::make(__('Fourth Choice'), 'fourth_choice')
                ->searchable()
                ->sortable(),
            Column::make(__('Correct Choice'), 'correct_answer')
                ->searchable()
                ->sortable(),
            Column::make(__('Weight'), 'weight')
                ->searchable()
                ->sortable(),
            Column::make(__('Status'), 'status')
                ->searchable()
                ->sortable(),
            Column::make(__('Actions'))
        ];
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Test::query()->orderByDesc('created_at');
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.lookups.tests.includes.row';
    }
}
