<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Roles
        |--------------------------------------------------------------------------
        */

        $roles = [
            [
                'name' => 'super-admin',
                'display_name' => 'Super Admin',
                'description' => 'Full access to the entire admin panel.',
                'status' => 1,
            ],
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Administrative access to the website.',
                'status' => 1,
            ],
            [
                'name' => 'editor',
                'display_name' => 'Editor',
                'description' => 'Can manage website content.',
                'status' => 1,
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['name' => $role['name']],
                $role
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Permissions
        |--------------------------------------------------------------------------
        */

        $permissions = [

            // Dashboard
            [
                'name' => 'dashboard.view',
                'display_name' => 'View Dashboard',
                'module' => 'Dashboard',
            ],

            // Users
            [
                'name' => 'users.view',
                'display_name' => 'View Users',
                'module' => 'Users',
            ],
            [
                'name' => 'users.create',
                'display_name' => 'Create Users',
                'module' => 'Users',
            ],
            [
                'name' => 'users.edit',
                'display_name' => 'Edit Users',
                'module' => 'Users',
            ],
            [
                'name' => 'users.delete',
                'display_name' => 'Delete Users',
                'module' => 'Users',
            ],

            // Roles
            [
                'name' => 'roles.view',
                'display_name' => 'View Roles',
                'module' => 'Roles',
            ],
            [
                'name' => 'roles.create',
                'display_name' => 'Create Roles',
                'module' => 'Roles',
            ],
            [
                'name' => 'roles.edit',
                'display_name' => 'Edit Roles',
                'module' => 'Roles',
            ],
            [
                'name' => 'roles.delete',
                'display_name' => 'Delete Roles',
                'module' => 'Roles',
            ],

            // Permissions
            [
                'name' => 'permissions.view',
                'display_name' => 'View Permissions',
                'module' => 'Permissions',
            ],
            [
                'name' => 'permissions.create',
                'display_name' => 'Create Permissions',
                'module' => 'Permissions',
            ],
            [
                'name' => 'permissions.edit',
                'display_name' => 'Edit Permissions',
                'module' => 'Permissions',
            ],
            [
                'name' => 'permissions.delete',
                'display_name' => 'Delete Permissions',
                'module' => 'Permissions',
            ],

            // Blog
            [
                'name' => 'blog.view',
                'display_name' => 'View Blog',
                'module' => 'Blog',
            ],
            [
                'name' => 'blog.create',
                'display_name' => 'Create Blog',
                'module' => 'Blog',
            ],
            [
                'name' => 'blog.edit',
                'display_name' => 'Edit Blog',
                'module' => 'Blog',
            ],
            [
                'name' => 'blog.delete',
                'display_name' => 'Delete Blog',
                'module' => 'Blog',
            ],

            // Service
            [
                'name' => 'service.view',
                'display_name' => 'View Services',
                'module' => 'Service',
            ],
            [
                'name' => 'service.create',
                'display_name' => 'Create Service',
                'module' => 'Service',
            ],
            [
                'name' => 'service.edit',
                'display_name' => 'Edit Service',
                'module' => 'Service',
            ],
            [
                'name' => 'service.delete',
                'display_name' => 'Delete Service',
                'module' => 'Service',
            ],

            // Gallery
            [
                'name' => 'gallery.view',
                'display_name' => 'View Gallery',
                'module' => 'Gallery',
            ],
            [
                'name' => 'gallery.create',
                'display_name' => 'Create Gallery',
                'module' => 'Gallery',
            ],
            [
                'name' => 'gallery.edit',
                'display_name' => 'Edit Gallery',
                'module' => 'Gallery',
            ],
            [
                'name' => 'gallery.delete',
                'display_name' => 'Delete Gallery',
                'module' => 'Gallery',
            ],

            // Team
            [
                'name' => 'team.view',
                'display_name' => 'View Team',
                'module' => 'Team',
            ],
            [
                'name' => 'team.create',
                'display_name' => 'Create Team',
                'module' => 'Team',
            ],
            [
                'name' => 'team.edit',
                'display_name' => 'Edit Team',
                'module' => 'Team',
            ],
            [
                'name' => 'team.delete',
                'display_name' => 'Delete Team',
                'module' => 'Team',
            ],

            // Testimonial
            [
                'name' => 'testimonial.view',
                'display_name' => 'View Testimonials',
                'module' => 'Testimonial',
            ],
            [
                'name' => 'testimonial.create',
                'display_name' => 'Create Testimonial',
                'module' => 'Testimonial',
            ],
            [
                'name' => 'testimonial.edit',
                'display_name' => 'Edit Testimonial',
                'module' => 'Testimonial',
            ],
            [
                'name' => 'testimonial.delete',
                'display_name' => 'Delete Testimonial',
                'module' => 'Testimonial',
            ],

            // Slider
            [
                'name' => 'slider.view',
                'display_name' => 'View Hero Slider',
                'module' => 'Slider',
            ],
            [
                'name' => 'slider.create',
                'display_name' => 'Create Hero Slider',
                'module' => 'Slider',
            ],
            [
                'name' => 'slider.edit',
                'display_name' => 'Edit Hero Slider',
                'module' => 'Slider',
            ],
            [
                'name' => 'slider.delete',
                'display_name' => 'Delete Hero Slider',
                'module' => 'Slider',
            ],

            // Counter
            [
                'name' => 'counter.view',
                'display_name' => 'View Counters',
                'module' => 'Counter',
            ],
            [
                'name' => 'counter.create',
                'display_name' => 'Create Counter',
                'module' => 'Counter',
            ],
            [
                'name' => 'counter.edit',
                'display_name' => 'Edit Counter',
                'module' => 'Counter',
            ],
            [
                'name' => 'counter.delete',
                'display_name' => 'Delete Counter',
                'module' => 'Counter',
            ],

            // Contact
            [
                'name' => 'contact.view',
                'display_name' => 'View Contact Messages',
                'module' => 'Contact',
            ],
            [
                'name' => 'contact.delete',
                'display_name' => 'Delete Contact Messages',
                'module' => 'Contact',
            ],

            // Settings
            [
                'name' => 'settings.view',
                'display_name' => 'View Settings',
                'module' => 'Settings',
            ],
            [
                'name' => 'settings.edit',
                'display_name' => 'Edit Settings',
                'module' => 'Settings',
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                [
                    'display_name' => $permission['display_name'],
                    'module' => $permission['module'],
                    'status' => 1,
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Super Admin → All Permissions
        |--------------------------------------------------------------------------
        */

        $superAdmin = Role::where('name', 'super-admin')->first();

        $allPermissions = Permission::pluck('id')->toArray();

        $superAdmin->permissions()->sync($allPermissions);
    }
}
