@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.lookups.test.update'))
    <x-utils.edit-button :href="route('admin.lookups.tests.edit', $model)" />
@endif
@if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.lookups.test.delete'))
    <x-utils.delete-button :href="route('admin.lookups.tests.delete', $model)" />
@endif
