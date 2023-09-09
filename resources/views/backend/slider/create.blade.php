@extends('backend.layouts.app')
@section('title', __('Create Slider'))
@section('content')
    <x-forms.post id="form" :action="route('admin.slider.store')" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Slider')
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.slider.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                <div class="form-group row">
                    <label for="image" class="col-md-2 col-form-label">@lang('Image')</label>
                    <div class="col-md-10">
                        <input type="file" name="image" id="image" class="form-control" accept="image/*" required/>
                        <img class="mt-2 d-none" id="blah" height="100px" width="100px"  alt="{{old('image')}}" />

                    </div>
                </div><!--form-group-->
            </x-slot>
            <x-slot name="footer">
                <button id="submitButton" class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Slider')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
<script src="https://cdn.tiny.cloud/1/9ceb5voxn88nbsdc863tfi23azkdg6zs114fs9a0anaj15wq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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

