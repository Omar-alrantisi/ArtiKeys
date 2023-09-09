@inject('model', '\App\Domains\Setting\Models\Setting')
@extends('backend.layouts.app')
@section('title', __('Update Setting'))
@section('content')
    <x-forms.post :action="route('admin.setting.update', $setting)" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH" />
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Setting')
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.dashboard')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                <input type="hidden" name="id" value="{{$setting->id}}" />
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">@lang('Email')</label>
                    <div class="col-md-10">
                        <input type="email" name="email" id="email" value="{{old('email')??$setting->email}}" class="form-control" />
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="phone_number" class="col-md-2 col-form-label">@lang('Phone Number')</label>
                    <div class="col-md-10">
                        <input name="phone_number" id="phone_number" value="{{old('phone_number')??$setting->phone_number}}" class="form-control" />
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="location" class="col-md-2 col-form-label">@lang('Location')</label>
                    <div class="col-md-10">
                        <input name="location" id="location" value="{{old('location')??$setting->location}}" class="form-control" />
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="map" class="col-md-2 col-form-label">@lang('Map')</label>
                    <div class="col-md-10">
                        <input name="map" id="map" value="{{old('map')??$setting->map}}" class="form-control" />
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Setting')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
