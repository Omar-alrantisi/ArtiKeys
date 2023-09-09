@inject('model', '\App\Domains\WebsiteSetting\Models\WebsiteSetting')
@extends('backend.layouts.app')
@section('title', __('Update Setting'))
@section('content')
    <x-forms.post :action="route('admin.websiteSetting.update', $websiteSetting)" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH" />
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Setting')
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.dashboard')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                <input type="hidden" name="id" value="{{$websiteSetting->id}}" />
                <div class="form-group row">
                    <label for="logo" class="col-md-2 col-form-label">@lang('Logo')</label>
                    <div class="col-md-10">
                        <input type="file" name="logo" id="logo" class="form-control" accept="image/*"/>
                        <img src="{{storageBaseLink(\App\Enums\Core\StoragePaths::WEBSITE_SETTING_LOGO.$websiteSetting->logo)}}" class="mt-2" id="blah" height="100px" width="100px"  alt="{{old('logo')}}" />
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="favicon" class="col-md-2 col-form-label">@lang('Favicon')</label>
                    <div class="col-md-10">
                        <input onchange="readURL2()" type="file" name="favicon" id="favicon" class="form-control" accept="image/*"/>
                        <img src="{{storageBaseLink(\App\Enums\Core\StoragePaths::WEBSITE_SETTING_FAVICON.$websiteSetting->favicon)}}" class="mt-2" id="blah2" height="100px" width="100px"  alt="{{old('favicon')}}" />
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="main_color" class="col-md-2 col-form-label">@lang('Main Color')</label>
                    <div class="col-md-10">
                        <input type="color" name="main_color" id="main_color" value="{{old('main_color')??$websiteSetting->main_color}}" class="form-control" required/>
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Setting')</button>
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
        $("#logo").change(function(){
            $('#blah').removeClass('d-none');
            readURL(this);
        });


        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#favicon").change(function(){
            $('#blah2').removeClass('d-none');
            readURL2(this);
        });
    </script>
@endpush
