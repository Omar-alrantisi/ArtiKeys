<?php
namespace App\Http\Livewire\Backend;
use App\Domains\Page\Models\Page;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use function view;


class PagesTable extends DataTableComponent
{
    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Title'), 'title')
                ->searchable(),
            Column::make(__('Description'), 'description')
                ->searchable(),
            Column::make(__('Actions'))
        ];
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Page::query()->orderByDesc('created_at');
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.page.includes.row';
    }
}
