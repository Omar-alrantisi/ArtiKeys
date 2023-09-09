@inject('model', '\App\Domains\Slider\Models\Slider')
@extends('backend.layouts.app')
@section('title', __('Update Slider'))
@section('content')
    <x-forms.post id="form" :action="route('admin.slider.update', $slider)" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH" />
        <x-backend.card>
            <x-slot name="header">
                @lang('Update slider')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.slider.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                <input type="hidden" name="id" value="{{$slider->id}}" />
                <div class="form-group row">
                    <label for="image" class="col-md-2 col-form-label">@lang('Image')</label>
                    <div class="col-md-10">
                        <input type="file" name="image" id="image" class="form-control" accept="image/*"/>
                        <img src="{{storageBaseLink(\App\Enums\Core\StoragePaths::SLIDER_IMAGE.$slider->image)}}" class="mt-2" id="blah" height="100px" width="100px"  alt="{{old('image')}}" />

                    </div>
                </div><!--form-group-->
            </x-slot>
            <x-slot name="footer">
                <button id="submitButton" class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Slider')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
@push('after-scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function(){
            $('#blah').removeClass('d-none');
            readURL(this);
        });
    </script>
@endpush
