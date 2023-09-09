@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.lookups.country.update'))
    <x-utils.edit-button :href="route('admin.lookups.country.edit', $model)" />
@endif
@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.lookups.country.delete'))
    <x-utils.delete-button :href="route('admin.lookups.country.delete', $model)" />
@endif
