<x-livewire-tables::bs4.table.cell>
    {{ $row->title }}
</x-livewire-tables::bs4.table.cell>


<x-livewire-tables::bs4.table.cell>
    {!! $row->description !!}
</x-livewire-tables::bs4.table.cell>


<x-livewire-tables::bs4.table.cell>
    @include('backend.page.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
