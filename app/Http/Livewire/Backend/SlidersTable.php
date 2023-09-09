<?php
namespace App\Http\Livewire\Backend;
use App\Domains\Slider\Models\Slider;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use function view;
class SlidersTable extends DataTableComponent
{
    /**
     * @return array
     */
    public function columns():array
    {
        return [
            Column::make(__('Image'),'image'),
            Column::make(__('Display'), 'status'),
            Column::make(__('Actions'))
        ];
    }
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Slider::query()->orderByDesc('created_at');
    }
    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.slider.includes.row';
    }
}
