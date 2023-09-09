@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.lookups.city.delete'))
    <x-utils.edit-button :href="route('admin.lookups.city.edit', $model)" />
@endif
{{--@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.lookups.city.delete'))--}}
{{--    <x-utils.delete-button :href="route('admin.lookups.city.delete', $model)" />--}}
{{--@endif--}}
{{--{{$model->name}}--}}


<a class="btn btn-info btn-sm" href="{{route('admin.lookups.city.getMerchant')}}?filters[cityFilter]={{$model->id}}">@lang('Get Merchant')</a>

<a class="btn btn-info btn-sm" href="{{route('admin.merchant.getMerchantBranch')}}?filters[cityFilter]={{$model->id}}">@lang('Get Merchant Branch')</a>

<a class="btn btn-info btn-sm" href="{{route('admin.report.merchants_report.getMerchantReport')}}?filters[cityFilter]={{$model->id}}">@lang('Get Merchant Report')</a>

