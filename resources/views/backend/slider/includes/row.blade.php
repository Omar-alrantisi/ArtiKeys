<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<x-livewire-tables::bs4.table.cell>
    <img src="{{storageBaseLink(\App\Enums\Core\StoragePaths::SLIDER_IMAGE.$row->image??'')}}" width="100"  loading="lazy" />
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <div class="form-check form-switch">
        <input value="{{ old($row->status) ?? ($row->status == "0")?"0":"1"}}" {{$row->status == "1" ? 'checked' : ''}} class="form-check-input " type="checkbox" role="switch" name="status" id="flexSwitchCheckDefault" onchange="changeCheckBox({{$row->id}})"  {{$row->status == "1" ? 'checked' : ''}}>
    </div>

</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @include('backend.slider.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@push('after-scripts')
    <script>
        function changeCheckBox(id){
            debugger
            $.ajax({
                url : '{{route('admin.slider.updateStatusBySliderId')}}?'+'sliderId='+id,
                type:'GET',
                async : false,
                success:function(data){
                    if(data){
                    }
                },
                error:function (xhr){
                    alert(xhr.message);
                }
            })
        }
    </script>
@endpush
