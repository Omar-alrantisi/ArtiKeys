@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.slider.update'))
    <x-utils.edit-button :href="route('admin.slider.edit', $model)" />
@endif
@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.slider.delete'))
    <x-utils.delete-button :href="route('admin.slider.delete', $model)" />
@endif
{{--@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.slider.update'))--}}
{{--    <x-utils.translate-button :href="route('admin.slider.editTranslation', $model)" />--}}
{{--@endif--}}
