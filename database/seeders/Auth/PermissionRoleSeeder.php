<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        Role::create([
            'id' => 1,
            'type' => User::TYPE_ADMIN,
            'name' => 'Administrator',
        ]);

        // Non Grouped Permissions
        //

        // Grouped permissions
        // Users category
//        $users = Permission::create([
//            'type' => User::TYPE_ADMIN,
//            'name' => 'admin.access.user',
//            'description' => 'All User Permissions',
//        ]);
//
//        $users->children()->saveMany([
//            new Permission([
//                'type' => User::TYPE_ADMIN,
//                'name' => 'admin.access.user.list',
//                'description' => 'View Users',
//            ]),
//            new Permission([
//                'type' => User::TYPE_ADMIN,
//                'name' => 'admin.access.user.deactivate',
//                'description' => 'Deactivate Users',
//                'sort' => 2,
//            ]),
//            new Permission([
//                'type' => User::TYPE_ADMIN,
//                'name' => 'admin.access.user.reactivate',
//                'description' => 'Reactivate Users',
//                'sort' => 3,
//            ]),
//            new Permission([
//                'type' => User::TYPE_ADMIN,
//                'name' => 'admin.access.user.clear-session',
//                'description' => 'Clear User Sessions',
//                'sort' => 4,
//            ]),
//            new Permission([
//                'type' => User::TYPE_ADMIN,
//                'name' => 'admin.access.user.impersonate',
//                'description' => 'Impersonate Users',
//                'sort' => 5,
//            ]),
//            new Permission([
//                'type' => User::TYPE_ADMIN,
//                'name' => 'admin.access.user.change-password',
//                'description' => 'Change User Passwords',
//                'sort' => 6,
//            ]),
//        ]);


        $users = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.user',
            'description' => 'All User Permissions',
        ]);

        $users->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.list',
                'description' => 'View Users',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.deactivate',
                'description' => 'Deactivate Users',
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.reactivate',
                'description' => 'Reactivate Users',
                'sort' => 3,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.clear-session',
                'description' => 'Clear User Sessions',
                'sort' => 4,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.impersonate',
                'description' => 'Impersonate Users',
                'sort' => 5,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.change-password',
                'description' => 'Change User Passwords',
                'sort' => 6,
            ]),
        ]);
        // Assign Permissions to other Roles
        //

        //industry
        $subscription = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.subscription.subscription.list',
            'description' => __('All Subscription Permissions'),
        ]);

        $subscription->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.subscription.subscription.list',
                'description' => __('View Subscription'),
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.subscription.subscription.store',
                'description' => __('Create Subscription'),
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.subscription.subscription.update',
                'description' => __('Update Subscription'),
                'sort' => 3,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.subscription.subscription.delete',
                'description' => __('Delete Subscription'),
                'sort' => 4,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.subscription.updateSubscriberRatingExam1',
                'description' => __('Edit Exam 1'),
                'sort' => 5,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.subscription.updateSubscriberRatingExam2',
                'description' => __('Edit Exam 2'),
                'sort' => 6,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.subscription.updateSubscriberRatingExam3',
                'description' => __('Edit Exam 3'),
                'sort' => 7,
            ]),
        ]);

    }
}
