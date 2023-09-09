@inject('model', '\App\Domains\Subscription\Models\Business')

@extends('backend.layouts.app')

@section('title', __('Update Business'))

@section('content')
    <x-forms.patch :action="route('admin.subscription.business.update', $business)" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Business')
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.subscription.business.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                <input type="hidden" name="id" value="{{$business->id}}" />
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>
                    <div class="col-md-10">
                        <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Name') }}" value="{{$business->name}}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="business_email" class="col-md-2 col-form-label">@lang('Business Email')</label>
                    <div class="col-md-10">
                        <input type="text" name="business_email" id="business_email" class="form-control" placeholder="{{ __('Business Email') }}" value="{{$business->business_email}}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="business_phone_number" class="col-md-2 col-form-label">@lang('Business Phone Number')</label>
                    <div class="col-md-10">
                        <input type="number" name="business_phone_number" id="business_phone_number" class="form-control" placeholder="{{ __('Business Phone Number') }}" value="{{$business->business_phone_number}}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="logo" class="col-md-2 col-form-label">@lang('Business logo')</label>

                    <div class="col-md-10">
                        <div class="form-file">
                            @if(!empty($business->logo))
                                <a href="javascript:void(0);" class="btn btn-link">{{$business->logo}}</a>
                            @endif
                            <input type="file" class="form-file-input" name="logo" id="logo" class="form-control" value="{{$business->logo}}" placeholder="{{ __('Business logo') }}" maxlength="450"/>
                        </div>
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="business_type_id" class="col-md-2 col-form-label">@lang('Business Type')</label>
                    <div class="col-md-2">
                        <select name="business_type_id" id="business_type_id" class="form-control">
                            {{$businessTypes}}
                            @foreach($businessTypes as $businessType)
                                <option value="{{$businessType->id}}" {{$business->business_type_id == $businessType->id ? 'selected':''}}>{{$businessType->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Business')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
