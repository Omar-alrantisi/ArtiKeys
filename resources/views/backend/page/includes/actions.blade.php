@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.page.update'))
    <x-utils.edit-button :href="route('admin.page.edit', $model)" />
@endif
