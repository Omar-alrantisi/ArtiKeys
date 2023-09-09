{{--@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.subscription.subscription.update'))--}}
{{--    <x-utils.edit-button :href="route('admin.subscription.subscription.edit', $model)" />--}}
{{--@endif--}}
@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.subscription.subscription.delete'))
    <x-utils.delete-button :href="route('admin.subscription.subscription.delete', $model)" />
@endif
