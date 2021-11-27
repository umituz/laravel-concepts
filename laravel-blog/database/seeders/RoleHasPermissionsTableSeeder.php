<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

/**
 * Class RoleHasPermissionsTableSeeder
 * @package Database\Seeders
 */
class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::findByName('Admin');
        $admin->givePermissionTo([
            'posts.index',
            'posts.create',
            'posts.edit',
            'posts.destroy',
            'posts.publish',
            'posts.unpublish',
            'posts.export',
        ]);
        $moderator = Role::findByName('Moderator');
        $moderator->givePermissionTo([
            'posts.index',
            'posts.create',
            'posts.edit',
            'posts.destroy',
            'posts.publish',
            'posts.unpublish',
        ]);
        $writer = Role::findByName('Writer');
        $writer->givePermissionTo([
            'posts.index',
            'posts.create',
            'posts.edit',
            'posts.publish',
            'posts.destroy',
            'posts.unpublish',
        ]);
    }
}
